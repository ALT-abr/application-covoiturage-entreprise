
<?php

// Indiquer que la réponse sera au format JSON
header('Content-Type: application/json; charset=utf-8');

// charger la connexion à la base de données
require_once __DIR__ . '/../../Models/connexion.php';

// charger le modèle Covoiturage
require_once __DIR__ . '/../../Models/Covoiturage.php';

try {

    // Instancier le modèle avec la connexion PDO
    $modeleCovoiturage = new Covoiturage($pdo);

    // Récupérer les covoiturages à venir
    $covoiturages = $modeleCovoiturage->listerAVenir();

    // Renvoyer les résultats au format JSON
    echo json_encode([
        'success' => true,
        'data' => $covoiturages
    ], JSON_UNESCAPED_UNICODE);

} catch (Throwable $e) {

    // renvoyer une erreur sans exposer les détails techniques
    http_response_code(500);

    // transforme les résultats PHP en JSON
    echo json_encode([
        'success' => false,
        'message' => 'Erreur lors de la récupération des covoiturages.'
    ], JSON_UNESCAPED_UNICODE);
}
