<?php
$config = require __DIR__ . '/../../config.php';    //correction du chemin car on a déplacé tout le projet web dans un dossier web-test

    $pdo = new PDO(
        "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset=utf8mb4",   //gestion des caractères et accents
        $config['user'],
        $config['password'],
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,    // Active le mode d'erreur pour lancer des exceptions en cas d'erreur
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // récupère les résultats sous forme de tableau associatif dans le cas d'une requête SELECT
        ]
    );

// bdd ---> version web (API : lien intermédiaire entre les 2) ---> app mobile