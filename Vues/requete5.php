<?php
require_once __DIR__ . '/../Models/connexion.php';

$sql = "SELECT nom_employe, prenom_employe 
        FROM employe 
        WHERE nom_employe LIKE 'M%'";
try {
    $resultats = $pdo->query($sql)->fetchAll();
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
    <title>Requête n°5</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>

<body>
    <?php include __DIR__ . '/Menu.php'; ?>

    <main class="container">
        <h1>Requête n°5</h1>
        <p class="description">Afficher les salariés dont le nom de famille commence par M.</p><?php if (isset($erreur)): ?><p class="error">Erreur : <?= htmlspecialchars($erreur) ?></p><?php elseif (!$resultats): ?><p class="empty">Aucun salarié trouvé.</p><?php else: ?><div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Prénom</th>
                        </tr>
                    </thead>
                    <tbody><?php foreach ($resultats as $ligne): ?><tr>
                                <td><?= htmlspecialchars($ligne['nom_employe']) ?></td>
                                <td><?= htmlspecialchars($ligne['prenom_employe']) ?></td>
                            </tr><?php endforeach; ?></tbody>
                </table>
            </div><?php endif; ?>
    </main>
</body>

</html>