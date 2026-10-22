-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 16 oct. 2026 à 17:53
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `covoiturage_entreprise`
--

-- --------------------------------------------------------

--
-- Structure de la table `covoiturage`
--

CREATE TABLE `covoiturage` (
  `id_covoiturage` int(11) NOT NULL,
  `date_trajet` date NOT NULL,
  `heure_depart` time NOT NULL,
  `lieu_depart` varchar(100) NOT NULL,
  `latitude_depart` decimal(10,8) DEFAULT NULL,
  `longitude_depart` decimal(11,8) DEFAULT NULL,
  `lieu_arrivee` varchar(100) NOT NULL,
  `places_disponibles` tinyint(3) UNSIGNED NOT NULL,
  `statut_covoiturage` enum('OUVERT','TERMINE','ANNULE') NOT NULL DEFAULT 'OUVERT',
  `id_conducteur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `covoiturage`
--

INSERT INTO `covoiturage` (`id_covoiturage`, `date_trajet`, `heure_depart`, `lieu_depart`, `latitude_depart`, `longitude_depart`, `lieu_arrivee`, `places_disponibles`, `statut_covoiturage`, `id_conducteur`) VALUES
(1, '2026-10-12', '08:15:00', '8 rue de la Mairie, 67380 Lingolsheim', NULL, NULL, '15 rue de l\'Industrie, 67200 Strasbourg', 4, 'TERMINE', 16),
(2, '2026-10-14', '08:15:00', '8 rue de la Mairie, 67380 Lingolsheim', NULL, NULL, '15 rue de l\'Industrie, 67200 Strasbourg', 3, 'TERMINE', 16),
(3, '2026-10-19', '08:15:00', '8 rue de la Mairie, 67380 Lingolsheim', NULL, NULL, '15 rue de l\'Industrie, 67200 Strasbourg', 4, 'OUVERT', 16),
(4, '2026-10-21', '08:15:00', '8 rue de la Mairie, 67380 Lingolsheim', NULL, NULL, '15 rue de l\'Industrie, 67200 Strasbourg', 2, 'OUVERT', 16),
(5, '2026-10-13', '04:20:00', '11 rue de l\'Église, 67116 Reichstett', NULL, NULL, '15 rue de l\'Industrie, 67200 Strasbourg', 4, 'TERMINE', 24),
(6, '2026-10-20', '04:20:00', '11 rue de l\'Église, 67116 Reichstett', NULL, NULL, '15 rue de l\'Industrie, 67200 Strasbourg', 3, 'OUVERT', 24),
(7, '2026-10-19', '12:15:00', '9 rue du Général Leclerc, 67540 Ostwald', NULL, NULL, '15 rue de l\'Industrie, 67200 Strasbourg', 4, 'OUVERT', 7),
(8, '2026-10-14', '08:10:00', '9 rue de Haguenau, 67000 Strasbourg', NULL, NULL, '15 rue de l\'Industrie, 67200 Strasbourg', 3, 'TERMINE', 12),
(9, '2026-10-20', '04:15:00', '13 rue de Strasbourg, 67206 Mittelhausbergen', NULL, NULL, '15 rue de l\'Industrie, 67200 Strasbourg', 1, 'OUVERT', 21),
(10, '2026-10-22', '12:10:00', '15 rue des Vosges, 67300 Schiltigheim', NULL, NULL, '15 rue de l\'Industrie, 67200 Strasbourg', 6, 'OUVERT', 28),
(11, '2026-10-15', '08:10:00', '26 rue de la République, 67800 Hoenheim', NULL, NULL, '15 rue de l\'Industrie, 67200 Strasbourg', 2, 'TERMINE', 19),
(12, '2026-10-23', '12:15:00', '25 route de Lyon, 67400 Illkirch-Graffenstaden', NULL, NULL, '15 rue de l\'Industrie, 67200 Strasbourg', 3, 'OUVERT', 9),
(13, '2026-10-20', '08:15:00', '14 rue du Faubourg National, 67000 Strasbourg', NULL, NULL, '15 rue de l\'Industrie, 67200 Strasbourg', 4, 'ANNULE', 15);

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `id_employe` int(11) NOT NULL,
  `nom_employe` varchar(100) NOT NULL,
  `prenom_employe` varchar(100) NOT NULL,
  `date_naissance` date DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `mot_de_passe_hash` varchar(255) NOT NULL,
  `adresse_domicile` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `id_service` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`id_employe`, `nom_employe`, `prenom_employe`, `date_naissance`, `email`, `mot_de_passe_hash`, `adresse_domicile`, `latitude`, `longitude`, `id_service`) VALUES
(1, 'Martin', 'Lucas', '1992-04-15', 'lucas.martin@exemple.fr', 'hash_test_01', '12 rue des Vosges, 67000 Strasbourg', NULL, NULL, 4),
(2, 'Bernard', 'Emma', '1995-08-22', 'bernard.emma@exemple.fr', 'hash_test_02', '8 rue de Colmar, 67100 Strasbourg', NULL, NULL, 4),
(3, 'Petit', 'Hugo', '1988-11-10', 'hugo.petit@exemple.fr', 'hash_test_03', '15 rue de Mulhouse, 67100 Strasbourg', NULL, NULL, 4),
(4, 'Martin', 'Luc', '1992-04-15', 'luca.martin@exemple.fr', 'hash_test_04', '21 route de Schirmeck, 67200 Strasbourg', NULL, NULL, 4),
(5, 'Benyahia', 'Kahina', '1998-11-10', 'kahina.benyahia@exemple.fr', 'hash_test_05', '6 rue de la République, 67800 Hoenheim', NULL, NULL, 4),
(6, 'Laurent', 'Léa', '1999-09-30', 'lea.laurent@exemple.fr', 'hash_test_06', '14 avenue de Strasbourg, 67400 Illkirch-Graffenstaden', NULL, NULL, 4),
(7, 'Idir', 'Amayas', '1993-01-12', 'amayas.idir@exemple.fr', 'hash_test_07', '9 rue du Général Leclerc, 67540 Ostwald', NULL, NULL, 4),
(8, 'Moreau', 'Chloé', '1996-12-08', 'chloe.moreau@exemple.fr', 'hash_test_08', '18 rue de la Gare, 67300 Schiltigheim', NULL, NULL, 4),
(9, 'Meziane', 'Lyes', '1989-05-25', 'lyes.meziane@exemple.fr', 'hash_test_09', '25 route de Lyon, 67400 Illkirch-Graffenstaden', NULL, NULL, 4),
(10, 'Petit', 'Sarah', '2000-03-14', 'sarah.petit@exemple.fr', 'hash_test_10', '11 rue du Maréchal Foch, 67380 Lingolsheim', NULL, NULL, 4),
(11, 'Benali', 'Yacine', '1994-06-18', 'yacine.benali@exemple.fr', 'hash_test_11', '17 rue de Saverne, 67000 Strasbourg', NULL, NULL, 1),
(12, 'Bouzid', 'Amira', '1997-03-25', 'amira.bouzid@exemple.fr', 'hash_test_12', '9 rue de Haguenau, 67000 Strasbourg', NULL, NULL, 1),
(13, 'Mansouri', 'Karim', '1990-12-07', 'karim.mansouri@exemple.fr', 'hash_test_13', '22 route de Bischwiller, 67300 Schiltigheim', NULL, NULL, 1),
(14, 'Benkhaled', 'Nour', '2000-08-14', 'nour.benkhaled@exemple.fr', 'hash_test_14', '5 rue de la Paix, 67400 Illkirch-Graffenstaden', NULL, NULL, 1),
(15, 'Dubois', 'Thomas', '1993-01-30', 'thomas.dubois@exemple.fr', 'hash_test_15', '14 rue du Faubourg National, 67000 Strasbourg', NULL, NULL, 1),
(16, 'Lefebvre', 'Julie', '1996-09-12', 'julie.lefebvre@exemple.fr', 'hash_test_16', '8 rue de la Mairie, 67380 Lingolsheim', NULL, NULL, 1),
(17, 'Girard', 'Antoine', '1987-04-22', 'antoine.girard@exemple.fr', 'hash_test_17', '19 avenue de Colmar, 67100 Strasbourg', NULL, NULL, 1),
(18, 'Rousseau', 'Camille', '1999-11-05', 'camille.rousseau@exemple.fr', 'hash_test_18', '11 rue de l\'Église, 67540 Ostwald', NULL, NULL, 1),
(19, 'Morel', 'Nicolas', '1991-07-16', 'nicolas.morel@exemple.fr', 'hash_test_19', '26 rue de la République, 67800 Hoenheim', NULL, NULL, 1),
(20, 'Faure', 'Élodie', '1998-02-28', 'elodie.faure@exemple.fr', 'hash_test_20', '7 rue du Général de Gaulle, 67400 Illkirch-Graffenstaden', NULL, NULL, 1),
(21, 'Durand', 'Maxime', '1991-05-17', 'maxime.durand@exemple.fr', 'hash_test_21', '13 rue de Strasbourg, 67206 Mittelhausbergen', NULL, NULL, 2),
(22, 'Lambert', 'Sophie', '1996-10-23', 'sophie.lambert@exemple.fr', 'hash_test_22', '7 rue de la Gare, 67450 Mundolsheim', NULL, NULL, 2),
(23, 'Bonnet', 'Alexandre', '1989-07-09', 'alexandre.bonnet@exemple.fr', 'hash_test_23', '20 rue de la République, 67800 Bischheim', NULL, NULL, 2),
(24, 'François', 'Pauline', '1998-02-14', 'pauline.francois@exemple.fr', 'hash_test_24', '11 rue de l\'Église, 67116 Reichstett', NULL, NULL, 2),
(25, 'Legrand', 'Baptiste', '1993-11-28', 'baptiste.legrand@exemple.fr', 'hash_test_25', '6 rue du Général de Gaulle, 67205 Oberhausbergen', NULL, NULL, 2),
(26, 'Garnier', 'Clément', '1994-03-12', 'clement.garnier@exemple.fr', 'hash_test_26', '18 rue Principale, 67201 Eckbolsheim', NULL, NULL, 3),
(27, 'Chevalier', 'Anaïs', '1997-08-05', 'anais.chevalier@exemple.fr', 'hash_test_27', '9 rue de la Mairie, 67202 Wolfisheim', NULL, NULL, 3),
(28, 'Francois', 'Mathieu', '1990-12-19', 'mathieu.francois@exemple.fr', 'hash_test_28', '15 rue des Vosges, 67300 Schiltigheim', NULL, NULL, 3),
(29, 'Perrin', 'Laura', '1999-06-21', 'laura.perrin@exemple.fr', 'hash_test_29', '4 rue de la Paix, 67460 Souffelweyersheim', NULL, NULL, 3),
(30, 'Marchand', 'Julien', '1992-09-30', 'julien.marchand@exemple.fr', 'hash_test_30', '23 rue du Général Leclerc, 67550 Vendenheim', NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `id_entreprise` int(11) NOT NULL,
  `nom_entreprise` varchar(100) NOT NULL,
  `adresse_entreprise` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id_entreprise`, `nom_entreprise`, `adresse_entreprise`) VALUES
