<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<!--<link rel="stylesheet" type="text/css" href="<?/*= base_url('assets/admin/css/bootstrap.min.css')*/?>">

    <link rel="stylesheet" type="text/css" href="<?/*= base_url('assets/admin/css/font-awesome.min.css')*/?>">

     <link rel="stylesheet" type="text/css" href="<?/*= base_url('assets/admin/css/nprogress.css')*/?>">-->
    <!-- iCheck -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/css/admin.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/css/skins/flat/green.css')?>">
    <!-- bootstrap-progressbar -->
    <!--<link rel="stylesheet" type="text/css" href="<?/*= base_url('assets/admin/css/bootstrap-progressbar-3.3.4.min.css')*/?>">

    <link rel="stylesheet" type="text/css" href="<?/*= base_url('assets/admin/css/custom.min.css')*/?>">
    <link rel="stylesheet" type="text/css" href="<?/*= base_url('assets/admin/css/dataTables.bootstrap.min.css')*/?>">
     <link rel="stylesheet" type="text/css" href="<?/*= base_url('assets/admin/css/dataTables.bootstrap.min.css')*/?>">
     <link rel="stylesheet" type="text/css" href="<?/*= base_url('assets/admin/css/buttons.bootstrap.min.css')*/?>">
     <link rel="stylesheet" type="text/css" href="<?/*= base_url('assets/admin/css/fixedHeader.bootstrap.min.css')*/?>">
     <link rel="stylesheet" type="text/css" href="<?/*= base_url('assets/admin/css/responsive.bootstrap.min.css')*/?>">
     <link rel="stylesheet" type="text/css" href="<?/*= base_url('assets/admin/css/scroller.bootstrap.min.css')*/?>">
    <link href="<?/*= base_url('assets/admin/css/fileinput.min.css')*/?>" media="all" rel="stylesheet" type="text/css" /-->
    <link rel="stylesheet" href="<?= base_url('assets/admin/css/app.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/themes/explorer/theme.css')?>">
    <link href="<?= base_url('assets/admin/css/fileinput.min.css')?>" media="all" rel="stylesheet" type="text/css" >
    <link href="<?= base_url('assets/admin/css/jquery.datetimepicker.css')?>" rel="stylesheet">
    <!-- jQuery -->
    <script src="<?= base_url('assets/admin/js/jquery.min.js')?>"></script>
</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="<?= base_url('page/administration')?>" class="site_title"><i class="fa fa-paw"></i> <span>Tia Tanindrazana</span></a>
            </div>

            <div class="clearfix"></div>
            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-edit"></i>Journal<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    	<li><a href="<?= base_url('index.php/page/administration/journal')?>">Tous les journaux</a></li>
                        <li><a href="<?= base_url('page/administration/feuillejournal')?>"><i class="fa fa-sheet"></i>Feuilles journal</a></li>
                        <li><a href="<?= base_url('index.php/page/administration/ajoutFeuilleJournal')?>">Ajout feuilleter journal</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-newspaper-o"></i> Articles <span class="fa fa-chevron-down"></span></a>
                  	<ul class="nav child_menu">
                        <li><a href="<?= base_url('index.php/page/administration/articles')?>">Tous les articles</a></li>
                    	<li><a href="<?= base_url('index.php/page/administration/ajoutArticles')?>">Créer un article</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i>Rubrique<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?= base_url('index.php/page/administration/rubrique')?>">Tous les rubriques</a></li>
                      	<li><a href="<?= base_url('index.php/page/administration/ajoutRubrique')?>">Créer un rubrique</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-rss"></i>Fil d'actualités<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?= base_url('index.php/page/administration/filactu')?>">Lister Fil d'actualités</a></li>
                      <li><a href="<?= base_url('index.php/page/administration/ajoutFilActu')?>">Ajouter Fil d'actualité</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i>Abonnées<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?= base_url('index.php/page/administration/abonnee')?>">Abonnée en attente</a></li>
                        <li><a href="<?= base_url('index.php/page/administration/utilisateur_active')?>">Abonnée activé</a></li>
                        <li><a href="<?= base_url('index.php/page/administration/utilisateur_expire')?>">Abonnement expiré</a></li>
                        <li><a href="<?= base_url('index.php/page/administration/ajouterabonnee')?>">Ajouter nouvelle abonnee</a></li>

                      </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Publicité<span class="fa fa-chevron-down"></span></a>
                     <ul class="nav child_menu">
                         <li><a href="<?= base_url('index.php/page/administration/publicite')?>">Lister publicité</a></li>
                        <li><a href="<?= base_url('index.php/page/administration/ajoutPub')?>">Ajouter publicité</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-lightbulb-o"></i>Info Utile / Ilaiko <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="<?= base_url('index.php/page/administration/infoutile')?>">Lister info Utile / Ilaiko</a></li>
                          <li><a href="<?= base_url('index.php/page/administration/ajoutInfoUtile')?>">Ajouter info Utile / Ilaiko</a></li>
                          <li><a href="<?= base_url('index.php/page/administration/listecategorieutil')?>">Lister categorie</a></li>
                          <li><a href="<?= base_url('index.php/page/administration/addcategorieilaiko')?>">Ajouter categorie</a></li>

                      </ul>
                  </li>
                    <li><a><i class="fa fa-newspaper-o"></i> Sondage <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="<?= base_url('index.php/page/administration/listesondage')?>">Tous les sondages</a></li>
                            <li><a href="<?= base_url('index.php/page/administration/resultatsondage')?>">Resultats sondage</a></li>
                            <li><a href="<?= base_url('index.php/page/administration/addsondage')?>">Ajouter sondage</a></li>
                        </ul>
                    </li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Deconnexion" href="<?= base_url('logincontroller/deconnect_admin')?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="<?=base_url('assets/admin/img/img.jpg')?>" alt=""><?= $this->session->userdata('admin')['username']?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="<?= base_url('logincontroller/deconnect_admin')?>"><i class="fa fa-sign-out pull-right"></i>Deconnexion</a></li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->