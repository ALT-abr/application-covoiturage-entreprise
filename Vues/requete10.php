<?php
require_once __DIR__ . '/../Models/connexion.php';


// Requête n°10 : Combien de demandes de participation a reçu chaque covoiturage ?
$sql = 'SELECT c.id_covoiturage,
               COUNT(r.id_reservation) AS nombre_demandes
        FROM covoiturage c
        LEFT JOIN reservation r ON c.id_covoiturage = r.id_covoiturage
        GROUP BY c.id_covoiturage
        ORDER BY c.id_covoiturage';

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
    <title>Requête n°10 - Covoiturage</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php include __DIR__ . '/Menu.php'; ?>

    <main class="container">
        <h1>Requête n°10</h1>
        <p class="description">Combien de demandes de participation a reçu chaque covoiturage ?</p>

        <?php if (isset($erreur)): ?>
            <p class="error">La requête n'a pas pu être exécutée : <?= htmlspecialchars($erreur) ?></p>
        <?php elseif (count($resultats) === 0): ?>
            <p class="empty">Aucun résultat trouvé.</p>
        <?php else: ?>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>ID covoiturage</th>
                            <th>Nombre de demandes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultats as $ligne): ?>
                            <tr>
                                <td><?= htmlspecialchars((string) $ligne['id_covoiturage']) ?></td>
                                <td><?= htmlspecialchars((string) $ligne['nombre_demandes']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>