(1, 'AlsaTech Industries', '15 rue de l’Industrie, 67200 Strasbourg');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `date_reservation` date NOT NULL,
  `statut_reservation` enum('EN_ATTENTE','VALIDEE','REFUSEE') NOT NULL DEFAULT 'EN_ATTENTE',
  `points_attribues` int(11) NOT NULL DEFAULT 0 CHECK (`points_attribues` >= 0),
  `validation` tinyint(1) NOT NULL DEFAULT 0,
  `date_validation` datetime DEFAULT NULL,
  `id_covoiturage` int(11) NOT NULL,
  `id_passager` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `date_reservation`, `statut_reservation`, `points_attribues`, `validation`, `date_validation`, `id_covoiturage`, `id_passager`) VALUES
(1, '2026-10-10', 'VALIDEE', 1, 1, '2026-10-12 10:00:00', 1, 5),
(2, '2026-10-10', 'VALIDEE', 1, 1, '2026-10-12 10:05:00', 1, 11),
(3, '2026-10-13', 'VALIDEE', 1, 1, '2026-10-14 10:00:00', 2, 6),
(4, '2026-10-16', 'EN_ATTENTE', 0, 0, NULL, 3, 5),
(5, '2026-10-16', 'EN_ATTENTE', 0, 0, NULL, 3, 13),
(6, '2026-10-16', 'EN_ATTENTE', 0, 0, NULL, 4, 18),
(7, '2026-10-12', 'VALIDEE', 1, 1, '2026-10-13 06:00:00', 5, 22),
(8, '2026-10-16', 'EN_ATTENTE', 0, 0, NULL, 6, 23),
(9, '2026-10-16', 'EN_ATTENTE', 0, 0, NULL, 7, 8),
(10, '2026-10-13', 'REFUSEE', 0, 0, NULL, 8, 5),
(11, '2026-10-14', 'REFUSEE', 0, 0, NULL, 11, 20),
(12, '2026-10-16', 'REFUSEE', 0, 0, NULL, 12, 10);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `nom_service` varchar(100) NOT NULL,
  `heure_debut` time NOT NULL,
  `id_entreprise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id_service`, `nom_service`, `heure_debut`, `id_entreprise`) VALUES
