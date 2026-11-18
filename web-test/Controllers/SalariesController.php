<?php

require_once __DIR__ . '/../Models/Employe.php';

class SalariesController
{
    public function afficher(): void
    {
        $page = 'salaries';
        $salaries = [];
        $erreur = null;

        if (!is_file(__DIR__ . '/../config.php')) {
            $erreur = 'La connexion à la base de données doit être configurée.';
        } else {
            try {
                require __DIR__ . '/../Models/connexion.php';

                $salaries = (new Employe($pdo))->listerTous();

            } catch (PDOException $e) {
                error_log('Liste des salariés : ' . $e->getMessage());
                $erreur = 'Impossible de charger la liste des salariés.';
            }
        }

        require __DIR__ . '/../Vues/Salaries.php';
    }
}