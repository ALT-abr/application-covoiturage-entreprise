<?php
require_once 'connexion.php';
$sql = 'SELECT nom_employe, prenom_employe, email FROM employe
        ORDER BY nom_employe ASC, prenom_employe ASC';
try { $resultats = $pdo->query($sql)->fetchAll(); } catch (PDOException $e) { $resultats = []; $erreur = $e->getMessage(); }
?>
<!DOCTYPE html><html lang="fr"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Requête n°1</title><link rel="stylesheet" href="CSS/style.css"></head><body>
<header class="site-header"><h1>Requête n°1</h1><nav><?php for ($i = 1; $i <= 10; $i++): ?><a class="<?= $i === 1 ? 'active' : '' ?>" href="requete<?= $i ?>.php">Requête <?= $i ?></a><?php endfor; ?></nav></header>
<main class="container"><p class="description">Afficher le nom, prénom et email de tous les salariés triés par nom et prénom.</p>
<?php if (isset($erreur)): ?><p class="error">Erreur : <?= htmlspecialchars($erreur) ?></p><?php elseif (!$resultats): ?><p class="empty">Aucun salarié trouvé.</p><?php else: ?><div class="table-wrapper"><table><thead><tr><th>Nom</th><th>Prénom</th><th>Email</th></tr></thead><tbody><?php foreach ($resultats as $ligne): ?><tr><td><?= htmlspecialchars($ligne['nom_employe']) ?></td><td><?= htmlspecialchars($ligne['prenom_employe']) ?></td><td><?= htmlspecialchars($ligne['email']) ?></td></tr><?php endforeach; ?></tbody></table></div><?php endif; ?></main></body></html>
