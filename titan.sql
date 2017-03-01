-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 01 Mars 2017 à 09:53
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
  `idadministrateur` int(11) DEFAULT NULL,
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

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`idarticle`, `idjournal`, `idcategorie`, `idadministrateur`, `dateparution`, `titre`, `extrait`, `resume`, `contenue`, `laune`, `etatpublication`, `niveau`, `lien_image_une`) VALUES
(4, NULL, 3, NULL, '2017-02-28', 'Test multipart', 'Reume ', 'Reume ', '<p>qsrtth</p>', 0, 1, 3, 'upload/17-02-28-article.jpg'),
(5, NULL, 3, NULL, '2017-02-28', 'Kortezin‘ny filoham-pirenena Nandratra olona 5', 'Tsy takona afenina ny setrasetran’ny kortezin’ny olom-panjakana eto amintsika. Ny fiara nentin’ireo mpiambina ny filoham-pirenena indray no namoa-doza tany Mahajanga omaly.', 'Tsy takona afenina ny setrasetran’ny kortezin’ny olom-panjakana eto amintsika. Ny fiara nentin’ireo mpiambina ny filoham-pirenena indray no namoa-doza tany Mahajanga omaly.', '<p><span style="color: #666666; font-family: \'Times New Roman\', serif; font-size: 12px; text-align: justify; text-indent: 47.2px; background-color: #003300;">Rehefa avy nanatitra ny filoha izy ireo, dia nirifatra toy ny fanaony saingy nandona fiara fitateram-bahoaka iray. Olona miisa 5 no fantatra fa naratra vokatr&rsquo;izany. Ny tena loza dia nezahina nafenina izy io ka nisy ny fandrarana ny mpanao gazety tsy haka sary ny zava-nitranga, raha ny vaovao azo. Mahagaga sy mahatalanjona ny antony hanafenana ny marina tsy ho fantatry ny rehetra. Efa nisy tranga mitovitovy tamin&rsquo;izao teny amin&rsquo;ny lalan&rsquo;i By Pass ny 24 oktobra 2016, ka ny kortezin&rsquo;ny filoha no voalaza fa nandratra olona saingy tsy nisy tohiny ny raharaha. Mpivady nitondra &ldquo;moto&rdquo; no voadonan&rsquo;ny fiara iray izay voalaza fa taitra tamin&rsquo;ny fandalovan&rsquo;ny filoha ny mpamiliny ary tsy maintsy, ka nahadona olona nitondra moto nanao taingin-droa</span><span style="font-size: 12px; color: #666666; font-family: \'Times New Roman\', serif; text-align: justify; text-indent: 47.2px; background-color: #003300;">&nbsp;&nbsp;</span><span style="color: #666666; font-family: \'Times New Roman\', serif; font-size: 12px; text-align: justify; text-indent: 47.2px; background-color: #003300;">izay nahafaty tsy tra-drano ny ramatoa iray ny 22 oktobra 2016. Efa malaza ratsy mihitsy ny manampahefana sasany eto amintsika ary efa betsaka ny fitarainana momba fa mbola mitohy ihany ny hetraketraka. Saika ireo izay manana toerana ambonimbony no manararaotra sy manampatra fahefana amin&rsquo;ny tokony hanomezan-dalana azy eny an-dalambe rehetra eny. Tsy hay intsony na tsy mahay lal&agrave;na na minia tsy te hahalala satria manampahefana, ka afaka mitondra tena ho ambonin&rsquo;ny lal&agrave;na. Raha ny voafaritry ny lal&agrave;mpanorenana anefa dia ny filoha, ny praiminisitra, ny filohan&rsquo;ny fitsarana avo momba ny lal&agrave;mpanorenana ary ireo lehiben&rsquo;ny antenimiera roa tonta ihany no manan-jo tsy maintsy homen-dalana rehefa eny an-dalambe eny. Tokony hampianarina ny mpampiasa l&agrave;lana rehetra ny lal&agrave;na satria maro no tsy mahalala.</span></p>', 0, 1, 1, 'upload/17-02-28-article.jpg\r\n'),
(6, NULL, 6, NULL, '2017-03-01', 'Lehiben’ny mpitandro ny filaminana Tsy azo kitikitihina ?', 'Tao anatin’ny herintaona (2016) dia tsy nahavita nandrafitra politikan’ny fandriampahalemana sy fampandrian-tany ary fandaminana ny fiarahamonina mba isorohana sy hanafoanana ny fitsaram-bahoaka ny fitondrana HVM.', 'Tao anatin’ny herintaona (2016) dia tsy nahavita nandrafitra politikan’ny fandriampahalemana sy fampandrian-tany ary fandaminana ny fiarahamonina mba isorohana sy hanafoanana ny fitsaram-bahoaka ny fitondrana HVM.', '<p>Fahafaham-baraka tanteraka ny hoe i Madagasikara no firenena voalohany eto ambonin&rsquo;ny tany manana manamboninahitra jeneraly sy kolonely maro indrindra. Ny zava-misy eto amin&rsquo;ny firenena anefa dia dorana velona ny olona tsy voatsara. Toa tsy sahin&rsquo;ny filoham-pirenena tompon&rsquo;ny teny farany anefa ny manaisotra ireo lehibe tsy mahavita azy. Ny niaro indray aza no nataony manoloana ny raharaha Befandriana Avaratra, izay efa lasa raharaham-pirenena mihitsy. Tsy andrenesam-peo izy ireny, ary tsy fantatry ny vahoaka intsony ny asany. Vola be anefa no afafy ho karamany isam-bolana. Manginy fotsiny ny tombontsoa isan-karazany toy ny fiara, solika, trano&hellip; Maro ireo zava-doza vokatry ny tsy fandraisan&rsquo;andraikitra na ny tandrevaka saingy tsy misy tohiny intsony ny raharaha. 54 no matin&rsquo;ny fitsaram-bahoaka tamin&rsquo;ny 2016 ary efa mananika ny 20 nanomboka ny fiandohan&rsquo;ity taona ity. Milaza handray andraikitra foana ny fanjakana saingy kobaka am-bava no betsaka. Tsy mahagaga raha fanjakana mpampiesona no hiantsoan&rsquo;ny Malagasy ity fitondrana iray ity. Ambara fa efa mandeha ny fanadihadiana saingy mizotra any amin&rsquo;ny fampanginana ny raharaha sy fampandriana adrisa no betsaka. Tsy vitan&rsquo;ny fisamborana sy fanagadrana olona 10 na 20 io, fa efa tena olana ara-tsosialy, olana ara-piarahamonina, ary misy idirany amin&rsquo;ny fomban-tany ihany koa. Tsy mba misy anefa ny fanadihadiana lalina mikasika ny olan&rsquo;ny Malagasy fa ny hampiasa hery ihany no masaka an-tsain&rsquo;ny mpitondra na dia efa hita izao aza fa tsy mahomby. Ny adala no lazaina fa anisan\'ny nandoro ny tan&agrave;na tany Befandriana Avaratra. Efa tsy mahay miasa ve dia tsy mbola mahay manao serasera ihany koa ? Sao dia mba tokony hiova asa e !</p>', 0, 1, 1, 'upload/17-03-01-1488316090.jpg'),
(7, NULL, 3, NULL, '2017-03-01', 'BUS INTELLIGENT 200 tapitrisa Ar no vidin’ny iray', 'Tsy araka ny nanampoizan’ny koperativa azy ny vidin’ilay “bus intelligent” an’ny orinasa ID Motors, izay kasain’ny fitondram-panjakana hampidirina eto an-drenivohitra sy ny manodidina.', 'Tsy araka ny nanampoizan’ny koperativa azy ny vidin’ilay “bus intelligent” an’ny orinasa ID Motors, izay kasain’ny fitondram-panjakana hampidirina eto an-drenivohitra sy ny manodidina.', '<p>Tafakatra&nbsp;&nbsp;&nbsp;200.000.000 Ar&nbsp;&nbsp;mantsy ny vidin&rsquo;ny iray&nbsp;&nbsp;raha&nbsp;&nbsp;araka ny fanadihadiana natao, mari-bola izay&nbsp;&nbsp;nambaran&rsquo;ireo koperativa sasany sendra ny gazety Tia tanindrazana fa mety tsy voaloa mihitsy na dia hibaby trosa hatramin&rsquo;ny zanaka aman-jafy aza. 400 Ar&nbsp;&nbsp;isaky ny mpandeha no hangonina, ny asa fanamboarana anefa tsy maintsy hatao eny anelanelany eny rehefa tojo fahasimbana ny fiara. Omaly no nanaovana andrana voalohany amin&rsquo;ny fampiasana azy io eto an-drenivohitra,&nbsp;&nbsp;mialoha ny hifampiresahan&rsquo;ny antokon-draharaha misahana ny fitaterana an-tanety, amin&rsquo;ireo koperativa vonona handray sy haka ity fiarabe ity. Tsiahivina fa ireo toerana be mpianatra toy eny Ankatso sy Vontovorona no nambaran&rsquo;ny filoham-pirenena fa tsy maintsy hampidirana voalohany ity fiarabe ity na dia misy amin&rsquo;izy ireo aza no noraran&rsquo;ny antokon-draharaha misahana ny fitaterana an-tanety&nbsp;&nbsp;tsy&nbsp;&nbsp;mahazo mampiditra fiara vaovao hitrandraka ny zotrany intsony.</p>', 0, 1, 1, 'upload/17-03-01-1488316284.jpg'),
(8, NULL, 6, NULL, '2017-03-28', 'Antoko Otrikafo Mila mametra-pialana ny filoham-pirenena', 'Tsy mahafoy ny fanjanahantany ny mpitondra ankehitriny, raha ny fanazavan’ny filohan’ny antoko otrikafo, Rajaonah Andrianjaka, tetsy amin’ny biraony etsy Andravoahangy omaly.', 'Tsy mahafoy ny fanjanahantany ny mpitondra ankehitriny, raha ny fanazavan’ny filohan’ny antoko otrikafo, Rajaonah Andrianjaka, tetsy amin’ny biraony etsy Andravoahangy omaly.', '<p><span lang="EN-US">Efa tamin&rsquo;ny 1947 no nandoro ny tranon&rsquo;ny Malagasy ny miaramilan&rsquo;ny mpanjanaka ary dia mbola izay fomba izay ihany no hampiharin&rsquo;ny polisy ankehitriny, araka ny hita tany Befandriana avaratra farany teo. Fomba fanao maloto efa hatramin&rsquo;izay io, hoy izy, satria tamin&rsquo;ny tetezamita koa efa nisy izay fandoroana tranona Malagasy izay ary nody nolazaina hoe tranona dahalo ilay izy. Ny tsy fanamelohan&rsquo;ny filoham-pirenena ny polisy noho iny tranga niseho tany Befandriana iny, araka izany, dia midika fankatoavana ny fomba fanaon&rsquo;ny mpanjanaka ka tsy misy dikany ny fanesorana ny minisitry ny filaminana anatiny, Anandra Norbert, amin&rsquo;ny toerany fa ny filoham-pirenena sy ny governemanta iray manontolo mihitsy no mila mametra-pialana.</span></p>\r\n<p>Mirija</p>', 0, 1, 1, NULL);

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
-- Structure de la table `assoc_sous_categorie`
--

