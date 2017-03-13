-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 13 Mars 2017 à 08:46
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
  `idsession` varchar(255) DEFAULT NULL,
  `imageprofile` varchar(500) DEFAULT NULL
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
(1, 1, 1, NULL, '2017-03-08', 'Mandravarava i ENAWO 3 maty, 6 naratra mafy', 'Mahery vaika ny rivodoza Enawo izay niditra an-tanety tany Ampahana Antalaha omaly talata 7 martsa tamin’ny 12 ora antoandro.', 'Mahery vaika ny rivodoza Enawo izay niditra an-tanety tany Ampahana Antalaha omaly talata 7 martsa tamin’ny 12 ora antoandro.', '<p>Olona 3 no fantatra fa maty ka lehilahy iray tany Mananara avaratra ary ankizy roa kosa tany Maroantsetra, olona miisa 468 no tsy maintsy nafindra toerana mbola tao Maroantsetra ihany. Enina no fantatra fa naratra aloha hatreto, araka ny fampitam-baovao ofisialy avy amin&rsquo;ny fitondram-panjakana.&nbsp;Cyclone Tropical Intense&nbsp;no iantsoana an&rsquo;i Enawo&nbsp;&nbsp;ankehitriny, 5km isan&rsquo;ora ny fikisahany ary tafio-drivotra hatrany amin&rsquo;ny 200 km isan&rsquo;ora no entiny. Tena mahery vaika ity rivodoza ity. Mijojo hatrany ny orana matevina amin&rsquo;izay faritra misy azy toa an&rsquo;Antalaha, Maroantsetra, Mananara avaratra, Soanierana Ivongo, Toamasina &hellip; Mikisaka miadana miankandrefana i Enawo. Arakaraka ny maha kely ny hafainganam-pandeha no maha betsaka ny fahasimbana entin&rsquo;ny rivodoza. Ny faritr&rsquo;i SAVA sy Atsinanana no tena nandalovany omaly ary vinavinaina handalo eto Analamanga izy anio. Orana mikija sy rivotra mahery no entiny ary sokajian&rsquo;ny teknisianina ho anisan&rsquo;ireo rivodoza matanjaka indrindra nandalo teto Madagasikatra izy ity. Ao anatin&rsquo;ny faritra mena na loza mitatao ka mila mitandrina fatratra ny faritra DIANA, Sofia, SAVA, Analanjirofo, Toamasina, Brickaville, Vatomandry, Alaotra, Mahajanga I sy II, Marovoay, Ambatoboeny, Maevatanana ary Tsaratanana. Araka ny fampitam-baovao azo, efa maro ny zavatra simba any Maroantsetra, Toamasina &hellip; Andrasana ny fijerena ifotony hahafantarana ny zava-misy marina. Nofoanana avokoa ny fihetsiketsehana manodidina ny fanamarihana ny 8 martsa andron&rsquo;ny vehivavy manerana ny nosy, anisan&rsquo;izany ny hetsika lehibe saika hotanterahana anio eny Mahamasina. Efa namoaka fanambarana ny fitondram-panjakana fa tsy mianatra ny mpianatra rehetra manerana an&rsquo;i Madagasikara anio alarobia 8 martsa ary tompon&rsquo;andraikitra amin&rsquo;ny&nbsp;&nbsp;fanapahan-kevitra rehetra hafa ireo DREN isam-paritra ny amin&rsquo;ny mety ho tohiny. Mila manara-baovao ny rehetra satria misy fivoarana ny andro ratsy ka miova araka izay ihany koa ny toromarika.Tonga nitsidika ny BNGRC moa omaly ny filoha Hery Rajaonarimampianina ary nanamafy fa tokony ho mailo ny rehetra ary efa mivonona amin&rsquo;ny fanampiana ny fitondram-panjakana.</p>', 1, 1, 1, 'upload/17-03-11-1489216500.jpg'),
(2, 1, 5, NULL, '2017-03-11', 'Kaominina Andoharanofotsy Nandaitra ny fanentanana ny mponina', 'Tsy nahitana rano niandrona mihitsy ny araben’Andoharanofotsy ny Alarobia sy omaly tontolo andro na dia nirotsaka tsy ato aza ny orana teto an-drenivohitra sy ny manodidina', 'Tsy nahitana rano niandrona mihitsy ny araben’Andoharanofotsy ny Alarobia sy omaly tontolo andro na dia nirotsaka tsy ato aza ny orana teto an-drenivohitra sy ny manodidina', '<p><span lang="EN-US">Noho ny ezaky ny kaominina sy ny Fokonolona izay samy nanadio ny tata-drano rehetra no anisan&rsquo;ny antony nahatonga izany, raha araka ny fanazavan&rsquo;ny Ben&rsquo;ny tan&agrave;na Ranirison Hasina. Nandaitra ihany koa hoy izy ny fanentanana ny mponina ny amin&rsquo;ny tsy tokony hanarina fako any anaty tata-drano ka tsy nisy intsony ny rano nihandrona. Raha tsiahivina anefa dia miaina anaty rano hatrany ny mponina ao Andoharanofotsy isaky ny fotoam-pahavaratra tahaka izao ka misy mihitsy ireo tsy afaka manohy ny asa fivelomany andavanandro toy ny mpivarotra&hellip; raha misedra olana ihany koa ny mpiasa sy ny mpianatra. Voasoroka hatrany amin&rsquo;ireo tokantrano nahiana ho traboina hoy hatrany ny Ben&rsquo;ny tan&agrave;na, asa izay ezahina hotohizana hatrany hananan&rsquo;ny mponina filaminan-tsaina sy hahafahana miaina ao anaty tan&agrave;na madio.</span></p>\r\n<p><span lang="EN-US">Pati</span></p>', 0, 1, 2, 'upload/17-03-11-1489216217.jpg'),
(3, 1, 3, NULL, '2017-03-11', 'Vidim-piainana Tsy mandray andraikitra ny mpitondra', 'Miaina vanim-potoana sarotra ny vahoaka Malagasy amin’izao fotoana. Saika ny 80%-n’ny faritra eto Madagasikara no nizaka ny voka-dratsin’ny rivodoza.', 'Miaina vanim-potoana sarotra ny vahoaka Malagasy amin’izao fotoana. Saika ny 80%-n’ny faritra eto Madagasikara no nizaka ny voka-dratsin’ny rivodoza.', '<p>Efa tafiditra ao anaty fotoam-pahavaratra rahateo isika, ka maro ireo endri-pahasahiranana isan-karazany miseho. Vao andro vitsy nisian&rsquo;ny orana sy rivodoza dia efa miseho sahady ny olana amin&rsquo;ny fidangan&rsquo;ny vidin&rsquo;ny entana ilaina amin&rsquo;ny andavanandro.&nbsp;<span lang="EN-US">Tafakatra 20 000 ka hatramin&rsquo;ny 25&nbsp;000 ariary sahady ny vidin&rsquo;ny harina fandrehitra eto Antananarivo. Toraka izany koa ny vidin&rsquo;ny vary izay efa mananika ny 2 000 ariary indray ny iray kilao. Saika ahitana izany avokoa ny faritra rehetra eto an-drenivohitra. Raikitra ny fananararaotana isan-karazany. Tokony hisy ny sazy henjana hampiharina amin&rsquo;ireo mpandraharaha manararaotra ny fahasarinam-bahoaka toy izao satria tsy ara-dal&agrave;na sy tsy ara-drariny no miseho. Raha tena mitsinjo ny vahoakany ny mpitondra dia vitany ny manara-maso sy misoroka ny fidangan&rsquo;ny vidin-javatra. Mila jerena koa ny fahasahiranana.</span></p>\r\n<p><span lang="EN-US">Toky R</span></p>', 0, 1, 1, 'upload/17-03-11-1489216343.jpg'),
(4, 1, 1, NULL, '2017-03-11', 'Tandindomin-doza Antananarivo Miakatra Ikopa sy Sisaony', 'Omaly tamin’ny 11 ora sy sasany antoandro dia vaky ny fefiloha manamorona ny reniranon’i Sisaony', 'Omaly tamin’ny 11 ora sy sasany antoandro dia vaky ny fefiloha manamorona ny reniranon’i Sisaony', '<p><span lang="EN">Andrefan&rsquo;Ambohimandroso, 500m miala ny lalam-pirenena voalohany (RN1) hiditra ny kaominina Fenoarivo. Samy tonga teny ireo Ben&rsquo;ny tan&agrave;na manodidina sy ny zandary avy eo Fenoarivo sy Ampitatafika nizaha ny zava-misy ary nandray ny fepetra ho fisorohana ny loza mety hiseho. Nanomboka omaly alakamisy 9 martsa antoandro dia nanao ny fandaminana sy ny fanentanana ny olona mba tsy hampiasa intsony ny fefiloha ho lalana hivezivezena ny zandarimariam-pirenena eny Fenoarivo noho ny fahavakisan&rsquo;ny reniranon&rsquo;i Sisaony, izay atahorana hitera-doza ho an&rsquo;ireo mponina. Raha ny zava-nisy dia ny maraina tamin&rsquo;ny 6 ora dia efa hita fa tena niakatra be ny haavon&rsquo;ny renirano ary efa maro ireo tra-boina niala ny trano fonenany. Ny antoandro dia vaky ilay fefiloha. Efa nahitana fahavakisana ny reniranon&rsquo;i Sisaony teny Ambohijoky, ka toerana maro no dibo-drano, ary an&rsquo;arivony ny traboina toy ny teny Anosizato. Nahitana fiakarana 0,48 metatra ny reniranon\'Ikopa teny Anosizato tao anatin\'ny 4 ora ka efa tafakatra 3,60 metatra omaly hariva raha 2,86 metatra ny marain. 3,50 metatra ny refy hamaritana ny loza mitatao eny amin\'ny reniranon\'Ikopa eny Anosizato, izay izay efa nihoarana ihany koa. Efa loza mihatra no misy eny an-toerana.</span></p>\r\n<p><span lang="EN">Efa maro ny mponina teny no niala vokatry ny fanentanana. Mbola misy ihany ny misisika ny hiverina haka ny entany. Hentitra anefa ny zandary hiarovana ny ain&rsquo;izy ireo. Nanohy ny fanentanana ny olona mba tsy hanakaiky ilay fefiloha vaky ary nanentana ireo olona izay mbola tavela mba hiala ny trano dibo-drano ny zandary izay hijanona eny an-toerana mandra-piovan&rsquo;ny toe-draharaha ho fiarovana ny ain&rsquo;ireo mponina.</span></p>\r\n<p><span lang="EN">&nbsp;</span></p>\r\n<p><span lang="EN">Toky R</span></p>', 0, 1, 1, 'upload/17-03-11-1489218397.jpg'),
(5, 1, 3, NULL, '2017-03-11', 'VEHIVAVY MIZAKA TENA ARA-TOEKARENA Lasan’ny “Ampela Miray Asa” ny amboara', 'Lasan’ny fikambanam-behivavy “Ampela Miray Asa”, iray tamin’ireo 578 nandray anjara ny amboara tamin’ilay fifaninanana tetikasa “vehivavy mizaka tena ara-toekarena” nokarakarain’ny minisiteran’ny Mponina.', 'Lasan’ny fikambanam-behivavy “Ampela Miray Asa”, iray tamin’ireo 578 nandray anjara ny amboara tamin’ilay fifaninanana tetikasa “vehivavy mizaka tena ara-toekarena” nokarakarain’ny minisiteran’ny Mponina.', '<p><span lang="EN-US">Tetsy amin&rsquo;ny Carlton Anosy omaly no nanambarana izany tamim-pomba &ocirc;fisialy&nbsp;&nbsp;ka nanomezana loka ho an&rsquo;ity fikambanana iray ity izay marihina fa tsy ho tombontsoan&rsquo;ny mpikambana ihany fa mahakasika vehivavy maro ihany koa. Lelavola mitentina 20 tapitrisa Ar no azon&rsquo;ity fikambanam-behivavy iray ity tamin&rsquo;izany, fikambanam-behivavy izay tsiahivina fa&nbsp;&nbsp;avy ao amin&rsquo;ny faritra Androy. Ny tetikasa fambolena zanakazo no tena novolovolain&rsquo;ireo mpikambana tamin&rsquo;izany. Ny fikambanam-behivavy &ldquo;Jeudi des femmes entrepreneur&rdquo;, avy eto amin&rsquo;ny Faritra Analamanga kosa, no nibata ny amboara faharoa ka notolorana&nbsp;&nbsp;lelavola 10 tapitrisa Ar. Ilay tetikasa fanamboarana harona taratasy indray no nosafidian&rsquo;ireto farany, hahafahana miady amin&rsquo;ny fihanaky ny harona sachet eto amintska sy ho fiarovana ny tontolo iainana.&nbsp;</span>Ny fikambanam-behivavy Siana, avy any amin&rsquo;ny distrikan&rsquo;Analalava Faritra&nbsp;&nbsp;Sofia&nbsp;&nbsp;no nibata ny laharana fahatelo ka notolorana lelavola 5 tapitrisa Ar raha lelavola 1 tapitrisa Ar avy&nbsp;&nbsp;kosa no nomena&nbsp;&nbsp;ireo fikambanana 15 nandray anjara tamin&rsquo;ny dingana famaranana. Tsiahivina moa fa nahatratra 1.526 ireo nandray anjara tamin&rsquo;ity fifaninana ity teny am-piandohana saingy ny&nbsp;&nbsp;578 tamin&rsquo;ireo&nbsp;&nbsp;ihany no azo nekena ary ny 18 tamin&rsquo;ireo indray&nbsp;&nbsp;izay nahitana fikambanana telo isaky ny Faritany no voafidy niatrika ny dingana famaranana.</p>\r\n<p>Pati</p>', 0, 1, 2, NULL),
(6, 1, 11, NULL, '2017-03-11', 'Sarisary zaritena 4', '', '', '', 0, 1, 1, 'upload/17-03-11-1489234354.jpg'),
(7, 1, 12, NULL, '2017-03-11', 'Ampamoaka 4', '', '', '', 0, 1, 1, 'upload/17-03-11-1489234736.gif');

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `article_categories`
--
CREATE TABLE `article_categories` (
`idcategorie` int(11)
,`libelle` varchar(45)
,`niveau` smallint(6)
,`rang_cat` smallint(6)
,`idmere` int(11)
,`catmere` varchar(45)
);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `article_journal`
--
CREATE TABLE `article_journal` (
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
,`idmere` int(11)
,`catmere` varchar(45)
,`libelle` varchar(45)
,`level` smallint(6)
,`numeroparution` decimal(8,0)
,`datepublication` date
,`liencouverture` varchar(500)
);

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
(10, 11),
(10, 12),
(10, 13),
(10, 14),
(10, 15),
(10, 16);

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
(1, 'Misongadina', 1, 1),
(2, 'Fiaraha-monina', 1, 1),
(3, 'Toe-karena', 1, 1),
(4, 'Samihafa', 1, 1),
(5, 'Politika', 1, 1),
(6, 'Fanabeazana', 1, 2),
(7, 'Fialam-boly', 1, 2),
(8, 'Iraisam-pirenena', 1, 1),
(9, 'Finoana', 1, 1),
(10, 'Sarisary', 1, 1),
(11, 'Sarisary zaritena', 2, 2),
(12, 'Ampamoaka', 2, 2),
(13, 'Fantsika', 2, 2),
(14, 'Zoro fahaiza-miaina', 2, 2),
(15, 'Invite de Talata', 2, 2),
(16, 'Tetsy sy teroa', 2, 2);

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
,`idmere` int(11)
,`catmere` varchar(45)
,`libelle` varchar(45)
,`level` smallint(6)
,`numeroparution` decimal(8,0)
,`datepublication` date
,`liencouverture` varchar(500)
);

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE `favoris` (
  `idutilisateur2` int(11) NOT NULL,
  `idarticle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `feuille_journal`
--

CREATE TABLE `feuille_journal` (
  `idjournal` int(11) NOT NULL,
  `idmedia` int(11) NOT NULL,
  `num_page` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `datepublication` date NOT NULL,
  `heurepublication` time NOT NULL,
  `extrait` text NOT NULL,
  `contenue` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `filactualite`
--

INSERT INTO `filactualite` (`idfilactualite`, `datepublication`, `heurepublication`, `extrait`, `contenue`) VALUES
(1, '2017-03-12', '23:00:00', 'Tsy nandeha ny jiro  androany tontolo teto an-tanana', 'Tsy nandeha ny jiro  androany tontolo teto an-tanana');

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
  `motdepasse` varchar(40) NOT NULL,
  `imageprofile` varchar(500) DEFAULT NULL
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
  `lienphoto` varchar(300) DEFAULT NULL,
  `dernieremaj` datetime DEFAULT NULL,
  `copyrightphoto` varchar(100) DEFAULT NULL,
  `lien` varchar(500) DEFAULT NULL
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

--
-- Contenu de la table `journal`
--

INSERT INTO `journal` (`idjournal`, `numeroparution`, `datepublication`, `liencouverture`) VALUES
(1, '2400', '2017-03-09', 'upload/couverture/couverture-17-03-09-1489047357.jpg');

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
  `commentaire` text,
  `position` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `publicite`
--

INSERT INTO `publicite` (`idpublicite`, `datedebutdiffusion`, `datefindiffusion`, `alt`, `lienredirection`, `lienimage`, `commentaire`, `position`) VALUES
(1, '2017-03-10', '2017-03-17', 'Lancement  produit', 'sqdfg', 'upload/pub/17-03-10-1489151446.jpg', NULL, 1);

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
-- Doublure de structure pour la vue `sous_categorie`
--
CREATE TABLE `sous_categorie` (
`idcategorie` int(11)
,`libelle` varchar(45)
,`niveau` smallint(6)
,`rang_cat` smallint(6)
,`idmere` int(11)
,`catmere` varchar(45)
);

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
-- Structure de la vue `article_categories`
--
DROP TABLE IF EXISTS `article_categories`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `article_categories`  AS  select `categorie`.`idcategorie` AS `idcategorie`,`categorie`.`libelle` AS `libelle`,`categorie`.`niveau` AS `niveau`,`categorie`.`rang_cat` AS `rang_cat`,`categorie_mere`.`idcategorie` AS `idmere`,`categorie_mere`.`libelle` AS `catmere` from ((`categorie` left join `assoc_sous_categorie` on((`categorie`.`idcategorie` = `assoc_sous_categorie`.`idcategorie2`))) left join `categorie_mere` on((`assoc_sous_categorie`.`idcategorie1` = `categorie_mere`.`idcategorie`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `article_journal`
--
DROP TABLE IF EXISTS `article_journal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `article_journal`  AS  select `detail_article`.`idarticle` AS `idarticle`,`detail_article`.`idjournal` AS `idjournal`,`detail_article`.`idcategorie` AS `idcategorie`,`detail_article`.`idadministrateur` AS `idadministrateur`,`detail_article`.`dateparution` AS `dateparution`,`detail_article`.`titre` AS `titre`,`detail_article`.`extrait` AS `extrait`,`detail_article`.`resume` AS `resume`,`detail_article`.`contenue` AS `contenue`,`detail_article`.`laune` AS `laune`,`detail_article`.`etatpublication` AS `etatpublication`,`detail_article`.`niveau` AS `niveau`,`detail_article`.`lien_image_une` AS `lien_image_une`,`detail_article`.`idmere` AS `idmere`,`detail_article`.`catmere` AS `catmere`,`detail_article`.`libelle` AS `libelle`,`detail_article`.`level` AS `level`,`detail_article`.`numeroparution` AS `numeroparution`,`detail_article`.`datepublication` AS `datepublication`,`detail_article`.`liencouverture` AS `liencouverture` from (`detail_article` join `journal` on((`journal`.`idjournal` = `detail_article`.`idjournal`))) order by `detail_article`.`dateparution` desc ;

-- --------------------------------------------------------

--
-- Structure de la vue `categorie_mere`
--
DROP TABLE IF EXISTS `categorie_mere`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `categorie_mere`  AS  select `categorie`.`idcategorie` AS `idcategorie`,`categorie`.`libelle` AS `libelle`,`categorie`.`niveau` AS `niveau`,`categorie`.`rang_cat` AS `rang_cat` from (`categorie` join `assoc_sous_categorie` on((`categorie`.`idcategorie` = `assoc_sous_categorie`.`idcategorie1`))) group by `categorie`.`idcategorie` ;

-- --------------------------------------------------------

--
-- Structure de la vue `detail_article`
--
DROP TABLE IF EXISTS `detail_article`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_article`  AS  select `article`.`idarticle` AS `idarticle`,`article`.`idjournal` AS `idjournal`,`article`.`idcategorie` AS `idcategorie`,`article`.`idadministrateur` AS `idadministrateur`,`article`.`dateparution` AS `dateparution`,`article`.`titre` AS `titre`,`article`.`extrait` AS `extrait`,`article`.`resume` AS `resume`,`article`.`contenue` AS `contenue`,`article`.`laune` AS `laune`,`article`.`etatpublication` AS `etatpublication`,`article`.`niveau` AS `niveau`,`article`.`lien_image_une` AS `lien_image_une`,`article_categories`.`idmere` AS `idmere`,`article_categories`.`catmere` AS `catmere`,`article_categories`.`libelle` AS `libelle`,`article_categories`.`niveau` AS `level`,`journal`.`numeroparution` AS `numeroparution`,`journal`.`datepublication` AS `datepublication`,`journal`.`liencouverture` AS `liencouverture` from ((`article` join `journal` on((`article`.`idjournal` = `journal`.`idjournal`))) join `article_categories` on((`article`.`idcategorie` = `article_categories`.`idcategorie`))) order by `journal`.`datepublication` desc ;

-- --------------------------------------------------------

--
-- Structure de la vue `last_journal`
--
DROP TABLE IF EXISTS `last_journal`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `last_journal`  AS  select `article_journal`.`idarticle` AS `idarticle`,`article_journal`.`idjournal` AS `idjournal`,`article_journal`.`idcategorie` AS `idcategorie`,`article_journal`.`idadministrateur` AS `idadministrateur`,`article_journal`.`dateparution` AS `dateparution`,`article_journal`.`titre` AS `titre`,`article_journal`.`extrait` AS `extrait`,`article_journal`.`resume` AS `resume`,`article_journal`.`contenue` AS `contenue`,`article_journal`.`laune` AS `laune`,`article_journal`.`etatpublication` AS `etatpublication`,`article_journal`.`niveau` AS `niveau`,`article_journal`.`lien_image_une` AS `lien_image_une`,`article_journal`.`libelle` AS `libelle`,`article_journal`.`level` AS `level`,`article_journal`.`numeroparution` AS `numeroparution`,`article_journal`.`datepublication` AS `datepublication`,`article_journal`.`liencouverture` AS `liencouverture` from `article_journal` where `article_journal`.`datepublication` in (select max(`article_journal`.`datepublication`) AS `datepublication` from `article_journal`) ;

-- --------------------------------------------------------

--
-- Structure de la vue `sous_categorie`
--
DROP TABLE IF EXISTS `sous_categorie`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sous_categorie`  AS  select `categorie`.`idcategorie` AS `idcategorie`,`categorie`.`libelle` AS `libelle`,`categorie`.`niveau` AS `niveau`,`categorie`.`rang_cat` AS `rang_cat`,`categorie_mere`.`idcategorie` AS `idmere`,`categorie_mere`.`libelle` AS `catmere` from ((`categorie` join `assoc_sous_categorie` on((`categorie`.`idcategorie` = `assoc_sous_categorie`.`idcategorie2`))) join `categorie_mere` on((`assoc_sous_categorie`.`idcategorie2` = `categorie`.`idcategorie`))) ;

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
-- Index pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD PRIMARY KEY (`idutilisateur2`,`idarticle`),
  ADD KEY `fk_favoris2` (`idarticle`);

--
-- Index pour la table `feuille_journal`
--
ALTER TABLE `feuille_journal`
  ADD PRIMARY KEY (`idjournal`,`idmedia`),
  ADD KEY `fk_feuille_journal2` (`idmedia`);

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
  ADD PRIMARY KEY (`idfilactualite`);

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
  MODIFY `idarticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idcategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
  MODIFY `idfilactualite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
  MODIFY `idjournal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `idmedia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `publicite`
--
ALTER TABLE `publicite`
  MODIFY `idpublicite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
-- Contraintes pour la table `favoris`
--
ALTER TABLE `favoris`
  ADD CONSTRAINT `fk_favoris` FOREIGN KEY (`idutilisateur2`) REFERENCES `abonnee` (`idutilisateur2`),
  ADD CONSTRAINT `fk_favoris2` FOREIGN KEY (`idarticle`) REFERENCES `article` (`idarticle`);

--
-- Contraintes pour la table `feuille_journal`
--
ALTER TABLE `feuille_journal`
  ADD CONSTRAINT `fk_feuille_journal` FOREIGN KEY (`idjournal`) REFERENCES `journal` (`idjournal`),
  ADD CONSTRAINT `fk_feuille_journal2` FOREIGN KEY (`idmedia`) REFERENCES `media` (`idmedia`);

--
-- Contraintes pour la table `fichiercorruption`
--
ALTER TABLE `fichiercorruption`
  ADD CONSTRAINT `fk_fichiercorruption` FOREIGN KEY (`idcorruption`) REFERENCES `corruption` (`idcorruption`),
  ADD CONSTRAINT `fk_fichiercorruption2` FOREIGN KEY (`idmedia`) REFERENCES `media` (`idmedia`);

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
