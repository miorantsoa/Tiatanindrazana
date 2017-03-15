-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 15 Mars 2017 à 15:46
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

--
-- Contenu de la table `abonnee`
--

INSERT INTO `abonnee` (`idutilisateur2`, `civilite`, `nomutilisateur`, `prenomutilisateur`, `naissanceutilisateur`, `cin`, `datedelivrancecin`, `lieudelivrancecin`, `liencin_recto`, `liencin_verso`, `emailutilisateur`, `identifiant`, `motdepasse`, `statututilisateur`, `idsession`, `imageprofile`) VALUES
(2, 0, 'Rakotozafy', '2017-03-15', '0000-00-00', '2017-03-16', '0000-00-00', 'upload/infouser/Mike-Rakotozafy-pdp7.jpg', 'upload/infouser/Mike-Rakotozafy-pdp8.jpg', 'm@gmail.com', 'id', 'pass', '0', 0, NULL, NULL),
(3, 0, 'Mike', 'Rakotozafy', '2017-03-15', 'sfdfdfedfgfrzzer', '2017-03-16', 'zezerfd', 'upload/infouser/Mike-Rakotozafy-pdp10.jpg', 'upload/infouser/Mike-Rakotozafy-pdp11.jpg', 'm@gmail.com', 'id', 'pass', 0, NULL, 'upload/infouser/Mike-Rakotozafy-pdp9.jpg');

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
(7, 1, 12, NULL, '2017-03-11', 'Ampamoaka 4', '', '', '', 0, 1, 1, 'upload/17-03-11-1489234736.gif'),
(9, 1, 5, NULL, '2017-03-08', 'Filoham-pirenena sy praiminisitra Tsy nisy tany Antsakabary', 'Ny minisitry ny asa vaventy, Eric Razafimandimby, izay sady minisitra mpiahy ny faritr’i Sofia no nirahin’ny filoham-pirenena Hery Rajaonarimampianina sy ny praiminisitra Mahafaly Olivier', 'Ny minisitry ny asa vaventy, Eric Razafimandimby, izay sady minisitra mpiahy ny faritr’i Sofia no nirahin’ny filoham-pirenena Hery Rajaonarimampianina sy ny praiminisitra Mahafaly Olivier', '<p><span lang="EN-US">Nisolotena ny fitondram-panjakana nitondra fanampiana ho an&rsquo;ireo traboina tany amin&rsquo;ny kaominina Ambanivohitra Antsakabary ao amin&rsquo;ny distrikan&rsquo;i Befandriana Avaratra ny fiandohan&rsquo;ny herinandro teo. Vary 84 lasaka miampy kojakoja fampiasa amin&rsquo;ny fiainana andavanandro, toy ny sio miisa 50, koveta 50 ary simenitra 20 lasaka no natolotry ny fitondram-panjakana ho an&rsquo;ireo traboina na teo aza ny tsikera isan-karazany nametra-panontaniana ny maro ny amin&rsquo;ny mbola hifampieran&rsquo;ireo manampahefana nialoha ny nidinana tany an-toerana. Nolazain&rsquo;ny praiminisitra fa hifanaraka ny tenany sy ny filoham-pirenena izay hidina hijery ny zava-misy any amin&rsquo;ity toerana nahamaizana trano maherin&rsquo;ny 400 sy naha traboina vahoaka maro ity.</span></p>\r\n<p><span lang="EN-US">Mirija</span></p>', 0, 1, 1, NULL),
(10, 1, 5, NULL, '2017-03-08', 'Distim sy vehivavy TIM Boriborintany faha-6 Hanao DIABE hihazo ny Lapan’ny tanàna etsy Analakely', 'Ho fanohanana an\'i Neny Lalao Ravalomanana izay vehivavy voalohany nitantana ny Renivohitr\' ity Nosintsika ity dia ho avy hanohana sy ankahery azy amin’ny adidy', 'Ho fanohanana an\'i Neny Lalao Ravalomanana izay vehivavy voalohany nitantana ny Renivohitr\' ity Nosintsika ity dia ho avy hanohana sy ankahery azy amin’ny adidy', '<p><span lang="EN-US">Iantsorohany ny DISTIM eny amin&rsquo;ny boriborintany faha-6 eto andrenivohitra miaraka amin&rsquo;ny depiote Rasoanoromalala Horace sy ireo vehivavy TIM dia hanao DIABE miainga eny amin&rsquo;ny Firaisana Anosisoa ka hihazo ny&nbsp;&nbsp;Lapan\'ny tan&agrave;na etsy Analakely. Hanotrona azy ireo koa ireo lehilahy ao amin&rsquo;ity Distim ity.</span></p>\r\n<p><span lang="EN-US">Ntsoavina Evariste</span></p>', 0, 1, 1, NULL),
(11, 1, 17, NULL, '2017-03-08', 'Asehoy amin’izay e !', 'Aiza amin’izay ry Jean ilay fahaizanareo tamin’ny andron’ny frankofonia ireny a ! Hainareo ery ny nifaninana tamin’ilay nahary ka nanakana ny orana tokony hirotsaka mba tsy hanimba ny rendrarendranareo mianakavy.', 'Aiza amin’izay ry Jean ilay fahaizanareo tamin’ny andron’ny frankofonia ireny a ! Hainareo ery ny nifaninana tamin’ilay nahary ka nanakana ny orana tokony hirotsaka mba tsy hanimba ny rendrarendranareo mianakavy.', '<p>Tamin&rsquo;ireny no nilana izany orana izany ho an&rsquo;ny fambolen&rsquo;ny Malagasy efa mitrongy vao homana saingy ny sitraponareo aloha no laharam-pahamehana, hany ka nivadika ambony ambany ny tantara ka dia nijinja ny hetraketraketrakareo tamin&rsquo;ny alalan&rsquo;ny fiaretana haintany mahatsiravina ny Malagasy tsy vakivolo. Asehoy amin&rsquo;izay ry Jean ny fahaizanareo tamin&rsquo;ireny fa ianareo anie no handrasanay amin&rsquo;izao loza tsy roa aman-tany mahazo anay izao. Aiza ilay fanakanana ny orana tsy hilatsaka no tsy mba hampiasaina hanakanana ity rivo-doza mahatsiravina ity e&nbsp;! Asehoy ry Jean ny talenta fa ianareo anie toa mibontsimbotsina ery hoe afaka mifaninana amin&rsquo;ilay nahary e!&nbsp;<span lang="EN-US">Miandry anareo izahay ry Jean fa aza misitri-belona any ianareo mianakavy a&nbsp;! Ary tadidio ihany koa fa ianareo no fototry ny loza rehetra eto amin&rsquo;ity firenena ity. Raha tsy nampanjakainareo ny fandripahana ny ala sy ny harem-pirenena tsy dia hamotika zavatra betsaka firy io loza voajanahary tombanana hamotika sy handripaka olona io. Izay no mahavoa antsika tsy mahalala afatsy ny anio, ka atao ahoana fa tsy maintsy mizaka ny vokany e !</span></p>\r\n<p><span lang="EN-US">Marco&nbsp;&nbsp;leo sy tofoka an&rsquo;i Jean</span></p>', 0, 1, 1, NULL),
(12, 1, 1, NULL, '2017-03-15', 'Fosafosa amin’ny facebook Migadra herintaona i Hiary', 'Na dia efa nanala ny fitoriany an’ilay mpanakanto mpandrindra ny vondrona ao anaty tambajotra facebook “Fifosana hanatsarana people gasy”, Hiary Rampanoelina, daholo aza ireo voatohintohina rehetra tamin’ity raharaha ity dia tsy afa-bela ny voampanga', 'Na dia efa nanala ny fitoriany an’ilay mpanakanto mpandrindra ny vondrona ao anaty tambajotra facebook “Fifosana hanatsarana people gasy”, Hiary Rampanoelina, daholo aza ireo voatohintohina rehetra tamin’ity raharaha ity dia tsy afa-bela ny voampanga', '<p><span lang="EN-US">Noraisin&rsquo;ny fampanoavana ho anisan&rsquo;ny firaisana tsikombakomba amin&rsquo;ny mpanao ratsy ny famelana ilay fandrahonana haka an-keriny zanaky ny depiote Harijaona Randriarimalala na Jaona Elite nivoaka tao amin&rsquo;ny rindrin&rsquo;ity vondrona ity ka dia izay no antony tsy nahafahan&rsquo;ny fitsarana hanafaka madiodio an&rsquo;i Hiary. Voasazy higadra herintaona sazy mihatra izy ary nafahana noho ny fisalasalana kosa ny vadiny. Omaly moa no nivaly teny amin&rsquo;ny lapan&rsquo;ny fitsarana Anosy ity raharaha ity rehefa avy nisintona sy nandinika izany hatramin&rsquo;ny 28 febroary teo ireo mpitsara. Mbola afaka mampiakatra fitsarana ambony na miantso fandravana ny didy ny mpisolovava an\'i Hiary. Maro no taitra tamin\'ity didim-pitsarana ity saingy raha ny filazana mpitsara iray dia io no izy ary mitombina tsara satria izay no mifanaraka amin\'ialy vesatra niampangana azy.</span></p>\r\n<p>Mirija</p>', 0, 1, 0, NULL),
(13, 2, 1, NULL, '2017-03-15', 'Bemarenina ny fanjakana Hiverina ny Magro ?', 'Efa tena nandefitra i Marc Ravalomanana raha ny zavatra niainany sy nampizakaina azy teto Madagasikara no dinihina. Naongana teo amin’ny fitondrana ka voatery nanao sesitany ny tenany tany ivelany', 'Efa tena nandefitra i Marc Ravalomanana raha ny zavatra niainany sy nampizakaina azy teto Madagasikara no dinihina. Naongana teo amin’ny fitondrana ka voatery nanao sesitany ny tenany tany ivelany', '<p><span lang="EN-US">Taorian&rsquo;ny naha sesitany azy 7 taona dia nogadraina sy nanaovana antsojay isan-karazany indray izy rehefa tonga teto an-tanindrazana. Ny fahapotehan&rsquo;ny fananany tsy misy resaka fa mbola tadiavina ny hevitra rehetra hanagiazana ny fananany sisa tavela toy ny Tiko any Andranomanelatra sy ny tany misy ny Magro Toamasina, ny tany eny Andohatapenaka&hellip; Manaja hatrany ny fanjakana i Marc Ravalomanana, manaja ny lal&agrave;na, fa ilay fanapenam-bava kosa efa tena mihoatra ny mety. Miezaka miresaka sy mangataka am-pahatsorana amin&rsquo;ny fanjakana ny hanokafana ny haino aman-jery&nbsp;&nbsp;MBS (Malagasy Broadcasting System) izy saingy minia tsy te hahalala ny mpitondra fa manao bemarenina hatrany, izay endrika iray hanaporofoana fa tapenam-bava sy sakanana mafy tsy hanapariaka ny heviny manoloana ny raharaham-pirenena ny tenany. Ny fanokafana io orinasan-tserasera io no mba hany hahafahan&rsquo;i Marc Ravalomanana sy mpiara-dia aminy mifanerasera. Rehefa tsy manana haino aman-jery hanaovany ny serasera amin&rsquo;ny mpomba azy izy dia mazava ho azy izany fa mety hifanerasera mivantana amin&rsquo;ny vahoaka eny an-kianja indray ary eny mifampita vaovao. Efa nilaza ny ho firotsahany hofidiana filoham-pirenena i Marc Ravalomanana sy ny mpanao politika sasany saingy ny maro manana vahana sy tombondahiny amin&rsquo;ny resaka orinasan-tserasera fa izy kosa hanaovana antsojay. Manana tombo-dahiny hatrany i Hery Rajaonarimampianina amin&rsquo;ny famelana an-kalalahana ireo haino aman-jery tsy miankina maro mpanohana ny fitondrana HVM, izay vao haingana avokoa no niforonan&rsquo;ny ankamaroany. I Andry Rajoelina manana ny orinasan-tseraserany, i Edgard Razafindravahy manana ny azy manokana, Hajo Andrianainarivelo manana&hellip; Eny amin&rsquo;ny Magro izany i Marc Ravalomanana no mety hifamotoana amin&rsquo;ny mpanohana azy atsy ho atsy rehefa minia manampi-tsofina sy te hanampim-bava azy ny fanjakana.</span></p>\r\n<p><span lang="EN-US">&nbsp;</span></p>\r\n<p align="right">Toky R</p>', 1, 1, 1, 'upload/17-03-15-1489566266.jpg'),
(14, 2, 5, NULL, '2017-03-14', 'Antalaha Niesona tao amin’ny Aéroport ny praiminisitra', 'Tonga ny mpandeha, ny mpanamory tsy hita. Niesona tao amin’ny seranam-piaramanidina Antalaha efa ho adim-pamantaranandro iray latsaka ny delegasion’ny governemanta notarihin’ny\r\n\r\npraiminisitra Solonandrasana Mahafaly Olivier ny zoma 10 martsa teo', 'Tonga ny mpandeha, ny mpanamory tsy hita. Niesona tao amin’ny seranam-piaramanidina Antalaha efa ho adim-pamantaranandro iray latsaka ny delegasion’ny governemanta notarihin’ny\r\n\r\npraiminisitra Solonandrasana Mahafaly Olivier ny zoma 10 martsa teo', '<p><span lang="EN-US">Tsy firindran&rsquo;ny fandaharam-potoana no niteraka ny fangalapiery. Samy tany an-toerana nijery ny takaitra vokatry ny fandalovan&rsquo;ny rivodoza Enawo ny filoha sy ny praiminisitra. Nandeha helik&ocirc;ptera avy any Maroantsetra ny filoha ary namantana avy hatrany tao amin&rsquo;ny kianja monisipalin&rsquo;Antalaha. Nandeha fiaramanidina kosa ireo mambran&rsquo;ny governemanta notarihin&rsquo;ny praiminisitra ary niantsona ao amin&rsquo;ny seranam-piaramanidina. Tamin&rsquo;ny sivy ora no tokony ho nahatongavan&rsquo;ireto mpitondra ireto tany an-toerana saingy nisy fahatarana ora telo ny fahatongavan&rsquo;ny filoha, hany ka nanala fehi-tenda manga hatramin&rsquo;ny mpanotrona, ny andro rahateo nafana nigaingaina. Tamin&rsquo;ny 11ora no nihazo an&rsquo;Antalaha, 12km miala ny seranam-piaramanidina ny delegasionan&rsquo;ny governemanta.</span><span lang="EN-US">&nbsp;Tokony ho amin&rsquo;ny roa ora sy sasany latsaka teo no tafaverina tao amin&rsquo;ny seranam-piaramanidina ireto farany. Tsy tratra tao an-toerana ireo mpanamory fa nitady sakafo tany an-tan&agrave;nan&rsquo;Antalaha noho ny fiovan&rsquo;ny fandaharam-potoana, niala antsasakadiny talohan&rsquo;ny nahatongavan&rsquo;ireo minisitra. Tamin&rsquo;ny telo ora tolakandro ireo mpanamory vao tafaverina. Niesona niandry teo ireo manampahefana, izay tonga tanam-polo nanatitra kabary sy fampanantenana rahateo.</span></p>\r\n<p><span lang="EN-US">Nangonin&rsquo;i Jean D.</span></p>', 0, 1, 1, NULL),
(15, 2, 5, NULL, '2017-03-15', 'Filankevitry ny Fampihavanana Malagasy 11 amin’ny 33 no hotendren’ny filoha', 'Nankatoavin’ny filankevitry ny minisitra ny herinanrdo lasa teo ny fananganana ny komity hisahana ny fifantenana sy fanendrena ireo mpikambana vaovao handrafitra ny Filankevitry ny Fampihavanana Malagasy (FFM) amin’ny endriny vaovao.', 'Nankatoavin’ny filankevitry ny minisitra ny herinanrdo lasa teo ny fananganana ny komity hisahana ny fifantenana sy fanendrena ireo mpikambana vaovao handrafitra ny Filankevitry ny Fampihavanana Malagasy (FFM) amin’ny endriny vaovao.', '<p><span lang="EN-US">Miisa 9 izy ireo, izay ahitana mpanao politika, fiarahamonim-pirenena, mpahay lal&agrave;na, ary raiamandreny ara-panahy sy ara-drazana. Nambaran&rsquo;i Maka Alphonse, iray amin&rsquo;ireo komity omaly, fa miisa&nbsp;&nbsp;33 ireo mpikambana handrafitra ny FFM, ka ny 22 dia hotendrena ary ny 11 kosa no hotendren&rsquo;ny filoham-pirenena mivantana. Iray avy isaky ny faritra kosa no hivoahan&rsquo;ireo 22 hotendren&rsquo;ny komity manokana, ka mila manatitra ny antontan-taratasiny eo anivon&rsquo;ny komity mpanao sivana ireo izay te hiditra ho mpikambana vaovao anatin&rsquo;ny FFM. Araka ny andininy faha-13 ao anatin&rsquo;ny lal&agrave;na mikasika ny fananganana io filankevitra io, dia tsy tokony ho mpanao politika no handrafitra azy io. Voafaritra ao anatin&rsquo;ny andininy faha-16 kosa fa olona mizaka ny zom-pirenena Malagasy, tsy latsaky ny 40 taona ary tsy mbola nigadra. Olona tokony hanana fahaiza-manao momba ny fampihavanana sy fametrahana lamina politika eto amin&rsquo;ny firenena ihany koa ary tsy mbola nanao fanambarana ampahibemaso fa tsy ilaina ny fampihavanam-pirenena. Raha ny fahitana azy ary efa niteraka adihevitra teto amin&rsquo;ny firenena ny hoe ny filoha dia anisan&rsquo;ny olona hampihavanina, kanefa izy no hanendry ny ampahany ao anatin&rsquo;ity filankevitra ity, izay mety hiteraka fitongilanana ihany. Ny hirariana dia mba handeha amin&rsquo;izay ny tena fampihavanam-pirenena satria efa tena mijaly ary leo krizy ny Malagasy.</span></p>\r\n<p><span lang="EN-US">&nbsp;</span></p>\r\n<p>Toky R</p>', 0, 1, 1, NULL),
(16, 2, 17, NULL, '2017-03-14', 'Ho tratra foana anie e…', 'Miarahaba anao jean a..efa tena mandeha tsara ve ilay ankety e, sao mantsy vitan’ny raharaham-pihavanana misy tsindry bokotra eo indray ny raharaha famonoan’olona sy fandoroana tanana tany avaratra andrefana farany teo iny a.Fa tena fady anareo mihitsy ve ilay mba mampita vaovao e ?Avy eo rehefa misy zavatra mivoaka tonga fofona be nareo fa hoe vaovao diso.', 'Miarahaba anao jean a..efa tena mandeha tsara ve ilay ankety e, sao mantsy vitan’ny raharaham-pihavanana misy tsindry bokotra eo indray ny raharaha famonoan’olona sy fandoroana tanana tany avaratra andrefana farany teo iny a.Fa tena fady anareo mihitsy ve ilay mba mampita vaovao e ?Avy eo rehefa misy zavatra mivoaka tonga fofona be nareo fa hoe vaovao diso.', '<p><span lang="EN-US">Ka omeo ny vaovao marina sy ara-potoana ary izahay e.Sao ianao ry jean mihevitra fa hoe adino iny afera iny a, tena manaraka akaiky an&rsquo;iny na ny eto an-toerana na ny any ivelany koa raha mitamatama eo ianareo dia ahita raharaha a.Sao dia heverinao fa nandra daholo ary ny olona eto an-tanana eto ry jean a.Iny eo ihany fa mba ahoana koa moa ry jean ny momba an&rsquo;ireo boaderozy trata teny afovoan-dranomasina nifanenjehana iny a..Toa tsy nisy tohiny intsony, aiza izao ireny hazo tratra ireny.Mbola mananatra anao ihany aho ry jean a, mba matahora an&rsquo;Andriamanitra dia aza tia an&rsquo;io kiafinafina io fa tsy maintsy ho hitan&rsquo;ny olona foana anie ny nafenina e.Izay aloha fa mazotoa ianao ry jean a.</span></p>\r\n<p><span lang="EN-US">Marco</span></p>', 0, 1, 1, NULL),
(17, 2, 1, NULL, '2017-03-14', 'Takaitra navelan\'i Enawo Mankahery ny Malagasy i Etazonia sy Frantsa', 'Sesilany ny fanambarana ataon’ireo firenen-dehibe, izay maneho hatrany ny fiombonam-po amin’ny Malagasy manoloana ny loza voajanahary izay namoizana ain’olona maro.', 'Sesilany ny fanambarana ataon’ireo firenen-dehibe, izay maneho hatrany ny fiombonam-po amin’ny Malagasy manoloana ny loza voajanahary izay namoizana ain’olona maro.', '<p><span lang="EN-US">Nanamafy ny azy ny Amerikanina omaly, ka&nbsp;&nbsp;maneho ny fiaraha-miory tanteraka amin\'ireo fianakaviana izay namoy ny havany vokatry ny fandalovan\'ny rivodoza Enawo, tamin&rsquo;ny alalan&rsquo;ny masoivohony eto Madagasikara. Nanamafy ny fiaraha-miasa akaiky amin\'ny governemanta Malagasy sy ireo mpiara-miombon\'antoka aminy amin\'ny fandrefesana ireo fahasimbana sy takaitra navelan\'i Enawo ity firenen-dehibe ity. Tsiahivina fa efa nisy fanolorana fanampiana ara-tsakafo milanja 100 taonina toy ny vary, voamaina, menaka ho an\'ireo traboina manodidina ny 20.000 eto Antananarivo Renivohitra nataon&rsquo;ny fandaharan\'asa iraisam-pirenena momba ny sakafo na ny PAM ny faran\'ny herinandro teo. Niara-niombon\'antoka betsaka tamin\'izany ny Amerikanina tamin\'ny alalan\'ny USAID. Nanao fanambarana ihany koa ny "Quai d\'Orsay"&nbsp;&nbsp;na ny ministeran\'ny raharaham-bahiny Frantsay omaly, ka maneho fiaraha-miory amin\'ny fianakavian\'ireo namoy ny ainy sy ireo traboina ana hetsiny tamin\'ny rivodoza "Enawo" . Mafy ny fahavoazana tany avaratry ny Nosy izay namotika zavatra maro. Maneho firahalahiana amin\'ireo niharam-boina rehetra ny Frantsay ary milaza ho vonona amin\'ny fanampiana ara-materialy.</span></p>\r\n<p>Toky R</p>', 0, 1, 1, NULL),
(18, 2, 1, NULL, '2017-03-14', 'TRABOINA AO ANOSIPATRANA Tafakatra 200 ireo milahatra fanampiana raha 50 no tena izy', '14/03/2017\r\n\r\nTena be dia be tokoa ireo olon-tsotra manararaotra ireo traboina tsy manan-kialofana eto an-drenivohitra amin’izao fotoana izao.', '14/03/2017\r\n\r\nTena be dia be tokoa ireo olon-tsotra manararaotra ireo traboina tsy manan-kialofana eto an-drenivohitra amin’izao fotoana izao.', '<p><span lang="EN-US">Araka ny fitarainan&rsquo;ireo traboina mitoby etsy amin&rsquo;ny fokontany Anosipatrana Atsinanana omaly dia tafakatra 200 izy ireo rehefa tonga ny fanampiana nefa 50 isa no tena ho izy. Zara raha&nbsp;&nbsp;misy tonga any amin&rsquo;ireo traboina ny anjara fanampiany vokatr&rsquo;izany fa ireo olon-kafa avy any ivelany avokoa no mahazo ny tombontsoa. Miantso ireo tompon&rsquo;andraikitra voakasika araka izany ireto traboina ao Anosipatrana ireto mba hanara-maso akaiky ny fanampiana hatolotra azy ireny.</span></p>\r\n<p><span lang="EN-US">Pati</span></p>', 0, 1, 1, NULL),
(19, 2, 18, NULL, '2017-03-14', 'Fidirana ho mpiasam-panjakana 200 monja ireo mpampivelona voaray ', '200 monja tamin’ireo mpampivelona marobe nifaninana hiditra ho mpiasam-panjakana tamin’ity taona 2017 ity no voaray ary telo ny mpitsabo mpanampy', '200 monja tamin’ireo mpampivelona marobe nifaninana hiditra ho mpiasam-panjakana tamin’ity taona 2017 ity no voaray ary telo ny mpitsabo mpanampy', '<p><span lang="EN-US">Tena nitotongana tokoa ireo isa ireo raha oharina tamin&rsquo;ny taon-dasa, antony nanosika ny sekoly ambony INSPNMAD tarihin&rsquo;ny filoha tale jeneraliny Razanadrakoto Roland Albert namolavola ilay boky misy ny &ldquo;Programme national &eacute;ducatif Inspnmad&rdquo; taom-pianarana 2016-2017 hampiharina tsy ho ela ho an&rsquo;ireo mpianatra Paramed manaraka fiofanana ao aminy. Ankoatra izay, mbola betsaka amin&rsquo;ireo sekoly ambony any amin&rsquo;ny faritra eto amintsika no tsy mahalala akory ny mikasika ilay fanadinana nasionaly tokana sy ny rafitra LMD kasain&rsquo;ny fakiolten&rsquo;ny mpitsabo hotanterahina eto amintsika ny volana novambra ho avy izao ho an&rsquo;ny IFIRP sy ny sekoly manofana ho paramed tsy miankina nahazo fankatoavana avy amin&rsquo;ny fanjakana. Tamin&rsquo;ny alalan&rsquo;ny fitsidiham-paritra notanterahin&rsquo;ny CMR-Paramed no nahafantarana izany ka teraka ho azy io fandaharam-pianaran&rsquo;ny sekoly manokana io. Tanjony ny hanofana olona Hendry, mahay ary manam-pahalalana hisorohana ireo karazana tranga eny anivon&rsquo;ny hopitaly mampihen-danja ny mpitsabo mpanampy sy mpampivelona. Eo ihany koa ny hahafahana miaro ny ain&rsquo;ny vahoaka manontolo amin&rsquo;ny alalan&rsquo;ny fanofanana omena ireo mpianatra sy ny toe-tsaina vonona apetraka any anatin&rsquo;izy ireo.</span></p>\r\n<p><span lang="EN-US">Pati</span></p>', 0, 1, 1, NULL),
(20, 2, 3, NULL, '2017-03-15', 'Fitrandrahan’ny Sinoa “gaz” ao Sakaraha Ahiana hivadika gidragidra', 'Tsy eken’ireo vahoaka ny fanitarana tany ataon’ireo sinoa mitrandraka etona natoraly mankany amin’ny faritra fanajariana razana alohan’ny toeram-pandevenana.', 'Tsy eken’ireo vahoaka ny fanitarana tany ataon’ireo sinoa mitrandraka etona natoraly mankany amin’ny faritra fanajariana razana alohan’ny toeram-pandevenana.', '<p><span lang="EN-US">Nanizingizina ireo vahoaka tamin&rsquo;ny fanambarana nataon&rsquo;izy ireo tamin&rsquo;ny fidinana ifotony nataon&rsquo;ny Solombavambahoakan&rsquo;i Madagasikara voafidy tao Sakaraha Tinoka Roberto, nijery ny zava-misy taorian&rsquo;ny fitarainan&rsquo;ny vahoaka sy ny avy ao amin&rsquo;ny foko Tesomangy (tompon&rsquo;ny toeram-pandevenana) ary Ben&rsquo;ny tan&agrave;nan&rsquo;i Mahaboboka, ny faramparan&rsquo;ny herinandro iny, fa &ldquo;&nbsp;lavinay hatramin&rsquo;ny farany ny hakana sy hitrongisana an&rsquo;ireo toerana masina misy ny fasanay.&ldquo;.&nbsp;Maro amin&rsquo;ireo fifanarahana nifanaovana tamin&rsquo;ny sinoa mpitrandraka no tsy tanteraka mandrak&rsquo;ankehitriny, toy ny fananganana sekoly, hopitaly ary ny fanomezana rano fisotro madio. &ldquo;&nbsp;Tsy misy tombontsoa azonay mihitsy amin&rsquo;ity fitrandrahana ity. Na ny vola onitra amin&rsquo;ny tanimbarinay nosimbana sy nopotehina aza tsy azo. In-dray nandeha ihany izahay nomen&rsquo;ny sinoa vola, raha tokony ho isan-taona ny fandoavana izany, araka ny fifanarahana nisy sy natao. Rahonana sy fitapitahina ary ampihorohoroana foana izahay vahoaka raha vao mitaky ny volanay&nbsp;&ldquo;.</span></p>\r\n<h3><span lang="EN-US">&nbsp;Baikon&rsquo;ny minisitra</span></h3>\r\n<p><span lang="EN-US">&nbsp;</span><span lang="EN-US">Raha tian&rsquo;ireo sinoa, hoy ny rodoben&rsquo;ireto vahoaka, ny hitohizan&rsquo;ny fitrandrahana etona eto, dia tokony hotanterahina aloha ireo fampanantenana natao. Raha ny fanazavana azo hatrany, tsy hajain&rsquo;ireto sinoa mitrandraka etona ao Mahaboboka ihany koa ny voasoratra ao anatin&rsquo;ny bokin&rsquo;andraikitra. Raha nanontaniana kosa ny ampahany amin&rsquo;ireo sinoa mpiandry raharaha tao amin&rsquo;ity toeram-pitrandrahana ity, dia nilaza fa tsy mahafantatra na inona na inona. &ldquo;&nbsp;Any amin&rsquo;ny minisitra ianareo manontany&nbsp;fa mpanatanteraka baiko fotsiny&nbsp; izahay eto&nbsp;&ldquo;, hoy ireo sinoa. Ahiana ho toy ny tranga niseho tao Soamahamanina ny zavatra hisy any amin&rsquo;ny kaominina ambanivohitr&rsquo;i Mahaboboka, any amin&rsquo;ny distrikan&rsquo;i Sakaraha, faritra Atsimo Andrefana, raha tsy voalamin&rsquo;ny tompon&rsquo;andraikitra mahefa haingana ny toe-draharaha misy any an-toerana ankehitriny.</span></p>\r\n<p align="right"><span lang="EN-US">Eric R.</span></p>', 0, 1, 1, NULL),
(21, 2, 11, NULL, '2017-03-14', 'Sarisary', '', '', '', 0, 1, 1, 'upload/17-03-15-1489569180.jpg');

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

