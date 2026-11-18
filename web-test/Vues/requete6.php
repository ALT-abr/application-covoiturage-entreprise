<?php
require_once __DIR__ . '/../Models/connexion.php';


$sql = 'SELECT e.nom_employe, e.prenom_employe
        FROM employe e
        LEFT JOIN vehicule v ON e.id_employe = v.id_employe
        WHERE v.id_vehicule IS NULL';

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
    <title>Requête n°6 - Covoiturage</title>
    <link rel="stylesheet" href="/application-covoiturage-entreprise/CSS/style.css">
</head>
<body>
    <?php include __DIR__ . '/Menu.php'; ?>

    <main class="container">
        <h1>Requête n°6</h1>
        <p class="description">Afficher les salariés qui n'ont pas de véhicule.</p>

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
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultats as $ligne): ?>
                            <tr>
                                <td><?= htmlspecialchars((string) $ligne['nom_employe']) ?></td>
                                <td><?= htmlspecialchars((string) $ligne['prenom_employe']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>
