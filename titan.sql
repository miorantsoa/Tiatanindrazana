-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 28 Février 2017 à 09:39
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `titan`
--

-- --------------------------------------------------------

--
-- Structure de la table `abonnee`
--

CREATE TABLE `abonnee` (
  `idutilisateur2` int(11) NOT NULL,
  `idabonnement` int(11) DEFAULT NULL,
  `civilite` int(11) NOT NULL,
  `nomutilisateur` varchar(60) NOT NULL,
  `prenomutilisateur` varchar(100) NOT NULL,
  `naissanceutilisateur` date NOT NULL,
  `cin` varchar(16) NOT NULL,
  `datedelivrancecin` date NOT NULL,
  `lieudelivrancecin` varchar(50) NOT NULL,
  `liencin_recto` varchar(50) NOT NULL,
  `liencin_verso` varchar(50) NOT NULL,
  `emailutilisateur` varchar(50) NOT NULL,
  `identifiant` varchar(40) NOT NULL,
  `motdepasse` varchar(40) NOT NULL,
  `statututilisateur` int(11) NOT NULL,
  `idsession` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `abonnement`
--

CREATE TABLE `abonnement` (
  `idabonnement` int(11) NOT NULL,
  `idtypeabon` int(11) DEFAULT NULL,
  `idutilisateur2` int(11) NOT NULL,
  `datedebutabonnement` date NOT NULL,
  `datefinabonnement` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `idadministrateur` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(75) NOT NULL,
  `identifiant` varchar(40) NOT NULL,
  `motdepasse` varchar(40) NOT NULL,
  `email` varchar(75) NOT NULL,
  `statutadministrateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `idarticle` int(11) NOT NULL,
  `idjournal` int(11) DEFAULT NULL,
  `idcategorie` int(11) NOT NULL,
  `idadministrateur` int(11) NOT NULL,
  `dateparution` date NOT NULL,
  `titre` varchar(255) NOT NULL,
  `extrait` text NOT NULL,
  `resume` text NOT NULL,
  `contenue` text NOT NULL,
  `laune` tinyint(1) NOT NULL,
  `etatpublication` tinyint(1) NOT NULL,
  `niveau` smallint(6) NOT NULL,
  `lien_image_une` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `assoc_cat_souscat`
--

CREATE TABLE `assoc_cat_souscat` (
  `idcatbeinfo` int(11) NOT NULL,
  `cat_idcatbeinfo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idcategorie` int(11) NOT NULL,
  `libelle` varchar(45) NOT NULL,
  `niveau` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categoriecorruption`
--

CREATE TABLE `categoriecorruption` (
  `idcatcorruption` int(11) NOT NULL,
  `libelle` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorieinfoutile`
--

CREATE TABLE `categorieinfoutile` (
  `idcatbeinfo` int(11) NOT NULL,
  `libelle` varchar(45) NOT NULL,
  `niveau` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `idcommontaire` int(11) NOT NULL,
  `idarticle` int(11) NOT NULL,
  `email` varchar(75) NOT NULL,
  `datecommentaire` datetime NOT NULL,
  `commentaire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `corruption`
--

CREATE TABLE `corruption` (
  `idcorruption` int(11) NOT NULL,
  `idcatcorruption` int(11) DEFAULT NULL,
  `datedenonciation` date NOT NULL,
  `datefait` date NOT NULL,
  `nomdenonciateur` varchar(255) NOT NULL,
  `adressedenonciateur` varchar(75) NOT NULL,
  `telephonedenonciateur` varchar(30) NOT NULL,
  `emaildenonciateur` varchar(75) NOT NULL,
  `sujet` varchar(255) NOT NULL,
  `contenue` text NOT NULL,
  `lieu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `detail_article`
--
CREATE TABLE `detail_article` (
`idarticle` int(11)
,`idjournal` int(11)
,`idcategorie` int(11)
,`idadministrateur` int(11)
,`dateparution` date
,`titre` varchar(255)
,`extrait` text
,`resume` text
,`contenue` text
,`laune` tinyint(1)
,`etatpublication` tinyint(1)
,`niveau` smallint(6)
,`lien_image_une` varchar(500)
,`libelle` varchar(45)
,`level` smallint(6)
,`numeroparution` decimal(8,0)
,`datepublication` date
,`liencouverture` varchar(500)
);

-- --------------------------------------------------------

--
-- Structure de la table `fichiercorruption`
--

CREATE TABLE `fichiercorruption` (
  `idcorruption` int(11) NOT NULL,
  `idmedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `filactualite`
--

CREATE TABLE `filactualite` (
  `idfilactualite` int(11) NOT NULL,
  `idadministrateur` int(11) NOT NULL,
  `datepublication` date NOT NULL,
  `heurepublication` time NOT NULL,
  `extrait` text NOT NULL,
  `contenue` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `historiqueabonne`
--

CREATE TABLE `historiqueabonne` (
  `idhistoriqueutilisateur` int(11) NOT NULL,
  `idutilisateur2` int(11) NOT NULL,
  `dateapplication` datetime NOT NULL,
  `civilite` int(11) NOT NULL,
  `nomutilisateur` varchar(60) NOT NULL,
  `prenomutilisateur` varchar(100) NOT NULL,
  `naissanceutilisateur` date NOT NULL,
  `cin` varchar(16) NOT NULL,
  `datedelivrancecin` date NOT NULL,
  `lieudelivrancecin` varchar(50) NOT NULL,
  `liencin_recto` varchar(50) NOT NULL,
  `liencin_verso` varchar(50) NOT NULL,
  `emailutilisateur` varchar(50) NOT NULL,
  `identifiant` varchar(40) NOT NULL,
  `motdepasse` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `infoutil`
--

CREATE TABLE `infoutil` (
  `idbeinfo` int(11) NOT NULL,
  `idcatbeinfo` int(11) DEFAULT NULL,
  `titre` varchar(255) NOT NULL,
  `contenue` text NOT NULL,
  `lien` varchar(300) DEFAULT NULL,
  `dernieremaj` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `journal`
--

CREATE TABLE `journal` (
  `idjournal` int(11) NOT NULL,
  `numeroparution` decimal(8,0) NOT NULL,
  `datepublication` date NOT NULL,
  `liencouverture` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `last_journal`
--
CREATE TABLE `last_journal` (
`idarticle` int(11)
,`idjournal` int(11)
,`idcategorie` int(11)
,`idadministrateur` int(11)
,`dateparution` date
,`titre` varchar(255)
,`extrait` text
,`resume` text
,`contenue` text
,`laune` tinyint(1)
,`etatpublication` tinyint(1)
,`niveau` smallint(6)
,`lien_image_une` varchar(500)
,`libelle` varchar(45)
,`level` smallint(6)
,`numeroparution` decimal(8,0)
,`datepublication` date
,`liencouverture` varchar(500)
);

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `idmedia` int(11) NOT NULL,
  `typemedia` varchar(25) NOT NULL,
  `nommedia` varchar(60) NOT NULL,
  `cheminmedia` varchar(100) NOT NULL,
  `creditmedia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `publicite`
--

CREATE TABLE `publicite` (
  `idpublicite` int(11) NOT NULL,
  `datedebutdiffusion` date NOT NULL,
  `datefindiffusion` date NOT NULL,
  `alt` text NOT NULL,
  `lienredirection` varchar(500) NOT NULL,
  `lienimage` varchar(500) NOT NULL,
  `commentaire` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE `reponse` (
  `idreponse` int(11) NOT NULL,
  `idsondage` int(11) DEFAULT NULL,
  `reponse` varchar(30) NOT NULL,
  `datepublication` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `sondage`
--

CREATE TABLE `sondage` (
  `idsondage` int(11) NOT NULL,
  `idreponse` int(11) NOT NULL,
  `question` text NOT NULL,
  `dateparution` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `tarifabonnement`
--

CREATE TABLE `tarifabonnement` (
  `idtarif` int(11) NOT NULL,
  `idtypeabon` int(11) NOT NULL,
  `dateapplication` datetime DEFAULT NULL,
  `durreeabonnement` smallint(6) NOT NULL,
  `prixabonnement` decimal(7,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `typeabonnement`
--

CREATE TABLE `typeabonnement` (
  `idtypeabon` int(11) NOT NULL,
  `idabonnement` int(11) DEFAULT NULL,
  `libelle` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la vue `detail_article`
--
DROP TABLE IF EXISTS `detail_article`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_article`  AS  select `article`.`idarticle` AS `idarticle`,`article`.`idjournal` AS `idjournal`,`article`.`idcategorie` AS `idcategorie`,`article`.`idadministrateur` AS `idadministrateur`,`article`.`dateparution` AS `dateparution`,`article`.`titre` AS `titre`,`article`.`extrait` AS `extrait`,`article`.`resume` AS `resume`,`article`.`contenue` AS `contenue`,`article`.`laune` AS `laune`,`article`.`etatpublication` AS `etatpublication`,`article`.`niveau` AS `niveau`,`article`.`lien_image_une` AS `lien_image_une`,`categorie`.`libelle` AS `libelle`,`categorie`.`niveau` AS `level`,`journal`.`numeroparution` AS `numeroparution`,`journal`.`datepublication` AS `datepublication`,`journal`.`liencouverture` AS `liencouverture` from ((`article` join `journal` on((`article`.`idjournal` = `journal`.`idjournal`))) join `categorie` on((`article`.`idcategorie` = `categorie`.`idcategorie`))) order by `journal`.`datepublication` desc ;

-- --------------------------------------------------------

--
-- Structure de la vue `last_journal`
--
DROP TABLE IF EXISTS `last_journal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `last_journal`  AS  select `detail_article`.`idarticle` AS `idarticle`,`detail_article`.`idjournal` AS `idjournal`,`detail_article`.`idcategorie` AS `idcategorie`,`detail_article`.`idadministrateur` AS `idadministrateur`,`detail_article`.`dateparution` AS `dateparution`,`detail_article`.`titre` AS `titre`,`detail_article`.`extrait` AS `extrait`,`detail_article`.`resume` AS `resume`,`detail_article`.`contenue` AS `contenue`,`detail_article`.`laune` AS `laune`,`detail_article`.`etatpublication` AS `etatpublication`,`detail_article`.`niveau` AS `niveau`,`detail_article`.`lien_image_une` AS `lien_image_une`,`detail_article`.`libelle` AS `libelle`,`detail_article`.`level` AS `level`,`detail_article`.`numeroparution` AS `numeroparution`,`detail_article`.`datepublication` AS `datepublication`,`detail_article`.`liencouverture` AS `liencouverture` from `detail_article` where `detail_article`.`dateparution` in (select max(`detail_article`.`dateparution`) from `detail_article`) ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abonnee`
--
ALTER TABLE `abonnee`
  ADD PRIMARY KEY (`idutilisateur2`),
  ADD KEY `fk_association_23` (`idabonnement`);

--
-- Index pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD PRIMARY KEY (`idabonnement`),
  ADD KEY `fk_association_22` (`idutilisateur2`),
  ADD KEY `fk_detailabonnement` (`idtypeabon`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadministrateur`);

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idarticle`),
  ADD KEY `fk_articlejournal` (`idjournal`),
  ADD KEY `fk_assoc_admin_article` (`idadministrateur`),
  ADD KEY `fk_categoriearticle` (`idcategorie`);

--
-- Index pour la table `assoc_cat_souscat`
--
ALTER TABLE `assoc_cat_souscat`
  ADD PRIMARY KEY (`idcatbeinfo`,`cat_idcatbeinfo`),
  ADD KEY `fk_assoc_cat_souscat2` (`cat_idcatbeinfo`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idcategorie`);

--
-- Index pour la table `categoriecorruption`
--
ALTER TABLE `categoriecorruption`
  ADD PRIMARY KEY (`idcatcorruption`);

--
-- Index pour la table `categorieinfoutile`
--
ALTER TABLE `categorieinfoutile`
  ADD PRIMARY KEY (`idcatbeinfo`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`idcommontaire`),
  ADD KEY `fk_commentairearticle` (`idarticle`);

--
-- Index pour la table `corruption`
--
ALTER TABLE `corruption`
  ADD PRIMARY KEY (`idcorruption`),
  ADD KEY `fk_assoc_cat_corruption` (`idcatcorruption`);

--
-- Index pour la table `fichiercorruption`
--
ALTER TABLE `fichiercorruption`
  ADD PRIMARY KEY (`idcorruption`,`idmedia`),
  ADD KEY `fk_fichiercorruption2` (`idmedia`);

--
-- Index pour la table `filactualite`
--
ALTER TABLE `filactualite`
  ADD PRIMARY KEY (`idfilactualite`),
  ADD KEY `fk_association_20` (`idadministrateur`);

--
-- Index pour la table `historiqueabonne`
--
ALTER TABLE `historiqueabonne`
  ADD PRIMARY KEY (`idhistoriqueutilisateur`),
  ADD KEY `fk_association_24` (`idutilisateur2`);

--
-- Index pour la table `infoutil`
--
ALTER TABLE `infoutil`
  ADD PRIMARY KEY (`idbeinfo`),
  ADD KEY `fk_cat_info_utile` (`idcatbeinfo`);

--
-- Index pour la table `journal`
--
ALTER TABLE `journal`
  ADD PRIMARY KEY (`idjournal`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`idmedia`);

--
-- Index pour la table `publicite`
--
ALTER TABLE `publicite`
  ADD PRIMARY KEY (`idpublicite`);

--
-- Index pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD PRIMARY KEY (`idreponse`),
  ADD KEY `fk_reponsesondage` (`idsondage`);

--
-- Index pour la table `sondage`
--
ALTER TABLE `sondage`
  ADD PRIMARY KEY (`idsondage`),
  ADD KEY `fk_reponsesondage2` (`idreponse`);

--
-- Index pour la table `tarifabonnement`
--
ALTER TABLE `tarifabonnement`
  ADD PRIMARY KEY (`idtarif`),
  ADD KEY `fk_assoc_abonnement_tarif` (`idtypeabon`);

--
-- Index pour la table `typeabonnement`
--
ALTER TABLE `typeabonnement`
  ADD PRIMARY KEY (`idtypeabon`),
  ADD KEY `fk_detailabonnement2` (`idabonnement`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `abonnee`
--
ALTER TABLE `abonnee`
  MODIFY `idutilisateur2` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `abonnement`
--
ALTER TABLE `abonnement`
  MODIFY `idabonnement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadministrateur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `article`
--
ALTER TABLE `article`
  MODIFY `idarticle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idcategorie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categoriecorruption`
--
ALTER TABLE `categoriecorruption`
  MODIFY `idcatcorruption` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categorieinfoutile`
--
ALTER TABLE `categorieinfoutile`
  MODIFY `idcatbeinfo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `idcommontaire` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `corruption`
--
ALTER TABLE `corruption`
  MODIFY `idcorruption` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `filactualite`
--
ALTER TABLE `filactualite`
  MODIFY `idfilactualite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `historiqueabonne`
--
ALTER TABLE `historiqueabonne`
  MODIFY `idhistoriqueutilisateur` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `infoutil`
--
ALTER TABLE `infoutil`
  MODIFY `idbeinfo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `journal`
--
ALTER TABLE `journal`
  MODIFY `idjournal` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `idmedia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `publicite`
--
ALTER TABLE `publicite`
  MODIFY `idpublicite` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `reponse`
--
ALTER TABLE `reponse`
  MODIFY `idreponse` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `sondage`
--
ALTER TABLE `sondage`
  MODIFY `idsondage` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `tarifabonnement`
--
ALTER TABLE `tarifabonnement`
  MODIFY `idtarif` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `typeabonnement`
--
ALTER TABLE `typeabonnement`
  MODIFY `idtypeabon` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `abonnee`
--
ALTER TABLE `abonnee`
  ADD CONSTRAINT `fk_association_23` FOREIGN KEY (`idabonnement`) REFERENCES `abonnement` (`idabonnement`);

--
-- Contraintes pour la table `abonnement`
--
ALTER TABLE `abonnement`
  ADD CONSTRAINT `fk_association_22` FOREIGN KEY (`idutilisateur2`) REFERENCES `abonnee` (`idutilisateur2`),
  ADD CONSTRAINT `fk_detailabonnement` FOREIGN KEY (`idtypeabon`) REFERENCES `typeabonnement` (`idtypeabon`);

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_articlejournal` FOREIGN KEY (`idjournal`) REFERENCES `journal` (`idjournal`),
  ADD CONSTRAINT `fk_assoc_admin_article` FOREIGN KEY (`idadministrateur`) REFERENCES `admin` (`idadministrateur`),
  ADD CONSTRAINT `fk_categoriearticle` FOREIGN KEY (`idcategorie`) REFERENCES `categorie` (`idcategorie`);

--
-- Contraintes pour la table `assoc_cat_souscat`
--
ALTER TABLE `assoc_cat_souscat`
  ADD CONSTRAINT `fk_assoc_cat_souscat` FOREIGN KEY (`idcatbeinfo`) REFERENCES `categorieinfoutile` (`idcatbeinfo`),
  ADD CONSTRAINT `fk_assoc_cat_souscat2` FOREIGN KEY (`cat_idcatbeinfo`) REFERENCES `categorieinfoutile` (`idcatbeinfo`);

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `fk_commentairearticle` FOREIGN KEY (`idarticle`) REFERENCES `article` (`idarticle`);

--
-- Contraintes pour la table `corruption`
--
ALTER TABLE `corruption`
  ADD CONSTRAINT `fk_assoc_cat_corruption` FOREIGN KEY (`idcatcorruption`) REFERENCES `categoriecorruption` (`idcatcorruption`);

--
-- Contraintes pour la table `fichiercorruption`
--
ALTER TABLE `fichiercorruption`
  ADD CONSTRAINT `fk_fichiercorruption` FOREIGN KEY (`idcorruption`) REFERENCES `corruption` (`idcorruption`),
  ADD CONSTRAINT `fk_fichiercorruption2` FOREIGN KEY (`idmedia`) REFERENCES `media` (`idmedia`);

--
-- Contraintes pour la table `filactualite`
--
ALTER TABLE `filactualite`
  ADD CONSTRAINT `fk_association_20` FOREIGN KEY (`idadministrateur`) REFERENCES `admin` (`idadministrateur`);

--
-- Contraintes pour la table `historiqueabonne`
--
ALTER TABLE `historiqueabonne`
  ADD CONSTRAINT `fk_association_24` FOREIGN KEY (`idutilisateur2`) REFERENCES `abonnee` (`idutilisateur2`);

--
-- Contraintes pour la table `infoutil`
--
ALTER TABLE `infoutil`
  ADD CONSTRAINT `fk_cat_info_utile` FOREIGN KEY (`idcatbeinfo`) REFERENCES `categorieinfoutile` (`idcatbeinfo`);

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `fk_reponsesondage` FOREIGN KEY (`idsondage`) REFERENCES `sondage` (`idsondage`);

--
-- Contraintes pour la table `sondage`
--
ALTER TABLE `sondage`
  ADD CONSTRAINT `fk_reponsesondage2` FOREIGN KEY (`idreponse`) REFERENCES `reponse` (`idreponse`);

--
-- Contraintes pour la table `tarifabonnement`
--
ALTER TABLE `tarifabonnement`
  ADD CONSTRAINT `fk_assoc_abonnement_tarif` FOREIGN KEY (`idtypeabon`) REFERENCES `typeabonnement` (`idtypeabon`);

--
-- Contraintes pour la table `typeabonnement`
--
ALTER TABLE `typeabonnement`
  ADD CONSTRAINT `fk_detailabonnement2` FOREIGN KEY (`idabonnement`) REFERENCES `abonnement` (`idabonnement`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
