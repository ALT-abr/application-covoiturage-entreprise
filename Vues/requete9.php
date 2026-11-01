<?php
require_once 'connexion.php';

// Requête n°9 : Afficher les salariés qui ont un véhicule : nom, prénom, marque et modèle.
$sql = 'SELECT e.nom_employe, e.prenom_employe, v.marque, v.modele
        FROM employe e
        JOIN vehicule v ON e.id_employe = v.id_employe';

try {
    $resultats = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $resultats = [];
    $erreur = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requête n°9 - Covoiturage</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php include __DIR__ . '/menu.php'; ?>

    <main class="container">
        <h1>Requête n°9</h1>
        <p class="description">Afficher les salariés qui ont un véhicule : nom, prénom, marque et modèle.</p>

        <?php if (isset($erreur)): ?>
            <p class="error">La requête n'a pas pu être exécutée : <?= htmlspecialchars($erreur) ?></p>
        <?php elseif (count($resultats) === 0): ?>
            <p class="empty">Aucun résultat trouvé.</p>
        <?php else: ?>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Marque</th>
                            <th>Modèle</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultats as $ligne): ?>
                            <tr>
                                <td><?= htmlspecialchars((string) $ligne['nom_employe']) ?></td>
                                <td><?= htmlspecialchars((string) $ligne['prenom_employe']) ?></td>
                                <td><?= htmlspecialchars((string) $ligne['marque']) ?></td>
                                <td><?= htmlspecialchars((string) $ligne['modele']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>