CREATE TABLE `assoc_sous_categorie` (
  `idcategorie1` int(11) NOT NULL,
  `idcategorie2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `assoc_sous_categorie`
--

INSERT INTO `assoc_sous_categorie` (`idcategorie1`, `idcategorie2`) VALUES
(1, 2),
(4, 5);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idcategorie` int(11) NOT NULL,
  `libelle` varchar(45) NOT NULL,
  `niveau` smallint(6) NOT NULL,
  `rang_cat` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`idcategorie`, `libelle`, `niveau`, `rang_cat`) VALUES
(1, 'GG', 2, 1),
(2, 'Sary', 2, 2),
(3, 'Misongadina', 1, 1),
(4, 'Sarisary', 1, 1),
(5, 'Ampamoaka', 3, 2),
(6, 'Politika', 2, 1),
(7, 'Mampihomehy', 1, 1);

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
-- Doublure de structure pour la vue `categorie_mere`
--
CREATE TABLE `categorie_mere` (
`idcategorie` int(11)
,`libelle` varchar(45)
,`niveau` smallint(6)
,`rang_cat` smallint(6)
,`idcategorie1` int(11)
,`idcategorie2` int(11)
);

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
-- Structure de la vue `categorie_mere`
--
DROP TABLE IF EXISTS `categorie_mere`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `categorie_mere`  AS  select `categorie`.`idcategorie` AS `idcategorie`,`categorie`.`libelle` AS `libelle`,`categorie`.`niveau` AS `niveau`,`categorie`.`rang_cat` AS `rang_cat`,`assoc_sous_categorie`.`idcategorie1` AS `idcategorie1`,`assoc_sous_categorie`.`idcategorie2` AS `idcategorie2` from (`categorie` join `assoc_sous_categorie` on((`categorie`.`idcategorie` = `assoc_sous_categorie`.`idcategorie1`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `detail_article`
--
DROP TABLE IF EXISTS `detail_article`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_article`  AS  select `article`.`idarticle` AS `idarticle`,`article`.`idjournal` AS `idjournal`,`article`.`idcategorie` AS `idcategorie`,`article`.`idadministrateur` AS `idadministrateur`,`article`.`dateparution` AS `dateparution`,`article`.`titre` AS `titre`,`article`.`extrait` AS `extrait`,`article`.`resume` AS `resume`,`article`.`contenue` AS `contenue`,`article`.`laune` AS `laune`,`article`.`etatpublication` AS `etatpublication`,`article`.`niveau` AS `niveau`,`article`.`lien_image_une` AS `lien_image_une`,`categorie`.`libelle` AS `libelle`,`categorie`.`niveau` AS `level`,`journal`.`numeroparution` AS `numeroparution`,`journal`.`datepublication` AS `datepublication`,`journal`.`liencouverture` AS `liencouverture` from ((`article` join `journal` on((`article`.`idjournal` = `journal`.`idjournal`))) join `categorie` on((`article`.`idcategorie` = `categorie`.`idcategorie`))) order by `journal`.`datepublication` desc ;

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
-- Index pour la table `assoc_sous_categorie`
--
ALTER TABLE `assoc_sous_categorie`
  ADD PRIMARY KEY (`idcategorie1`,`idcategorie2`),
  ADD KEY `fk_assoc_sous_categorie2` (`idcategorie2`);

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
  MODIFY `idarticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idcategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
-- Contraintes pour la table `assoc_sous_categorie`
--
ALTER TABLE `assoc_sous_categorie`
  ADD CONSTRAINT `fk_assoc_sous_categorie` FOREIGN KEY (`idcategorie1`) REFERENCES `categorie` (`idcategorie`),
  ADD CONSTRAINT `fk_assoc_sous_categorie2` FOREIGN KEY (`idcategorie2`) REFERENCES `categorie` (`idcategorie`);

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
