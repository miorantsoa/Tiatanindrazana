<!DOCTYPE html>
<head>
    <!-- Your Basic Site Informations -->
    <title><?= $titre?></title>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta property="og:url"           content="<?= current_url()?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="<?= $titre?>" />
    <meta property="og:description"   content="<?= (isset($article)) ? $article->extrait : "Tonga soa eto amin'ny tranon-kalan'ny Gazety Tia tanindrazana"?>" />
    <meta property="og:image"         content="<?= (isset($article)) ? base_url($article->lien_image_une) : ""?>" />
    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= base_url()?>assets/default/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/default/css/bootstrap-responsive.min.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/default/css/flexslider.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/default/css/prettyPhoto.css')?>">
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
    <link rel="apple-touch-icon" href="<?= base_url()?>/assets/default/images/logo_onglet.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url()?>/assets/default/images/logo_onglet.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url()?>/assets/default/images/logo_onglet.png">
    <link href="<?= base_url('assets/admin/css/jquery.datetimepicker.css')?>" rel="stylesheet">

    <!-- JavaScript -->
    <script type="text/javascript" src="<?= base_url('assets/default/js/jquery-1.8.3.min.js')?>"></script>
    <script src="<?= base_url('assets/admin/js/jquery.datetimepicker.full.js')?>"></script>
</head>
<body>

<div id="top-navigation">
    <div id="dialog" title="Basic dialog" style="display:none;">
        <div class="modal-header">
            <h4 class="modal-title">Fampahafantarana</h4>
        </div>
        <div class="modal-body">
            <p>Miala tsiny tompoko! Tsy manana fahafahana ny hijery an'io pekelaka io ianao. Mamorona kaonty vaovao manana fahafahana na midira amin'ny alalan'ny kaontinao.</p>
        </div>
        <div class="span12 aligncenter">
            <a href="<?= base_url('accueil/connection')?>" class="btn btn-green">Hiditra amin'ny kaonty</a> na  <a href="<?= base_url('accueil/inscription')?>" class="btn btn-blue">Hisoratra anarana</a>
        </div>
    </div>

    <div id="dialog2" title="Basic dialog" style="display:none;">
        <div class="modal-header">
            <h4 class="modal-title">Fampahafantarana</h4>
        </div>
        <div class="modal-body">
            <p><?= $this->session->flashdata('message')?></p>
        </div>
    </div>

    <div class="container">

        <!-- Navigation -->
        <ul class="nav-menu pull-left">
            <li class="active"><a href="<?= base_url("accueil")?>">Fandraisana</a></li>
            <li><a href="<?= base_url("accueil/ilaiko")?>">Ilaiko</a></li>
            <li><a href="<?= base_url("accueil/archive")?>">Tahiry</a></li>
            <li><a href="<?= base_url('accueil/contact')?>">Hitafa</a></li>
            <li><a href="<?= base_url('accueil/hamaky-gazety')?>"><i class="fa fa-newspaper-o"></i> Hamaky gazety</a></li>
        </ul>
        <ul class="nav-menu  pull-right" style="margin-left: 10px;">
            <?php if(!$this->session->userdata('user')){?>
                <li><a href="<?= base_url('accueil/inscription')?>" data-placement="bottom" data-original-title="Hiditra mpikambana"><i class="fa fa-user-plus"> </i> Hiditra mpikambana</a></li>
                <li><a href="<?= base_url('accueil/connection')?>" class="" data-placement="bottom" data-original-title="Hiditra amin'ny kaontiko"><i class="fa fa-sign-in"> </i> Hiditra </a></li>
            <?php }
            else{?>
                <li><a href="<?= base_url('accueil/monCompte')?>" class="" data-placement="bottom" data-original-title="Kaontiko"><i class="fa fa-user"> </i> Kaontiko </a></li>
                <li><a href="<?= base_url('logincontroller/deconnect')?>" class="" data-placement="bottom" data-original-title="Hivoaka ny kaontiko"><i class="fa fa-sign-in"> </i> Hivoaka </a></li>
            <?php }?>
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
        <div class="logo pull-left" style="width: 50%;text-align: left;">
            <a href="<?= base_url("accueil")?>"><img src="<?= base_url()?>/assets/default/images/banniere-tia.jpg" alt="Tia Tanindrazana" height="80"/></a>
        </div>


        <div class="ads pull-right" style="width: 50%; text-align: right;">
            <img src="<?= (isset($banniere)) ? base_url($banniere->lienimage) : ""?>" alt="<?= (isset($banniere)) ? base_url($banniere->alt) : "Bannière publicitaire"?>" height="80"/>
        </div>

    </header> <!-- End Header -->

    <nav id="main-navigation" class="clearfix">
        <ul>
            <?php foreach($rubriques as $rubrique):?>
                <li class="<?php echo ($rubrique->libelle == $active) ? "active" : "" ?>"><a href="<?php echo ($this->articlelibrarie->is_sarisary($rubrique->idcategorie)) ? base_url('accueil/sarisary/'.$rubrique->idcategorie.'-'.tag_categorie($rubrique->libelle)) : base_url('accueil/categorie/'.$rubrique->idcategorie.'-'.tag_categorie($rubrique->libelle))?>" ><?= $rubrique->libelle?><?php echo ($this->rubrique_model->getSousCategorieByIdMere($rubrique->idcategorie)) ? '<i class="arrow-main-nav"></i>' : ""?></a>
                    <?php if($this->rubrique_model->getSousCategorieByIdMere($rubrique->idcategorie)){
                        $souscats = $this->rubrique_model->getSousCategorieByIdMere($rubrique->idcategorie);
                        ?>
                        <ul>
                            <?php foreach ($souscats as $souscat):?>
                            <li><a href="<?php echo ($this->articlelibrarie->is_sarisary($rubrique->idcategorie)) ? base_url('accueil/sarisary/'.$rubrique->idcategorie.'-'.tag_categorie($rubrique->libelle)) : base_url('accueil/categorie/'.$souscat->idcategorie.'-'.tag_categorie($souscat->libelle))?>"><?= $souscat->libelle?></a>
                                <?php endforeach; ?>
                        </ul>
                    <?php }?>
                </li>
            <?php endforeach;?>
        </ul>
    </nav> <!-- End Main-Navigation -->
