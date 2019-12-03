-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 03 Décembre 2019 à 09:59
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
CREATE DATABASE IF NOT EXISTS `printer` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `printer`;

-- --------------------------------------------------------

--
-- Structure de la table `concern`
--

CREATE TABLE `concern` (
  `idOrder` int(11) NOT NULL,
  `idPrinter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `supply`
--

CREATE TABLE `supply` (
  `idPrinter` int(11) NOT NULL,
  `idSupplier` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_brand`
--

CREATE TABLE `t_brand` (
  `idBrand` int(11) NOT NULL,
  `braName` varchar(50) NOT NULL,
  `idManufacturer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_brand`
--

INSERT INTO `t_brand` (`idBrand`, `braName`, `idManufacturer`) VALUES
(1, 'Epson', 1),
(2, 'Hewlett Packard', 2),
(3, 'Brother', 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_consumable`
--

CREATE TABLE `t_consumable` (
  `idConsumable` int(11) NOT NULL,
  `conModel` varchar(50) NOT NULL,
  `conPrice` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_consumable`
--

INSERT INTO `t_consumable` (`idConsumable`, `conModel`, `conPrice`) VALUES
(1, 'Brother LC-3213BK (Noir)', 15.8),
(2, 'Brother LC-3211VAL (Couleur/Noir)', 49.95),
(3, 'Epson Etoile de mer 603 Pack Couleur/Noir', 44.28),
(4, 'Epson Etoile de mer 603 Pack XL Couleur/Noir', 82.43),
(5, 'HP 62 Pack XL Couleur/Noir', 75.22),
(6, 'HP 62 Couleur', 27.79),
(7, 'HP 62 Noir', 19.54),
(8, 'HP 302 Pack Couleur/Noir', 36.1),
(9, 'HP 302 Noir', 21.61),
(10, 'HP 302 Couleur', 20.62),
(11, 'HP 303 Pack Couleur/Noir', 40.16),
(12, 'HP 303 Couleur', 26.81),
(13, 'HP 303 Noir', 19.54),
(14, 'HP 304 Pack Couleur/Noir', 24),
(15, 'HP 304 Noir', 15),
(16, 'HP 304 Couleur', 15);

-- --------------------------------------------------------

--
-- Structure de la table `t_customer`
--

CREATE TABLE `t_customer` (
  `idCustomer` int(11) NOT NULL,
  `cusName` varchar(50) NOT NULL,
  `cusFirstname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_history`
--

CREATE TABLE `t_history` (
  `idHistory` int(11) NOT NULL,
  `hisPrice` float NOT NULL,
  `hisYear` date NOT NULL,
  `idPrinter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_manufacturer`
--

CREATE TABLE `t_manufacturer` (
  `idManufacturer` int(11) NOT NULL,
  `manName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_manufacturer`
--

INSERT INTO `t_manufacturer` (`idManufacturer`, `manName`) VALUES
(1, 'Epson'),
(2, 'Hewlett Packard'),
(3, 'Brother');

-- --------------------------------------------------------

--
-- Structure de la table `t_order`
--

CREATE TABLE `t_order` (
  `idOrder` int(11) NOT NULL,
  `ordDate` date NOT NULL,
  `ordWaranty` int(11) NOT NULL,
  `idCustomer` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `t_printer`
--

CREATE TABLE `t_printer` (
  `idPrinter` int(11) NOT NULL,
  `priModel` varchar(50) NOT NULL,
  `priPrice` float NOT NULL,
  `priSpeedColor` float NOT NULL,
  `priSpeedBW` float NOT NULL,
  `priResolutionX` int(11) NOT NULL,
  `priResolutionY` int(11) NOT NULL,
  `priDoubleSided` char(1) NOT NULL,
  `priHeight` int(11) NOT NULL,
  `priDepth` int(11) NOT NULL,
  `priWidth` int(11) NOT NULL,
  `priWeight` int(11) NOT NULL,
  `priDate` date NOT NULL,
  `idBrand` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_printer`
--

INSERT INTO `t_printer` (`idPrinter`, `priModel`, `priPrice`, `priSpeedColor`, `priSpeedBW`, `priResolutionX`, `priResolutionY`, `priDoubleSided`, `priHeight`, `priDepth`, `priWidth`, `priWeight`, `priDate`, `idBrand`) VALUES
(1, 'Envy Photo 6230', 119, 8, 11, 1200, 1200, 'a', 410, 161, 454, 7, '2018-05-15', 2),
(2, 'Envy Photo 7830', 189, 19, 21, 1200, 1200, 'a', 491, 193, 454, 8, '2019-08-24', 2),
(3, 'OfficeJet 5230', 129, 17, 20, 1200, 1200, 'a', 191, 367, 445, 7, '2019-03-30', 2),
(4, 'OfficeJet 250 portable', 379, 19, 20, 600, 600, 'm', 91, 198, 380, 3, '2018-11-11', 2),
(5, 'DeskJet 3760', 79, 2.5, 4, 600, 600, 'm', 141, 177, 403, 2, '2019-11-26', 2),
(6, 'Expression Home XP-2100', 84.9, 15, 27, 1200, 2400, 'm', 146, 300, 390, 4, '2018-09-05', 1),
(7, 'Expression Home XP-4100', 99.9, 15, 33, 1200, 2400, 'a', 170, 300, 375, 4, '2019-04-01', 1),
(8, 'WorkForce WF-2850DWF', 128.99, 20, 33, 1200, 2400, 'a', 218, 300, 375, 5, '2019-04-21', 1),
(9, 'MFC-J890DW', 169, 10, 12, 1200, 2400, 'a', 172, 341, 420, 9, '2019-02-15', 3);

-- --------------------------------------------------------

--
-- Structure de la table `t_supplier`
--

CREATE TABLE `t_supplier` (
  `idSupplier` int(11) NOT NULL,
  `supName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `t_supplier`
--

INSERT INTO `t_supplier` (`idSupplier`, `supName`) VALUES
(1, 'Epson'),
(2, 'Hewlett Packard'),
(3, 'Brother');

-- --------------------------------------------------------

--
-- Structure de la table `uses`
--

CREATE TABLE `uses` (
  `idConsumable` int(11) NOT NULL,
  `idPrinter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Index pour la table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`idPrinter`,`idSupplier`),
  ADD UNIQUE KEY `ID_supply_IND` (`idPrinter`,`idSupplier`),
  ADD KEY `FKsup_t_s_IND` (`idSupplier`);

--
-- Index pour la table `t_brand`
--
ALTER TABLE `t_brand`
  ADD PRIMARY KEY (`idBrand`),
  ADD UNIQUE KEY `ID_t_brand_IND` (`idBrand`),
  ADD KEY `FKown_IND` (`idManufacturer`);

--
-- Index pour la table `t_consumable`
--
ALTER TABLE `t_consumable`
  ADD PRIMARY KEY (`idConsumable`),
  ADD UNIQUE KEY `ID_t_consumable_IND` (`idConsumable`);

--
-- Index pour la table `t_customer`
--
ALTER TABLE `t_customer`
  ADD PRIMARY KEY (`idCustomer`),
  ADD UNIQUE KEY `ID_t_customer_IND` (`idCustomer`);

--
-- Index pour la table `t_history`
--
ALTER TABLE `t_history`
  ADD PRIMARY KEY (`idHistory`),
  ADD UNIQUE KEY `ID_t_history_IND` (`idHistory`),
  ADD KEY `FKcost_IND` (`idPrinter`);

--
-- Index pour la table `t_manufacturer`
--
ALTER TABLE `t_manufacturer`
  ADD PRIMARY KEY (`idManufacturer`),
  ADD UNIQUE KEY `ID_t_manufacturer_IND` (`idManufacturer`);

--
-- Index pour la table `t_order`
--
ALTER TABLE `t_order`
  ADD PRIMARY KEY (`idOrder`),
  ADD UNIQUE KEY `ID_t_order_IND` (`idOrder`),
  ADD KEY `FKassign_IND` (`idCustomer`);

--
-- Index pour la table `t_printer`
--
ALTER TABLE `t_printer`
  ADD PRIMARY KEY (`idPrinter`),
  ADD UNIQUE KEY `ID_t_printer_IND` (`idPrinter`),
  ADD KEY `FKcontain_IND` (`idBrand`);

--
-- Index pour la table `t_supplier`
--
ALTER TABLE `t_supplier`
  ADD PRIMARY KEY (`idSupplier`),
  ADD UNIQUE KEY `ID_t_supplier_IND` (`idSupplier`);

--
-- Index pour la table `uses`
--
ALTER TABLE `uses`
  ADD PRIMARY KEY (`idPrinter`,`idConsumable`),
  ADD UNIQUE KEY `ID_use_IND` (`idPrinter`,`idConsumable`),
  ADD KEY `FKuse_t_c_IND` (`idConsumable`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `t_brand`
--
ALTER TABLE `t_brand`
  MODIFY `idBrand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `t_consumable`
--
ALTER TABLE `t_consumable`
  MODIFY `idConsumable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT pour la table `t_customer`
--
ALTER TABLE `t_customer`
  MODIFY `idCustomer` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_history`
--
ALTER TABLE `t_history`
  MODIFY `idHistory` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_manufacturer`
--
ALTER TABLE `t_manufacturer`
  MODIFY `idManufacturer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `t_order`
--
ALTER TABLE `t_order`
  MODIFY `idOrder` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `t_printer`
--
ALTER TABLE `t_printer`
  MODIFY `idPrinter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `t_supplier`
--
ALTER TABLE `t_supplier`
  MODIFY `idSupplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `concern`
--
ALTER TABLE `concern`
  ADD CONSTRAINT `FKcon_t_o` FOREIGN KEY (`idOrder`) REFERENCES `t_order` (`idOrder`),
  ADD CONSTRAINT `FKcon_t_p_FK` FOREIGN KEY (`idPrinter`) REFERENCES `t_printer` (`idPrinter`);

--
-- Contraintes pour la table `supply`
--
ALTER TABLE `supply`
  ADD CONSTRAINT `FKsup_t_p` FOREIGN KEY (`idPrinter`) REFERENCES `t_printer` (`idPrinter`),
  ADD CONSTRAINT `FKsup_t_s_FK` FOREIGN KEY (`idSupplier`) REFERENCES `t_supplier` (`idSupplier`);

--
-- Contraintes pour la table `t_brand`
--
ALTER TABLE `t_brand`
  ADD CONSTRAINT `FKown_FK` FOREIGN KEY (`idManufacturer`) REFERENCES `t_manufacturer` (`idManufacturer`);

--
-- Contraintes pour la table `t_history`
--
ALTER TABLE `t_history`
  ADD CONSTRAINT `FKcost_FK` FOREIGN KEY (`idPrinter`) REFERENCES `t_printer` (`idPrinter`);

--
-- Contraintes pour la table `t_order`
--
ALTER TABLE `t_order`
  ADD CONSTRAINT `FKassign_FK` FOREIGN KEY (`idCustomer`) REFERENCES `t_customer` (`idCustomer`);

--
-- Contraintes pour la table `t_printer`
--
ALTER TABLE `t_printer`
  ADD CONSTRAINT `FKcontain_FK` FOREIGN KEY (`idBrand`) REFERENCES `t_brand` (`idBrand`);

--
-- Contraintes pour la table `uses`
--
ALTER TABLE `uses`
  ADD CONSTRAINT `FKuse_t_c_FK` FOREIGN KEY (`idConsumable`) REFERENCES `t_consumable` (`idConsumable`),
  ADD CONSTRAINT `FKuse_t_p` FOREIGN KEY (`idPrinter`) REFERENCES `t_printer` (`idPrinter`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
