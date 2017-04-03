<!DOCTYPE html>
<head>
    <!-- Your Basic Site Informations -->
    <title><?= $titre?></title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="description" content="Enews is a news or magazine site template that built with very cool responsive template with clean design, fast load, seo friendly, beauty color and a slew of features." />
    <meta name="keywords" content="Site Template, News, Magazine, Portofolio, HTML, CSS, jQuery, Newsletter, PHP Contact, Subscription, Responsive, Marketing, Clean, SEO" />
    <meta name="author" content="Dots Theme" />

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta property="og:url"           content="http://agile-cliffs-67001.herokuapp.com/" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Your Website Title" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= base_url('assets/default/css/bootstrap-responsive.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/default/css/flexslider.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/default/css/prettyPhoto.css')?>">
    <link rel="stylesheet" href="<?= base_url()?>assets/default/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/default/css/style.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/default/css/color.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

    <noscript><link rel="stylesheet" href="<?= base_url()?>/assets/default/css/no-js.css"></noscript> <!-- If JavaScript Disabled -->

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?= base_url()?>/assets/default/images/favicon.ico">
    <link rel="apple-touch-icon" href="<?= base_url()?>/assets/default/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url()?>/assets/default/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url()?>/assets/default/images/apple-touch-icon-114x114.png">

    <!-- JavaScript -->
    <script type="text/javascript" src="<?= base_url()?>/assets/default/js/jquery-1.8.3.min.js"></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/bootstrap.min.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.easing.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.flexslider-min.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jflickrfeed.min.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.fitvids.min.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.lazyload.mini.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.prettyPhoto.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.placeholder.min.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.jticker.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.mobilemenu.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.isotope.min.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/jquery.hoverdir.js'></script>
    <script type='text/javascript' src='<?= base_url()?>/assets/default/js/modernizr.custom.js'></script>
    <script type="text/javascript" src="<?= base_url()?>/assets/default/js/main.js"></script>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

</head>
<body>

<div id="top-navigation">
    <div class="container">

        <!-- Navigation -->
        <ul class="nav-menu pull-left">
            <li class="active"><a href="<?= base_url("accueil")?>">Fandraisana</a></li>
            <li><a href="<?= base_url("accueil/info_utile")?>">Ilaiko</a></li>
            <li><a href="<?= base_url("accueil/archive")?>">Tahiry</a></li>
            <li><a href="<?= base_url('accueil/contact')?>">Hitafa</a></li>
        </ul>
        <ul class="social pull-right">
            <li class="glyphicon glyphicon-user"></a></li><a href="#" data-placement="bottom" data-original-title="Like us on Facebook">Se connecter</a>
        </ul>
        <ul class="social pull-right">
            <li><a href="#" data-placement="bottom" data-original-title="Like us on Facebook"></a></li><a href="#" data-placement="bottom" data-original-title="Like us on Facebook">Hiditra pikambana</a>
        </ul>
        <!-- Search Form -->
        <form name="fikarohana" method="post" action="<?= base_url('accueil/recherche_simple')?>" class="form-search pull-right">
            <input type="text" name="search" placeholder="Fikarohana ...." class="input-icon input-icon-search" />
        </form>

    </div> <!-- End Container -->
</div> <!-- End Top-Navigation -->

<div class="container">
    <header id="header" class="clearfix">

        <!-- Logo -->
        <div class="logo pull-left">
            <a href="<?= base_url("accueil")?>"><img src="<?= base_url()?>/assets/default/images/banniere-tia.jpg" alt="Tia Tanindrazana" height="80"/></a>
        </div>


        <div class="ads pull-right">
            <img src="<?php echo  base_url('assets/default/images/kolikoly-bann.jpg')?>" alt="Ads" height="80"/>
        </div>

    </header> <!-- End Header -->

    <nav id="main-navigation" class="clearfix">
        <ul>
            <?php foreach($rubriques as $rubrique):?>
                <li class="<?php echo ($rubrique->libelle == $active) ? "active" : "" ?>"><a href="<?php echo ($this->articlelibrarie->is_sarisary($rubrique->idcategorie)) ? base_url('accueil/list_sarisary/'.$rubrique->idcategorie) : base_url('accueil/detail_categorie/'.$rubrique->idcategorie)?>" ><?= $rubrique->libelle?><?php echo ($this->rubrique_model->getSousCategorieByIdMere($rubrique->idcategorie)) ? '<i class="arrow-main-nav"></i>' : ""?></a>
                    <?php if($this->rubrique_model->getSousCategorieByIdMere($rubrique->idcategorie)){
                        $souscats = $this->rubrique_model->getSousCategorieByIdMere($rubrique->idcategorie);
                        ?>
                        <ul>
                            <?php foreach ($souscats as $souscat):?>
                            <li><a href="<?php echo ($this->articlelibrarie->is_sarisary($rubrique->idcategorie)) ? base_url('accueil/list_sarisary/'.$rubrique->idcategorie) : base_url('accueil/detail_categorie/'.$souscat->idcategorie)?>"><?= $souscat->libelle?></a>
                            <?php endforeach; ?>
                        </ul>
                    <?php }?>
                </li>
            <?php endforeach;?>
        </ul>
    </nav> <!-- End Main-Navigation -->