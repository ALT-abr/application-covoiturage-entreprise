<?php
require_once __DIR__ . '/../Models/connexion.php';


// Requête n°7 : Combien y a-t-il de salariés dans l'entreprise ?
$sql = 'SELECT COUNT(*) AS nombre_salaries
        FROM employe';

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
    <title>Requête n°7 - Covoiturage</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php include __DIR__ . '/Menu.php'; ?>

    <main class="container">
        <h1>Requête n°7</h1>
        <p class="description">Combien y a-t-il de salariés dans l'entreprise ?</p>

        <?php if (isset($erreur)): ?>
            <p class="error">La requête n'a pas pu être exécutée : <?= htmlspecialchars($erreur) ?></p>
        <?php elseif (count($resultats) === 0): ?>
            <p class="empty">Aucun résultat trouvé.</p>
        <?php else: ?>
            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Nombre de salariés</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultats as $ligne): ?>
                            <tr>
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
