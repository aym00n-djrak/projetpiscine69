-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 22 Mai 2022 à 23:52
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `hopital`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `nomAdmin` varchar(50) NOT NULL,
  `prenomAdmin` varchar(50) NOT NULL,
  `courrielAdmin` varchar(50) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nomAdmin`, `prenomAdmin`, `courrielAdmin`) VALUES
(1, 'LeThug', 'Alberto', 'alberto.lethug@omnesHopital.fr');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `idClient` int(11) NOT NULL AUTO_INCREMENT,
  `nomClient` varchar(50) NOT NULL,
  `prenomClient` varchar(50) NOT NULL,
  `courrielClient` varchar(50) NOT NULL,
  `motDePasseClient` varchar(50) NOT NULL,
  `adresseClient` varchar(50) NOT NULL,
  `villeClient` varchar(50) NOT NULL,
  `codePostalClient` int(11) NOT NULL,
  `paysClient` varchar(50) NOT NULL,
  `telClient` int(11) NOT NULL,
  `carteVitaleClient` int(11) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  PRIMARY KEY (`idClient`),
  KEY `Client_admin_FK` (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`idClient`, `nomClient`, `prenomClient`, `courrielClient`, `motDePasseClient`, `adresseClient`, `villeClient`, `codePostalClient`, `paysClient`, `telClient`, `carteVitaleClient`, `idAdmin`) VALUES
(1, 'Gibraltar', 'Friedrich', 'friedrich.gibraltar@hotmail.com', 'leGnangnan', '890, Park Avenue', 'NY', 6921, 'USA', 904884, 540044, 1);

-- --------------------------------------------------------

--
-- Structure de la table `comptebancaire`
--

CREATE TABLE IF NOT EXISTS `comptebancaire` (
  `idCompte` int(11) NOT NULL AUTO_INCREMENT,
  `typeCarteCompte` varchar(50) NOT NULL,
  `numCarteCompte` int(11) NOT NULL,
  `nomCarteCompte` varchar(50) NOT NULL,
  `dateExpirationCarteCompte` date NOT NULL,
  `codeSecuriteCarteCompte` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  PRIMARY KEY (`idCompte`),
  KEY `compteBancaire_Client_FK` (`idClient`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `comptebancaire`
--

INSERT INTO `comptebancaire` (`idCompte`, `typeCarteCompte`, `numCarteCompte`, `nomCarteCompte`, `dateExpirationCarteCompte`, `codeSecuriteCarteCompte`, `idClient`) VALUES
(1, 'MasterCard', 55408, 'FRIEDRICH GIBRALTAR', '2022-08-31', 58484, 1);

-- --------------------------------------------------------

--
-- Structure de la table `creneau`
--

CREATE TABLE IF NOT EXISTS `creneau` (
  `idCreneau` int(11) NOT NULL AUTO_INCREMENT,
  `dateCreneau` date NOT NULL,
  `heureCreneau` time NOT NULL,
  `reserveOuPas` tinyint(1) NOT NULL,
  `consultationFinie` tinyint(1) NOT NULL,
  `idClient` int(11) DEFAULT NULL,
  `idMedecin` int(11) DEFAULT NULL,
  `idLabo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idCreneau`),
  KEY `creneau_Client_FK` (`idClient`),
  KEY `creneau_medecin0_FK` (`idMedecin`),
  KEY `creneau_labo1_FK` (`idLabo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `creneau`
--

