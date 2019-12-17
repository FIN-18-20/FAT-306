-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 17 Décembre 2019 à 08:06
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
-- Structure de la table `t_customer`
--

DROP TABLE IF EXISTS `t_customer`;
CREATE TABLE `t_customer` (
  `idCustomer` int(11) NOT NULL,
  `cusName` varchar(50) NOT NULL,
  `cusFirstname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_customer`
--

INSERT INTO `t_customer` (`idCustomer`, `cusName`, `cusFirstname`) VALUES
(1, 'Hayslip', 'Corboi');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `t_customer`
--
ALTER TABLE `t_customer`
  ADD PRIMARY KEY (`idCustomer`),
  ADD UNIQUE KEY `ID_t_customer_IND` (`idCustomer`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_customer`
--
ALTER TABLE `t_customer`
  MODIFY `idCustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