(1, 'Comptabilité', '09:00:00', 1),
(2, 'Production - Équipe matin', '05:00:00', 1),
(3, 'Production - Équipe après-midi', '13:00:00', 1),
(4, 'Entretien', '13:00:00', 1),
(5, 'Ressources Humaines', '08:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vehicule`
--

CREATE TABLE `vehicule` (
  `id_vehicule` int(11) NOT NULL,
  `immatriculation` varchar(50) NOT NULL,
  `marque` varchar(50) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `nombre_place` tinyint(3) UNSIGNED NOT NULL CHECK (`nombre_place` > 0),
  `id_employe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `vehicule`
--

INSERT INTO `vehicule` (`id_vehicule`, `immatriculation`, `marque`, `modele`, `nombre_place`, `id_employe`) VALUES
(1, 'AB-123-CD', 'Audi', 'RS6 Avant', 5, 7),
(2, 'EF-456-GH', 'Rolls-Royce', 'Phantom', 5, 12),
(3, 'JK-789-LM', 'Toyota', 'GR Supra', 2, 21),
(4, 'NP-234-QR', 'Mercedes-Benz', '280 SL Pagode', 2, 4),
(5, 'ST-567-UV', 'Renault', 'Clio IV GT Line', 5, 16),
(6, 'WX-890-YZ', 'Peugeot', '206', 5, 24),
(7, 'BC-321-DE', 'Mercedes-Benz', 'Classe V', 7, 28),
(8, 'FG-345-HJ', 'Citroën', 'Berlingo Van', 3, 19),
(9, 'KL-456-MN', 'Porsche', '911 Carrera', 4, 9),
(10, 'OP-789-QR', 'Tesla', 'Cybertruck', 5, 15),
(11, 'ST-234-UV', 'RAM', '1500 TRX', 5, 26);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `covoiturage`
--
ALTER TABLE `covoiturage`
  ADD PRIMARY KEY (`id_covoiturage`),
  ADD KEY `id_conducteur` (`id_conducteur`);

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`id_employe`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `id_service` (`id_service`);

--
-- Index pour la table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id_entreprise`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD UNIQUE KEY `id_covoiturage` (`id_covoiturage`,`id_passager`),
  ADD KEY `id_passager` (`id_passager`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`),
  ADD KEY `id_entreprise` (`id_entreprise`);

--
-- Index pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD PRIMARY KEY (`id_vehicule`),
  ADD UNIQUE KEY `immatriculation` (`immatriculation`),
  ADD UNIQUE KEY `id_employe` (`id_employe`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `covoiturage`
--
ALTER TABLE `covoiturage`
  MODIFY `id_covoiturage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `employe`
--
ALTER TABLE `employe`
  MODIFY `id_employe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT pour la table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id_entreprise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `vehicule`
--
ALTER TABLE `vehicule`
  MODIFY `id_vehicule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `covoiturage`
--
ALTER TABLE `covoiturage`
  ADD CONSTRAINT `covoiturage_ibfk_1` FOREIGN KEY (`id_conducteur`) REFERENCES `employe` (`id_employe`);

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `employe_ibfk_1` FOREIGN KEY (`id_service`) REFERENCES `service` (`id_service`);

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`id_covoiturage`) REFERENCES `covoiturage` (`id_covoiturage`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`id_passager`) REFERENCES `employe` (`id_employe`);

--
-- Contraintes pour la table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`id_entreprise`) REFERENCES `entreprise` (`id_entreprise`);

--
-- Contraintes pour la table `vehicule`
--
ALTER TABLE `vehicule`
  ADD CONSTRAINT `vehicule_ibfk_1` FOREIGN KEY (`id_employe`) REFERENCES `employe` (`id_employe`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
