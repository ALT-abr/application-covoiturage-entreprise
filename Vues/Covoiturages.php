<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Covoiturages à venir - Covoiturage entreprise</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php include __DIR__ . '/Menu.php'; ?>

    <main class="container trajets-page">
        <p class="hero-tag">Vos prochains trajets</p>
        <h1>Covoiturages à venir</h1>
        <p class="description">Retrouvez les trajets ouverts, du départ le plus proche au plus éloigné. Horaires de Paris.</p>

        <?php if ($erreur !== null): ?>
            <p class="error" role="alert"><?= htmlspecialchars($erreur, ENT_QUOTES, 'UTF-8') ?></p>
        <?php elseif (empty($covoiturages)): ?>
            <p class="empty">Aucun covoiturage à venir pour le moment. Revenez consulter cette page prochainement.</p>
        <?php else: ?>
            <p class="description"><?= count($covoiturages) ?> trajet<?= count($covoiturages) > 1 ? 's' : '' ?> à venir</p>
            <div class="grille-trajets">
                <?php foreach ($covoiturages as $trajet): ?>
                    <article class="carte-trajet">
                        <div class="trajet-entete">
                            <time datetime="<?= htmlspecialchars($trajet['date_trajet'] . 'T' . $trajet['heure_depart'], ENT_QUOTES, 'UTF-8') ?>">
                                <?= (new DateTimeImmutable($trajet['date_trajet']))->format('d/m/Y') ?>
                                à <?= substr($trajet['heure_depart'], 0, 5) ?>
                            </time>
                            <span class="trajet-places"><?= (int) $trajet['places_disponibles'] === 0 ? 'Complet' : (int) $trajet['places_disponibles'] . ' place' . ((int) $trajet['places_disponibles'] > 1 ? 's' : '') ?></span>
                        </div>
                        <h2>Trajet n°<?= (int) $trajet['id_covoiturage'] ?></h2>
                        <dl class="trajet-details">
                            <dt>Départ</dt>
                            <dd><?= htmlspecialchars($trajet['lieu_depart'], ENT_QUOTES, 'UTF-8') ?></dd>
                            <dt>Arrivée</dt>
                            <dd><?= htmlspecialchars($trajet['lieu_arrivee'], ENT_QUOTES, 'UTF-8') ?></dd>
                            <dt>Conducteur</dt>
                            <dd><?= htmlspecialchars($trajet['prenom_employe'] . ' ' . $trajet['nom_employe'], ENT_QUOTES, 'UTF-8') ?></dd>
                        </dl>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <a class="btn btn-secondaire trajet-retour" href="index.php?page=accueil">Retour à l'accueil</a>
    </main>
    <footer class="pied">Projet covoiturage entreprise</footer>
</body>
</html>
