-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 17 Décembre 2019 à 07:51
-- Version du serveur :  5.7.11
-- Version de PHP :  7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `printer`
--

-- --------------------------------------------------------

--
-- Structure de la table `concern`
--

CREATE TABLE `concern` (
  `idOrder` int(11) NOT NULL,
  `idPrinter` int(11) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `concern`
--

INSERT INTO `concern` (`idOrder`, `idPrinter`, `Quantity`) VALUES
(1, 1, 10),
(1, 5, 5),
(1, 9, 7),
(2, 3, 20),
(2, 6, 15),
(2, 8, 50),
(3, 1, 36),
(3, 2, 24),
(3, 4, 60),
(3, 6, 100),
(3, 8, 45),
(3, 9, 12);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `concern`
--
ALTER TABLE `concern`
  ADD PRIMARY KEY (`idOrder`,`idPrinter`),
  ADD UNIQUE KEY `ID_concern_IND` (`idOrder`,`idPrinter`),
  ADD KEY `FKcon_t_p_IND` (`idPrinter`);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `concern`
--
ALTER TABLE `concern`
  ADD CONSTRAINT `FKcon_t_o` FOREIGN KEY (`idOrder`) REFERENCES `t_order` (`idOrder`),
  ADD CONSTRAINT `FKcon_t_p_FK` FOREIGN KEY (`idPrinter`) REFERENCES `t_printer` (`idPrinter`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
