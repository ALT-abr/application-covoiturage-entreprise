<?php
class AccueilController
{
    public function afficher(): void
    {
        $page = 'accueil';

        // Libellés courts des requêtes 
        $libelles = [
            1 => 'Nom, prénom et email de tous les salariés triés par nom et prénom',
            2 => 'Les 3 premiers salariés par ordre alphabétique des noms',
            3 => 'Salariés du service n°2 avec le nom du service',
            4 => 'Véhicules qui ont au moins 5 places',
            5 => 'Salariés dont le nom de famille commence par M',
            6 => "Salariés qui n'ont pas de véhicule",
            7 => "Nombre de salariés dans l'entreprise",
            8 => 'Combien y a-t-il de salariés par service ?',
            9 => 'Salariés qui ont un véhicule : nom, prénom, marque et modèlee',
            10 => 'Demandes de participation a reçu chaque covoiturage',
        ];

        require __DIR__ . '/application-covoiturage-entreprise/Vue/accueil.php';
    }
}