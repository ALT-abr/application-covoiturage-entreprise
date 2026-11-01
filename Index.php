<?php
// Point d'entrée unique : index.php?page=accueil | requete1 à requete10
require_once __DIR__ . '/Controllers/AccueilController.php';
require_once __DIR__ . '/Controllers/CovoiturageController.php';

$pagesAutorisees = ['accueil', 'covoiturages'];
for ($i = 1; $i <= 10; $i++) {
    $pagesAutorisees[] = "requete$i";
}

$page = $_GET['page'] ?? 'accueil';
if (!in_array($page, $pagesAutorisees, true)) {
    $page = 'accueil';
}

if ($page === 'accueil') {
    (new AccueilController())->afficher();
} elseif ($page === 'covoiturages') {
    (new CovoiturageController())->afficher();
} else {
    // Transitoire : les pages de requêtes seront confiées à un contrôleur lorsqu'elles auront été migrées vers le modèle.
    require __DIR__ . '/Vues/' . $page . '.php';
}
