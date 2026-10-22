<?php
require_once 'connexion.php';

// Exemple de requête : afficher tous les covoiturages proposés.
$sql = 'SELECT id_covoiturage, date_trajet, heure_depart, lieu_depart,
               lieu_arrivee, places_proposees, statut_covoiturage
        FROM covoiturage
        ORDER BY date_trajet, heure_depart';

try {
    $services = $pdo->query($sql)->fetchAll();
} catch (PDOException $e) {
    $services = [];
    $erreur = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requête n°1 - Covoiturage</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <header class="site-header">
        <h1>Requête n°1</h1>
        <nav aria-label="Menu des requêtes">
            <a class="active" href="requete1.php">Requête 1</a>
            <a href="requete2.php">Requête 2</a>
            <a href="requete3.php">Requête 3</a>
            <a href="requete4.php">Requête 4</a>
            <a href="requete5.php">Requête 5</a>
            <a href="requete6.php">Requête 6</a>
            <a href="requete7.php">Requête 7</a>
            <a href="requete8.php">Requête 8</a>
            <a href="requete9.php">Requête 9</a>
            <a href="requete10.php">Requête 10</a>
        </nav>
    </header>

    <main class="container">
        <p class="description">
            Cette requête affiche la liste des covoiturages proposés,
            classés par date et par heure de départ.
        </p>

        <?php if (isset($erreur)): ?>
            <p class="error">La requête n'a pas pu être exécutée : <?= htmlspecialchars($erreur) ?></p>
        <?php elseif (count($services) === 0): ?>
            <p class="empty">Aucun service trouvé.</p>
        <?php else: ?>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID covoiturage</th>
                            <th>Date</th>
                            <th>Heure de départ</th>
                            <th>Lieu de départ</th>
                            <th>Lieu d'arrivée</th>
                            <th>Places proposées</th>
                            <th>Statut</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($services as $service): ?>
                            <tr>
                                <td><?= htmlspecialchars($service['id_covoiturage']) ?></td>
                                <td><?= htmlspecialchars($service['date_trajet']) ?></td>
                                <td><?= htmlspecialchars($service['heure_depart']) ?></td>
                                <td><?= htmlspecialchars($service['lieu_depart']) ?></td>
                                <td><?= htmlspecialchars($service['lieu_arrivee']) ?></td>
                                <td><?= htmlspecialchars($service['places_proposees']) ?></td>
                                <td><?= htmlspecialchars($service['statut_covoiturage']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