--
-- Contenu de la table `assoc_cat_souscat`
--

INSERT INTO `assoc_cat_souscat` (`idcatbeinfo`, `cat_idcatbeinfo`) VALUES
(17, 18),
(17, 19),
(17, 20),
(17, 21);

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
(16, 'Tetsy sy teroa', 2, 2),
(17, 'Taratasy ho an\'i jean', 1, 1),
(18, 'Fahasalamana', 1, 1);

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

--
-- Contenu de la table `categorieinfoutile`
--

INSERT INTO `categorieinfoutile` (`idcatbeinfo`, `libelle`, `niveau`) VALUES
(1, 'Tantara', 1),
(2, 'Politika', 1),
(3, 'Fizahan-tany', 1),
(4, 'Toe-karena', 1),
(5, 'Jeografia', 1),
(6, 'Tontolo iainana', 1),
(7, 'Koltoraly', 1),
(8, 'Procédure administrative', 1),
(9, 'Fahasalamana', 1),
(10, 'Fanabeazana', 1),
(11, 'Fampianarana', 1),
(12, 'Fitsarana', 1),
(13, 'Fananan-tany', 2),
(14, 'Sampan-draharaha itsinjaram-pahefana', 1),
(15, 'Fanatanjahan-tena', 1),
(16, 'CIM', 1),
(17, 'Services', 1),
(18, 'Pharmacie', 2),
(19, 'Police', 2),
(20, 'Gendarmerie', 2),
(21, 'Ambulance', 2);

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
-- Doublure de structure pour la vue `categorie_mere_info`
--
CREATE TABLE `categorie_mere_info` (
`idcatbeinfo` int(11)
,`libelle` varchar(45)
,`niveau` smallint(6)
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
-- Doublure de structure pour la vue `detail_info_utile`
--
CREATE TABLE `detail_info_utile` (
`idbeinfo` int(11)
,`idcatbeinfo` int(11)
,`titre` varchar(255)
,`contenue` text
,`lienphoto` varchar(300)
,`dernieremaj` datetime
,`copyrightphoto` varchar(100)
,`lien` varchar(500)
,`libelle` varchar(45)
,`idmere` int(11)
,`catmere` varchar(45)
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

--
-- Contenu de la table `infoutil`
--

INSERT INTO `infoutil` (`idbeinfo`, `idcatbeinfo`, `titre`, `contenue`, `lienphoto`, `dernieremaj`, `copyrightphoto`, `lien`) VALUES
(1, 18, 'Test be Infp', 'test be info bedebe\r\n', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Doublure de structure pour la vue `info_utile_categorie`
--
CREATE TABLE `info_utile_categorie` (
`idcatbeinfo` int(11)
,`libelle` varchar(45)
,`niveau` smallint(6)
,`idmere` int(11)
,`catmere` varchar(45)
);

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
(1, '2400', '2017-03-09', 'upload/couverture/couverture-17-03-14-1489481493.jpg'),
(2, '2287', '2017-03-14', 'upload/couverture/couverture-17-03-15-1489566102.jpg');

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
-- Doublure de structure pour la vue `sous_categorie_info`
--
CREATE TABLE `sous_categorie_info` (
`idcatbeinfo` int(11)
,`libelle` varchar(45)
,`niveau` smallint(6)
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
-- Structure de la vue `categorie_mere_info`
--
DROP TABLE IF EXISTS `categorie_mere_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `categorie_mere_info`  AS  select `categorieinfoutile`.`idcatbeinfo` AS `idcatbeinfo`,`categorieinfoutile`.`libelle` AS `libelle`,`categorieinfoutile`.`niveau` AS `niveau` from (`categorieinfoutile` join `assoc_cat_souscat` on((`categorieinfoutile`.`idcatbeinfo` = `assoc_cat_souscat`.`idcatbeinfo`))) group by `categorieinfoutile`.`idcatbeinfo` ;

-- --------------------------------------------------------

--
-- Structure de la vue `detail_article`
--
DROP TABLE IF EXISTS `detail_article`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_article`  AS  select `article`.`idarticle` AS `idarticle`,`article`.`idjournal` AS `idjournal`,`article`.`idcategorie` AS `idcategorie`,`article`.`idadministrateur` AS `idadministrateur`,`article`.`dateparution` AS `dateparution`,`article`.`titre` AS `titre`,`article`.`extrait` AS `extrait`,`article`.`resume` AS `resume`,`article`.`contenue` AS `contenue`,`article`.`laune` AS `laune`,`article`.`etatpublication` AS `etatpublication`,`article`.`niveau` AS `niveau`,`article`.`lien_image_une` AS `lien_image_une`,`article_categories`.`idmere` AS `idmere`,`article_categories`.`catmere` AS `catmere`,`article_categories`.`libelle` AS `libelle`,`article_categories`.`niveau` AS `level`,`journal`.`numeroparution` AS `numeroparution`,`journal`.`datepublication` AS `datepublication`,`journal`.`liencouverture` AS `liencouverture` from ((`article` join `journal` on((`article`.`idjournal` = `journal`.`idjournal`))) join `article_categories` on((`article`.`idcategorie` = `article_categories`.`idcategorie`))) order by `journal`.`datepublication` desc ;

-- --------------------------------------------------------

--
-- Structure de la vue `detail_info_utile`
--
DROP TABLE IF EXISTS `detail_info_utile`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `detail_info_utile`  AS  select `infoutil`.`idbeinfo` AS `idbeinfo`,`infoutil`.`idcatbeinfo` AS `idcatbeinfo`,`infoutil`.`titre` AS `titre`,`infoutil`.`contenue` AS `contenue`,`infoutil`.`lienphoto` AS `lienphoto`,`infoutil`.`dernieremaj` AS `dernieremaj`,`infoutil`.`copyrightphoto` AS `copyrightphoto`,`infoutil`.`lien` AS `lien`,`info_utile_categorie`.`libelle` AS `libelle`,`info_utile_categorie`.`idmere` AS `idmere`,`info_utile_categorie`.`catmere` AS `catmere` from (`infoutil` join `info_utile_categorie` on((`infoutil`.`idcatbeinfo` = `info_utile_categorie`.`idcatbeinfo`))) ;

-- --------------------------------------------------------

--
-- Structure de la vue `info_utile_categorie`
--
DROP TABLE IF EXISTS `info_utile_categorie`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `info_utile_categorie`  AS  select `categorieinfoutile`.`idcatbeinfo` AS `idcatbeinfo`,`categorieinfoutile`.`libelle` AS `libelle`,`categorieinfoutile`.`niveau` AS `niveau`,`categorie_mere_info`.`idcatbeinfo` AS `idmere`,`categorie_mere_info`.`libelle` AS `catmere` from ((`categorieinfoutile` left join `assoc_cat_souscat` on((`categorieinfoutile`.`idcatbeinfo` = `assoc_cat_souscat`.`cat_idcatbeinfo`))) left join `categorie_mere_info` on((`assoc_cat_souscat`.`idcatbeinfo` = `categorie_mere_info`.`idcatbeinfo`))) ;

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

-- --------------------------------------------------------

--
-- Structure de la vue `sous_categorie_info`
--
DROP TABLE IF EXISTS `sous_categorie_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sous_categorie_info`  AS  select `categorieinfoutile`.`idcatbeinfo` AS `idcatbeinfo`,`categorieinfoutile`.`libelle` AS `libelle`,`categorieinfoutile`.`niveau` AS `niveau`,`categorie_mere_info`.`idcatbeinfo` AS `idmere`,`categorie_mere_info`.`libelle` AS `catmere` from ((`categorieinfoutile` join `assoc_cat_souscat` on((`assoc_cat_souscat`.`cat_idcatbeinfo` = `categorieinfoutile`.`idcatbeinfo`))) join `categorie_mere_info` on((`categorie_mere_info`.`idcatbeinfo` = `assoc_cat_souscat`.`idcatbeinfo`))) ;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `abonnee`
--
ALTER TABLE `abonnee`
  ADD PRIMARY KEY (`idutilisateur2`);

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
  ADD PRIMARY KEY (`idtypeabon`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `abonnee`
--
ALTER TABLE `abonnee`
  MODIFY `idutilisateur2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
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
  MODIFY `idarticle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idcategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT pour la table `categoriecorruption`
--
ALTER TABLE `categoriecorruption`
  MODIFY `idcatcorruption` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `categorieinfoutile`
--
ALTER TABLE `categorieinfoutile`
  MODIFY `idcatbeinfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
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
  MODIFY `idbeinfo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `journal`
--
ALTER TABLE `journal`
  MODIFY `idjournal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
