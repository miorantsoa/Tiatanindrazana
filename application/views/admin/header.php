<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css')?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/font-awesome.min.css')?>">
    <!-- NProgress -->
     <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/nprogress.css')?>">
    <!-- iCheck -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/skins/flat/green.css')?>">	
    <!-- bootstrap-progressbar -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap-progressbar-3.3.4.min.css')?>">
    <!-- bootstrap-daterangepicker -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/daterangepicker.css')?>">
    <!-- Custom Theme Style -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/custom.min.css')?>">
    <!--Datatables-->
     <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/dataTables.bootstrap.min.css')?>">
     <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/buttons.bootstrap.min.css')?>">
     <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/fixedHeader.bootstrap.min.css')?>">
     <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/responsive.bootstrap.min.css')?>">
     <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/scroller.bootstrap.min.css')?>">
</head>
<body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Tia Tanindrazana</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="<?=base_url('assets/img/img.jpg')?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>John Doe</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i>Accueil <span class="fa fa-chevron-down"></span></a>
                  </li>
                  <li><a><i class="fa fa-edit"></i>Journal<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    	<li><a href="<?= base_url('index.php/admin/ajoutJournal')?>">Créer un journal</a></li>
                    	<li><a href="<?= base_url('index.php/admin/journal')?>">Tous les journaux</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-newspaper-o"></i> Articles <span class="fa fa-chevron-down"></span></a>
                  	<ul class="nav child_menu">
                    	<li><a href="<?= base_url('index.php/admin/ajoutArticles')?>">Créer un article</a></li>
                    	<li><a href="<?= base_url('index.php/admin/articles')?>">Tous les articles</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i>Rubrique<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      	<li><a href="<?= base_url('index.php/admin/ajoutRubrique')?>">Créer un rubrique</a></li>
                    	   <li><a href="<?= base_url('index.php/admin/rubrique')?>">Tous les rubriques</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-rss"></i>Fil d'actualités<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="<?= base_url('index.php/admin/ajoutFilActu')?>">Ajouter</a></li>
                      <li><a href="<?= base_url('index.php/admin/filactu')?>">Lister</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i>Abonnées<span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="<?= base_url('index.php/admin/abonnee')?>">Liste des abonnées</a></li>
                        <li><a href="">Rechercher</a></li>
                      </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Publicité<span class="fa fa-chevron-down"></span></a>
                     <ul class="nav child_menu">
                        <li><a href="<?= base_url('index.php/admin/ajoutPub')?>">Ajouter</a></li>
                        <li><a href="">Lister</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-lightbulb-o"></i>Info Utile|Ilaiko <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="<?= base_url('index.php/admin/ajoutInfoUtile')?>">Ajouter</a></li>
                          <li><a href="">Lister</a></li>
                      </ul>
                  </li>
                  <li><a><i class="fa fa-cogs"></i>Configurations<span class="fa fa-chevron-down"></a></li>
                </ul>
              </div>
            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
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
                    <img src="<?=base_url('assets/img/img.jpg')?>" alt="">John Doe
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="<?=base_url('assets/img/img.jpg')?>" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?=base_url('assets/img/img.jpg')?>" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?=base_url('assets/img/img.jpg')?>" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?=base_url('assets/img/img.jpg')?>" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->