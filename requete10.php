<?php
require_once 'connexion.php';

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
    <header class="site-header">
        <h1>Requête n°10</h1>
        <nav aria-label="Menu des requêtes">
            <a href="requete1.php">Requête 1</a>
            <a href="requete2.php">Requête 2</a>
            <a href="requete3.php">Requête 3</a>
            <a href="requete4.php">Requête 4</a>
            <a href="requete5.php">Requête 5</a>
            <a href="requete6.php">Requête 6</a>
            <a href="requete7.php">Requête 7</a>
            <a href="requete8.php">Requête 8</a>
            <a href="requete9.php">Requête 9</a>
            <a class="active" href="requete10.php">Requête 10</a>
        </nav>
    </header>

    <main class="container">
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