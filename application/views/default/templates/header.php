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
    <link rel="stylesheet" href="<?= base_url()?>assets/default/css/jquery.modal.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/css/font-awesome.min.css')?>">
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
    <link href="<?= base_url('assets/admin/css/jquery.datetimepicker.css')?>" rel="stylesheet">

    <!-- JavaScript -->
    <script type="text/javascript" src="<?= base_url('assets/default/js/jquery-1.8.3.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/jquery.datetimepicker.full.js')?>"></script>

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
            <li><a href="<?= base_url('accueil/feuilleter_journal')?>"><i class="fa fa-newspaper-o"></i> Hamaky gazety</a></li>
        </ul>
        <ul class="nav-menu  pull-right" style="margin-left: 10px;">
            <li><a href="<?= base_url('accueil/inscription')?>" data-placement="bottom" data-original-title="Hiditra mpikambana"><i class="fa fa-user-plus"> </i> Hiditra mpikambana</a></li>
            <li><a href="" class="" data-placement="bottom" data-original-title="Hiditra amin'ny kaontiko"><i class="fa fa-sign-in"> </i> Hiditra </a></li>
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
