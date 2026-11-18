<?php
// Fichier test pour voir si l'API fonctionne
//interface de communication entre le backend et notre nouvelle application mobile Flutter  

header('Content-Type: application/json; charset=utf-8');

echo json_encode([      // Fonction native qui convertit une variable PHP (tableau, objet, chaîne...) en une chaîne de caractères au format JSON
    "success" => true,
    "message" => "L'API PHP fonctionne correctement !"
]);
