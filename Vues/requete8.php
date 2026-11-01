<?php
require_once 'connexion.php';

// Requête n°8 : Combien y a-t-il de salariés par service ?
$sql = 'SELECT s.nom_service, s.heure_debut,
               COUNT(e.id_employe) AS nombre_salaries
        FROM service s
        LEFT JOIN employe e ON s.id_service = e.id_service
        GROUP BY s.id_service, s.nom_service, s.heure_debut';

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
    <title>Requête n°8 - Covoiturage</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php include __DIR__ . '/menu.php'; ?>

    <main class="container">
        <h1>Requête n°8</h1>
        <p class="description">Combien y a-t-il de salariés par service ?</p>

        <?php if (isset($erreur)): ?>
            <p class="error">La requête n'a pas pu être exécutée : <?= htmlspecialchars($erreur) ?></p>
        <?php elseif (count($resultats) === 0): ?>
            <p class="empty">Aucun résultat trouvé.</p>
        <?php else: ?>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Heure de début</th>
                            <th>Nombre de salariés</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultats as $ligne): ?>
                            <tr>
                                <td><?= htmlspecialchars((string) $ligne['nom_service']) ?></td>
                                <td><?= htmlspecialchars((string) $ligne['heure_debut']) ?></td>
                                <td><?= htmlspecialchars((string) $ligne['nombre_salaries']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>