INSERT INTO `creneau` (`idCreneau`, `dateCreneau`, `heureCreneau`, `reserveOuPas`, `consultationFinie`, `idClient`, `idMedecin`, `idLabo`) VALUES
(1, '2022-05-31', '14:55:00', 0, 0, NULL, 1, NULL),
(2, '2022-06-14', '14:55:00', 0, 0, NULL, NULL, 1),
(3, '2022-07-20', '14:55:00', 1, 0, 1, NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `labo`
--

CREATE TABLE IF NOT EXISTS `labo` (
  `idLabo` int(11) NOT NULL AUTO_INCREMENT,
  `salleLabo` varchar(50) NOT NULL,
  `telLabo` int(11) NOT NULL,
  `courrielLabo` varchar(50) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  PRIMARY KEY (`idLabo`),
  KEY `labo_admin_FK` (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `labo`
--

INSERT INTO `labo` (`idLabo`, `salleLabo`, `telLabo`, `courrielLabo`, `idAdmin`) VALUES
(1, 'E430', 0, 'laboE430@omnesHopital.fr', 1),
(2, 'E430', 5642555, 'laboE430@omnesHopital.fr', 1);

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

CREATE TABLE IF NOT EXISTS `medecin` (
  `idMedecin` int(11) NOT NULL AUTO_INCREMENT,
  `nomMedecin` varchar(50) NOT NULL,
  `prenomMedecin` varchar(50) NOT NULL,
  `specialiteMedecin` varchar(50) NOT NULL,
  `bureauMedecin` varchar(50) NOT NULL,
  `telMedecin` int(11) NOT NULL,
  `courrielMedecin` varchar(50) NOT NULL,
  `formationCV` varchar(50) NOT NULL,
  `experiencesCV` varchar(50) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  PRIMARY KEY (`idMedecin`),
  KEY `medecin_admin_FK` (`idAdmin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `medecin`
--

INSERT INTO `medecin` (`idMedecin`, `nomMedecin`, `prenomMedecin`, `specialiteMedecin`, `bureauMedecin`, `telMedecin`, `courrielMedecin`, `formationCV`, `experiencesCV`, `idAdmin`) VALUES
(1, 'AimeNichons', 'Vladimir', 'Gynecologie', 'E455', 5440968, 'vlad.aimenichons@omnesHopital.com', '1999-2009: UPMC médecine générale; 1990-1999:t', '2010-2020: Versailles gyné de Marie Antoinette', 1);

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE IF NOT EXISTS `paiement` (
  `idLabo` int(11) NOT NULL,
  `idServiceLabo` int(11) NOT NULL,
  `idCompte` int(11) NOT NULL,
  PRIMARY KEY (`idLabo`,`idServiceLabo`,`idCompte`),
  KEY `paiement_serviceLabo0_FK` (`idServiceLabo`),
  KEY `paiement_compteBancaire1_FK` (`idCompte`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `paiement`
--

INSERT INTO `paiement` (`idLabo`, `idServiceLabo`, `idCompte`) VALUES
(2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `servicelabo`
--

CREATE TABLE IF NOT EXISTS `servicelabo` (
  `idServiceLabo` int(11) NOT NULL AUTO_INCREMENT,
  `nomServiceLabo` varchar(50) NOT NULL,
  `tarifServiceLabo` float NOT NULL,
  PRIMARY KEY (`idServiceLabo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `servicelabo`
--

INSERT INTO `servicelabo` (`idServiceLabo`, `nomServiceLabo`, `tarifServiceLabo`) VALUES
(1, 'Biologie préventive', 455.3);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `Client_admin_FK` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`idAdmin`);

--
-- Contraintes pour la table `comptebancaire`
--
ALTER TABLE `comptebancaire`
  ADD CONSTRAINT `compteBancaire_Client_FK` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);

--
-- Contraintes pour la table `creneau`
--
ALTER TABLE `creneau`
  ADD CONSTRAINT `creneau_Client_FK` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`),
  ADD CONSTRAINT `creneau_medecin0_FK` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idMedecin`),
  ADD CONSTRAINT `creneau_labo1_FK` FOREIGN KEY (`idLabo`) REFERENCES `labo` (`idLabo`);

--
-- Contraintes pour la table `labo`
--
ALTER TABLE `labo`
  ADD CONSTRAINT `labo_admin_FK` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`idAdmin`);

--
-- Contraintes pour la table `medecin`
--
ALTER TABLE `medecin`
  ADD CONSTRAINT `medecin_admin_FK` FOREIGN KEY (`idAdmin`) REFERENCES `admin` (`idAdmin`);

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_labo_FK` FOREIGN KEY (`idLabo`) REFERENCES `labo` (`idLabo`),
  ADD CONSTRAINT `paiement_serviceLabo0_FK` FOREIGN KEY (`idServiceLabo`) REFERENCES `servicelabo` (`idServiceLabo`),
  ADD CONSTRAINT `paiement_compteBancaire1_FK` FOREIGN KEY (`idCompte`) REFERENCES `comptebancaire` (`idCompte`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
