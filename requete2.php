<?php
require_once 'connexion.php';

// Requête 2 : les 3 premiers salariés dans l'ordre alphabétique des noms.
$sql = 'SELECT nom_employe, prenom_employe
        FROM employe
        ORDER BY nom_employe ASC
        LIMIT 3';

try {
    $employes = $pdo->query($sql)->fetchAll();
} catch (PDOException $e) {
    $employes = [];
    $erreur = $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Requête n°2 - Covoiturage</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <header class="site-header">
        <h1>Requête n°2</h1>
        <nav aria-label="Menu des requêtes">
            <a href="requete1.php">Requête 1</a>
            <a class="active" href="requete2.php">Requête 2</a>
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
            Afficher les 3 premiers salariés dans l'ordre alphabétique des noms.
        </p>

        <?php if (isset($erreur)): ?>
            <p class="error">La requête n'a pas pu être exécutée : <?= htmlspecialchars($erreur) ?></p>
        <?php elseif (count($employes) === 0): ?>
            <p class="empty">Aucun salarié trouvé.</p>
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
                        <?php foreach ($employes as $employe): ?>
                            <tr>
                                <td><?= htmlspecialchars($employe['nom_employe']) ?></td>
                                <td><?= htmlspecialchars($employe['prenom_employe']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </main>
</body>
</html>