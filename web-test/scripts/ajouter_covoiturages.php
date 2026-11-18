<?php

// Outil manuel : double-cliquer sur ajouter_covoiturages.bat à la racine.
if (PHP_SAPI !== 'cli') {
    http_response_code(403);
    exit('Ce script se lance uniquement depuis le fichier ajouter_covoiturages.bat.');
}

try {
    if (!is_file(__DIR__ . '/../config.php')) {
        throw new RuntimeException('Le fichier config.php est absent à la racine du projet.');
    }

    require __DIR__ . '/../Models/connexion.php';

    // Réutiliser les vrais conducteurs et adresses, sans modifier les anciens trajets.
    $modeles = $pdo->query(
        'SELECT c.id_conducteur, c.lieu_depart, c.lieu_arrivee, c.heure_depart,
                LEAST(c.places_disponibles, v.nombre_place - 1) AS places
         FROM covoiturage c
         INNER JOIN vehicule v ON v.id_employe = c.id_conducteur
         WHERE c.id_covoiturage = (
             SELECT MIN(c2.id_covoiturage) FROM covoiturage c2
             WHERE c2.id_conducteur = c.id_conducteur
         )
           AND v.nombre_place > 1 AND c.places_disponibles > 0
         ORDER BY c.id_covoiturage
         LIMIT 5'
    )->fetchAll(PDO::FETCH_ASSOC);

    if (!$modeles) {
        throw new RuntimeException('Aucun trajet existant avec un conducteur et un véhicule ne peut servir de modèle. Importez le jeu de données SQL du projet.');
    }

    // Un marqueur en base empêche un second lancement d'ajouter les mêmes exemples.
    $pdo->exec(
        'CREATE TABLE IF NOT EXISTS donnees_exemple_executees (
            nom VARCHAR(100) NOT NULL PRIMARY KEY,
            execute_le DATETIME NOT NULL
        ) ENGINE=InnoDB'
    );
    // Créer la table avant la transaction d'insertion (DDL MySQL).
    $pdo->beginTransaction();
    $marqueur = $pdo->prepare('INSERT IGNORE INTO donnees_exemple_executees (nom, execute_le) VALUES (:nom, :date)');
    $maintenant = new DateTimeImmutable('now', new DateTimeZone('Europe/Paris'));
    $marqueur->execute(['nom' => 'covoiturages_futurs_v1', 'date' => $maintenant->format('Y-m-d H:i:s')]);

    if ($marqueur->rowCount() === 0) {
        $pdo->rollBack();
        echo "Ce jeu de données a déjà été ajouté. Aucun doublon créé.\n";
        exit(0);
    }

    $insertion = $pdo->prepare(
        "INSERT INTO covoiturage
         (date_trajet, heure_depart, lieu_depart, lieu_arrivee, places_disponibles, statut_covoiturage, id_conducteur)
         VALUES (:date, :heure, :depart, :arrivee, :places, 'OUVERT', :conducteur)"
    );

    foreach ($modeles as $index => $modele) {
        $date = $maintenant->modify('+' . ($index + 1) . ' days')->format('Y-m-d');
        $insertion->execute([
            'date' => $date,
            'heure' => $modele['heure_depart'],
            'depart' => $modele['lieu_depart'],
            'arrivee' => $modele['lieu_arrivee'],
            'places' => $modele['places'],
            'conducteur' => $modele['id_conducteur'],
        ]);
    }

    $pdo->commit();
    echo count($modeles) . " covoiturages ajoutés pour les prochains jours, à partir de demain.\n";
    echo "Rechargez la page Covoiturages à venir dans votre navigateur.\n";
} catch (Throwable $e) {
    if (isset($pdo) && $pdo->inTransaction()) {
        $pdo->rollBack();
    }
    fwrite(STDERR, "Ajout impossible : " . $e->getMessage() . "\n");
    exit(1);
}
