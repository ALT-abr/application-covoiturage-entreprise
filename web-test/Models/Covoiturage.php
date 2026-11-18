<?php

class Covoiturage
{
    public function __construct(private PDO $pdo) // injecter la connexion dans le modèle
    {
    }

    public function listerAVenir(): array
    {
        // Les dates de trajet sont exprimées dans l'heure locale de l'entreprise.
        $maintenant = new DateTimeImmutable('now', new DateTimeZone('Europe/Paris'));
        $requete = $this->pdo->prepare(
            "SELECT c.id_covoiturage, c.date_trajet, c.heure_depart,
                    c.lieu_depart, c.lieu_arrivee, c.places_disponibles,
                    e.nom_employe, e.prenom_employe
             FROM covoiturage c
             INNER JOIN employe e ON e.id_employe = c.id_conducteur
             WHERE TIMESTAMP(c.date_trajet, c.heure_depart) > :maintenant  --  // Ne récupérer que les covoiturages dont la date et l'heure de départ sont postérieures à la date et à l'heure actuelles
               AND c.statut_covoiturage = 'OUVERT'         --    statut ouvert seulement
             ORDER BY c.date_trajet, c.heure_depart, c.id_covoiturage"
        );
        $requete->execute(['maintenant' => $maintenant->format('Y-m-d H:i:s')]);

        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
}
