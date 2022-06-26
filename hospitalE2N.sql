-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : jeu. 16 juin 2022 à 19:07
-- Version du serveur : 10.4.21-MariaDB
-- Version de PHP : 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hospitalE2N`
--

-- --------------------------------------------------------

--
-- Structure de la table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `dateHour` datetime NOT NULL,
  `idPatients` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `appointments`
--

INSERT INTO `appointments` (`id`, `dateHour`, `idPatients`) VALUES
(1, '2022-06-10 21:50:00', 1),
(12, '2022-06-11 15:54:00', 1),
(15, '2022-06-19 15:55:00', 5),
(16, '2022-06-20 15:52:00', 5),
(17, '2022-06-04 16:05:00', 6),
(18, '2022-06-14 16:07:00', 6),
(19, '2022-05-10 20:30:00', 15),
(20, '2022-06-12 20:54:00', 14),
(21, '2022-06-11 18:54:00', 14),
(22, '2022-06-05 00:58:00', 4),
(23, '2022-09-01 18:55:00', 4),
(24, '2022-05-04 18:56:00', 16),
(25, '2022-09-30 18:57:00', 18),
(26, '2023-06-30 19:01:00', 19),
(27, '2022-10-20 20:00:00', 20);

-- --------------------------------------------------------

--
-- Structure de la table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `birthdate` date NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `mail` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `patients`
--

INSERT INTO `patients` (`id`, `lastname`, `firstname`, `birthdate`, `phone`, `mail`) VALUES
(1, 'Dracau', 'Feu', '2022-06-05', '0101010101', 'dracaufeu@gmail.com'),
(4, 'Messi', 'Lionel', '2022-06-02', '7007007007', 'messi@gmail.com'),
(5, 'Ibrahimovic', 'Zlatan', '2022-06-03', '1010101010', 'zlatan@gmail.com'),
(6, 'Ronaldo', 'Cristiano', '2022-04-28', '7007007007', 'cr7@gmail.com'),
(14, 'Balotelli', 'Mario', '2022-05-01', '0624242424', 'marioB@gmail.com'),
(15, 'De Bruynes', 'Kevin', '2022-05-01', '1717171717', 'KDB@gmail.com'),
(16, 'Mbappe', 'Kyllian', '2000-06-01', '067857699', 'mbappe.lottin@gmail.com'),
(17, 'Iniesta', 'Andres', '1909-02-28', '0808080808', 'andres.8@gmail.com'),
(18, 'Neymar', 'Neymar', '2028-06-23', '1010101010', 'neymar10@gmail.com'),
(19, 'Salah', 'Mohammed', '2021-07-10', '9876543210', 'Salah@gmail.com'),
(20, 'Benzema', 'Karim', '2022-06-02', '2022202220', 'karimBallonDOR2022@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_appointments_id_patients` (`idPatients`);

--
-- Index pour la table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT pour la table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `FK_appointments_id_patients` FOREIGN KEY (`idPatients`) REFERENCES `patients` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
