<?php

require_once __DIR__ . '/../Models/Covoiturage.php';

class CovoiturageController
{
    public function afficher(): void
    {
        $page = 'covoiturages';
        $covoiturages = [];
        $erreur = null;

        if (!is_file(__DIR__ . '/../config.php')) {
            $erreur = 'La connexion à la base doit être configurée dans le fichier config.php du projet.';
        } else {
            try {
                require __DIR__ . '/../Models/connexion.php';
                $covoiturages = (new Covoiturage($pdo))->listerAVenir();
            } catch (PDOException $e) {
                error_log('Liste des covoiturages : ' . $e->getMessage());
                $erreur = 'Impossible de charger les covoiturages. Vérifiez la connexion à la base de données.';
            }
        }

        require __DIR__ . '/../Vues/Covoiturages.php';
    }
}
