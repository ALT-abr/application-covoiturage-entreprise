<?php

class Employe
{
    public function __construct(private PDO $pdo)
    {
    }

    public function listerTous(): array
    {
        $requete = $this->pdo->prepare(
            "SELECT 
                e.id_employe,
                e.nom_employe,
                e.prenom_employe,
                e.email,
                s.nom_service
            FROM employe e
            INNER JOIN service s ON e.id_service = s.id_service
            ORDER BY e.nom_employe ASC, e.prenom_employe ASC"
        );

        $requete->execute();

        return $requete->fetchAll(PDO::FETCH_ASSOC);
    }
}