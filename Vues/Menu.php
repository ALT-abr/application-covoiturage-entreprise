<?php
// Menu commun à toutes les pages. Attend la variable $page (ex. "accueil", "requete3").
$page = $page ?? 'accueil';
$surRequetes = str_starts_with($page, 'requete');
?>
<header class="topbar">
    <div class="topbar-inner">
        <a class="brand" href="index.php?page=accueil">
            <span class="brand-dot"></span>Covoiturage
        </a>
        <nav class="menu-principal" aria-label="Navigation principale">
            <a href="index.php?page=covoiturages" class="<?= $page === 'covoiturages' ? 'active' : '' ?>">Covoiturages à venir</a>
            <a href="index.php?page=salaries" class="<?= $page === 'salaries' ? 'active' : '' ?>">Liste des salaries</a>
            <a href="index.php?page=accueil" class="<?= $page === 'accueil' ? 'active' : '' ?>">Accueil</a>
            <a href="index.php?page=accueil#requetes" class="<?= $surRequetes ? 'active' : '' ?>">Requêtes</a>
        </nav>
    </div>
</header>

<?php if ($surRequetes): ?>
    <div class="sous-menu-wrap">
        <nav class="sous-menu" aria-label="Choix de la requête">
            <?php for ($i = 1; $i <= 10; $i++): ?>
                <a href="index.php?page=requete<?= $i ?>"
                   class="<?= $page === "requete$i" ? 'active' : '' ?>">Requête <?= $i ?></a>
            <?php endfor; ?>
        </nav>
    </div>
<?php endif; ?>
