<?php
require_once __DIR__ . '/../Models/connexion.php';


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
    <?php include __DIR__ . '/Menu.php'; ?>


    <main class="container">
        <h1>Requête n°2</h1>
        <p class="description">Afficher les 3 premiers salariés dans l'ordre alphabétique des noms.</p>

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