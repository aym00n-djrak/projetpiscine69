-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 27 mai 2022 à 12:20
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `hopital`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `idAdmin` int(11) NOT NULL AUTO_INCREMENT,
  `nomAdmin` varchar(50) NOT NULL,
  `prenomAdmin` varchar(50) NOT NULL,
  `courrielAdmin` varchar(50) NOT NULL,
  PRIMARY KEY (`idAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nomAdmin`, `prenomAdmin`, `courrielAdmin`) VALUES
(1, '', 't', '');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`idClient`, `nomClient`, `prenomClient`, `courrielClient`, `motDePasseClient`, `adresseClient`, `villeClient`, `codePostalClient`, `paysClient`, `telClient`, `carteVitaleClient`, `idAdmin`) VALUES
(1, 'Remy', 'Jovanovic', 'remyj@outlook.fr', '645', '1 impasse du pavillon', 'SÃ©lectionnez une ville', 78930, 'France', 652224439, 23332, 1),
(2, 'a', 'a', 'a@a.fr', 'a', '5', '5', 5, '5', 5, 5, 1),
(3, 'Nicolas', 'Jovanovic', 'a@a.fr', 'a', '1 impasse du pavillon', 'Villette', 78930, 'ZFZ', 24533423, 24442, 1);

-- --------------------------------------------------------

--
-- Structure de la table `comptebancaire`
--

DROP TABLE IF EXISTS `comptebancaire`;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `creneau`
--

DROP TABLE IF EXISTS `creneau`;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `creneau`
--

INSERT INTO `creneau` (`idCreneau`, `dateCreneau`, `heureCreneau`, `reserveOuPas`, `consultationFinie`, `idClient`, `idMedecin`, `idLabo`) VALUES
(1, '2022-05-27', '10:00:00', 1, 1, 2, 1, 1),
(2, '2022-05-29', '16:20:00', 1, 1, 2, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `labo`
--

DROP TABLE IF EXISTS `labo`;
CREATE TABLE IF NOT EXISTS `labo` (
  `idLabo` int(11) NOT NULL AUTO_INCREMENT,
  `salleLabo` varchar(50) NOT NULL,
  `telLabo` int(11) NOT NULL,
  `courrielLabo` varchar(50) NOT NULL,
  `idAdmin` int(11) NOT NULL,
  PRIMARY KEY (`idLabo`),
  KEY `labo_admin_FK` (`idAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `labo`
--

INSERT INTO `labo` (`idLabo`, `salleLabo`, `telLabo`, `courrielLabo`, `idAdmin`) VALUES
(1, '577', 652224439, 'remy@labcorp.fr', 1),
(2, '444', 343, 'remyjova@gmail.com', 1),
(3, '444', 343, 'remyjova@gmail.com', 1);

-- --------------------------------------------------------

--
-- Structure de la table `medecin`
--

DROP TABLE IF EXISTS `medecin`;
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
  `image` text NOT NULL,
  `video` text NOT NULL,
  `idAdmin` int(11) NOT NULL,
  PRIMARY KEY (`idMedecin`),
  KEY `medecin_admin_FK` (`idAdmin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `medecin`
--

INSERT INTO `medecin` (`idMedecin`, `nomMedecin`, `prenomMedecin`, `specialiteMedecin`, `bureauMedecin`, `telMedecin`, `courrielMedecin`, `formationCV`, `experiencesCV`, `image`, `video`, `idAdmin`) VALUES
(1, 'Jovanovic', 'Remy', 'dermatologie', 'E236', 652224439, 'remyj@outlook.fr', 'DZi', 'zdzd', 'https://pbs.twimg.com/profile_images/3487195755/c01d88da00ffc3942d65cc1a6b5ced74_400x400.jpeg', 'https://www.youtube.com/embed/rLXYILcRoPQ', 1);

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
CREATE TABLE IF NOT EXISTS `messagerie` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

DROP TABLE IF EXISTS `paiement`;
CREATE TABLE IF NOT EXISTS `paiement` (
  `idLabo` int(11) NOT NULL,
  `idCompte` int(11) NOT NULL,
  `idServiceLabo` int(11) NOT NULL,
  PRIMARY KEY (`idLabo`,`idCompte`,`idServiceLabo`),
  KEY `paiement_compteBancaire0_FK` (`idCompte`),
  KEY `paiement_serviceLabo1_FK` (`idServiceLabo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `servicelabo`
--

DROP TABLE IF EXISTS `servicelabo`;
CREATE TABLE IF NOT EXISTS `servicelabo` (
  `idServiceLabo` int(11) NOT NULL AUTO_INCREMENT,
  `nomServiceLabo` varchar(50) NOT NULL,
  `tarifServiceLabo` float NOT NULL,
  `idLabo` int(11) NOT NULL,
  PRIMARY KEY (`idServiceLabo`),
  KEY `serviceLabo_labo_FK` (`idLabo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
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
  ADD CONSTRAINT `creneau_labo1_FK` FOREIGN KEY (`idLabo`) REFERENCES `labo` (`idLabo`),
  ADD CONSTRAINT `creneau_medecin0_FK` FOREIGN KEY (`idMedecin`) REFERENCES `medecin` (`idMedecin`);

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
  ADD CONSTRAINT `paiement_compteBancaire0_FK` FOREIGN KEY (`idCompte`) REFERENCES `comptebancaire` (`idCompte`),
  ADD CONSTRAINT `paiement_labo_FK` FOREIGN KEY (`idLabo`) REFERENCES `labo` (`idLabo`),
  ADD CONSTRAINT `paiement_serviceLabo1_FK` FOREIGN KEY (`idServiceLabo`) REFERENCES `servicelabo` (`idServiceLabo`);

--
-- Contraintes pour la table `servicelabo`
--
ALTER TABLE `servicelabo`
  ADD CONSTRAINT `serviceLabo_labo_FK` FOREIGN KEY (`idLabo`) REFERENCES `labo` (`idLabo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
