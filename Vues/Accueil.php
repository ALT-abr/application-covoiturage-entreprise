<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Covoiturage entreprise</title>
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
    <?php include __DIR__ . '/Menu.php'; ?>

    <main>
        <section class="hero">
            <p class="hero-tag">Application de covoiturage pour salariés</p>
            <h1>Partagez vos trajets,
                <br>gagnez des points.
            </h1>
            <p class="hero-texte">
                Trouvez des collègues qui travaillent aux mêmes horaires que vous,
                organisez vos trajets domicile-travail et grimpez dans le classement des conducteurs.
            </p>
            <div class="hero-actions">
                <a class="btn btn-primaire" href="#">Connexion</a>
                <a class="btn btn-primaire btn-orange" href="#">Créer un compte</a>
                <a class="btn btn-secondaire" href="#requetes">Voir les requêtes</a>
            </div>
        </section>

        <section class="bloc" id="requetes">
            <h2>Requêtes</h2>
            <p class="bloc-intro">Choisissez une requête pour afficher son résultat.</p>
            <div class="grille-requetes">
                <?php for ($i = 1; $i <= 10; $i++): ?>
                    <a class="carte-requete" href="index.php?page=requete<?= $i ?>">
                        <span class="carte-num"><?= $i ?></span>
                        <span class="carte-titre">Requête <?= $i ?></span>
                        <?php if (!empty($libelles[$i])): ?>
                            <span class="carte-texte"><?= htmlspecialchars($libelles[$i]) ?></span>
                        <?php endif; ?>
                    </a>
                <?php endfor; ?>
            </div>
        </section>
    </main>

    <footer class="pied">Projet covoiturage entreprise</footer>
</body>
</html>