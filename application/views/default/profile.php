<!DOCTYPE html>
<head>
    <title><?= $titre?></title>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta property="og:url"           content="<?= base_url('accueil')?>" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="Tia Tanindrazana" />
    <meta property="og:description"   content="Your description" />
    <meta property="og:image"         content="http://www.your-domain.com/path/image.jpg" />

    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?= base_url()?>assets/default/css/style.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/default/css/color.css">
    <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?= base_url()?>/assets/default/images/favicon.ico">
    <link rel="apple-touch-icon" href="<?= base_url()?>/assets/default/images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url()?>/assets/default/images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url()?>/assets/default/images/apple-touch-icon-114x114.png">
    <link rel="stylesheet" href="<?= base_url()?>assets/admin/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url()?>assets/default/css/custom-register.css">
    <link rel="stylesheet" href="<?= base_url("assets/default/css/bootstrap-filestyle.min.css")?>">
    <link href="<?= base_url('assets/admin/css/jquery.datetimepicker.css')?>" rel="stylesheet">

    <!-- JavaScript -->
    <script type="text/javascript" src="<?= base_url('assets/admin/js/jquery.min.js')?>"></script>
</head>
<body>

<div id="top-navigation">
    <div id="dialog" title="Basic dialog" style="display:none;">
        <div class="modal-header">
            <h4 class="modal-title">Fampahafantarana</h4>
        </div>
        <div class="modal-body">
            <p>Tsy manana fahafahana ny mijery an'io pejy io ianao. Mamorona kaonty vaovao manana fahafahana ambonimbony na midira amin'ny alalan'ny kaontinao.</p>
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
            <li><a href="<?= base_url("accueil")?>">Fandraisana</a></li>
            <li><a href="<?= base_url("accueil/info_utile")?>">Ilaiko</a></li>
            <li><a href="<?= base_url("accueil/archive")?>">Tahiry</a></li>
            <li><a href="<?= base_url('accueil/contact')?>">Hitafa</a></li>
            <li><a href="<?= base_url('accueil/feuilleter_journal')?>"><i class="fa fa-newspaper-o"></i> Hamaky gazety</a></li>
        </ul>
        <ul class="nav-menu  pull-right" style="margin-left: 10px;">
            <?php if(!$this->session->userdata('user')){?>
                <li><a href="<?= base_url('accueil/inscription')?>" data-placement="bottom" data-original-title="Hiditra mpikambana"><i class="fa fa-user-plus"> </i> Hiditra mpikambana</a></li>
                <li><a href="<?= base_url('accueil/connection')?>" class="" data-placement="bottom" data-original-title="Hiditra amin'ny kaontiko"><i class="fa fa-sign-in"> </i> Hiditra </a></li>
            <?php }
            else{?>
                <li class="active"><a href="<?= base_url('accueil/monCompte')?>" class="" data-placement="bottom" data-original-title="Kaontiko"><i class="fa fa-user"> </i> Kaontiko </a></li>
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
    <div class="">
        <div class="col-md-offset-1 col-md-10">
            <div class="col-md-12 header-profile">
                <div class="col-md-6">
                    <figure class="img img-thumbnail img-profile">
                        <img src="<?= base_url( $this->session->userdata('user')[0]->imageprofile)?>">
                    </figure>
                </div>
                <div class="col-md-6">
                    <h1 class="nom-profile"><?= $this->session->userdata('user')[0]->nomutilisateur ." ".$this->session->userdata('user')[0]->prenomutilisateur?></h1>
                    <p>Tolotra : <?= $this->session->userdata('user')[0]->nom_abonnement?></p>
                    <p>Daty iafaran'ny tolotra : <?= $this->session->userdata('user')[0]->datefinabonnement?></p>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modaledition"><i class="fa fa-edit"></i> Hanova kaonty</button>
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modaleditpass"><i class="fa fa-lock"></i> Hanova teny miafina</button>
                </div>
            </div>
            <div class="col-md-12">
                <div class="panel-title"><h3>Mes Favoris (<?= count($favoris)?>)</h3></div>
                <div class="col-md-12">
                    <?php foreach ($favoris as $favori):?>
                    <div class="well block-fav">
                        <div class="image">
                            <img src="<?= (isset($favori->lien_image_une)) ? base_url($favori->lien_image_une) : base_url('assets/default/images/content/300/4.jpg')?>" alt="">
                        </div>
                        <div class="article">
                            <h2><?= $favori->titre?></h2>
                            <div class="fb-share-button" data-href="<?= base_url($favori->url_tag)?>" data-layout="button" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url($favori->url_tag)?>&amp;src=sdkpreparse" >Partager</a></div>
                            <p><?= substr(strip_tags($favori->contenue),0,250)." ..."?></p>
                            <a href="<?= base_url('accueil/detailarticle/'.$favori->idarticle)?>" class="btn btn-info"><i class="fa fa-eye"></i> Hamaky</a>
                            <a href="<?= base_url('accueil/supprimerFavs/'.$favori->idarticle)?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hamafa</a>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="modaledition" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <?php $user = $this->session->userdata('user')[0]?>
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hanova ny mombamomba ny kaonty</h4>
            </div>
            <?php
            $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
            $lien_action  ='usercontroller/updateInfoUser';
            echo form_open_multipart($lien_action,$attributes);
            ?>
            <form id="enews-contact-form" method="post" action="#">
            <div class="modal-body">
                    <fieldset>
                        <legend>Ny momba anao / à propos de vous:</legend>
                        <div class="form-group">
                            <label>Fahalalam-pomba / Civilité:</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-label" type="radio" name="civilite" id="exampleRadios1" value="Andriamatoa"  <?= ($user->civilite == "Andriamatoa" || $user->civilite == "Mr.") ? "checked" : ""?>>
                                    Andriamatoa
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="radio" name="civilite" id="exampleRadios2" value="Ramatoa" <?= ($user->civilite == "Ramatoa") ? "checked" : ""?>>
                                    Ramatoa
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="nomutilisateur" maxlength="80" required class="form-control" placeholder="Anarana" value="<?= $user->nomutilisateur?>"/>
                        </div>
                        <div class="form-group">
                            <input type="text" name="prenomutilisateur" maxlength="80" required class="form-control" placeholder="Fanampin'anarana" value="<?= $user->prenomutilisateur?>"/>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="datetnaissance" name="naissanceutilisateur" maxlength="80" required class="form-control" placeholder="Daty nahaterahana" value="<?= $user->naissanceutilisateur?>"/>
                                <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="cin" minlength="12" maxlength="12" required class="form-control" placeholder="Laharana karapanondro" value="<?= $user->cin?>"/>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input type="text" id="datelivraison" name="datedelivrancecin" required class="form-control" placeholder="Daty nahazahoana karapanondro" value="<?= $user->datedelivrancecin?>"/>
                                <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" name="lieudelivrancecin" maxlength="100" class="form-control" placeholder="Toerana nahazahoana karapanondro" value="<?= $user->lieudelivrancecin?>">
                        </div>
                        <div class="form-group">
                            <label>Sary recto karapanondro / Image recto CIN:</label>
                            <input id="lienimagerectocin" name="lienimagerectocin" type="file" class="filestyle" data-buttonText="Hisafidy sary" value="<?= $user->liencin_recto?>">
                        </div>
                        <div class="form-group">
                            <label>Sary verso karapanondro / Image verso CIN:</label>
                            <input id="lienimageversocin" name="lienimageversocin" type="file"  class="filestyle" data-buttonText="Hisafidy sary" value="<?= $user->liencin_verso?>">
                        </div>
                        <div class="form-group">
                            <input type="email" name="emailutilisateur" maxlength="225" required class="form-control" placeholder="Mailaka" value="<?= $user->emailutilisateur?>"/>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>Ny momba ny kaonty / à propos de votre compte:</legend>
                        <div class="form-group">
                            <input type="text" name="identifiant" required class="form-control" placeholder="Solon'anarana" value="<?= $user->identifiant?>"/>
                        </div>
                        <div class="form-group">
                            <label>Sary / Photo de profil:</label>
                            <input id="lienimagepdp" name="lienimagepdp" type="file" class="filestyle" data-buttonText="Hisafidy sary" value="<?= $user->imageprofile?>">
                        </div>
                    </fieldset>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Hivoaka</button>
                <button type="submit" name="submit" class="btn btn-info"><i class="fa fa-check"></i> Handefa</button>
            </div>
            </form>
        </div>

    </div>
</div>
<div id="modaleditpass" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="<?= base_url('usercontroller/modifiermotdepasse') ?>" method="post">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Hanova teny miafina</h4>
            </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="password" name="ancienmdp" id="ancienmdp" onchange="testancienmotdepass()" required class="form-control" placeholder="Teny miafina taloha"/>
                        <p id="testancienmdp"></p>
                    </div>
                    <div class="form-group">
                        <input type="password" name="motdepasse" id="pass1" required class="form-control" placeholder="Teny miafina vaovao">
                    </div>
                    <div class="form-group">
                        <input type="password" name="motdepasseverif" id="pass2" onchange="testmotdepass()" required class="form-control" placeholder="Fanamarina teny miafina">
                        <p id="resulrcomparemdp"></p>
                    </div>
                    <script>
                        function testancienmotdepass() {
                            var pass1 = document.getElementById("ancienmdp").value;
                            var pass2 = '<?php echo($this->session->userdata('user')[0]->motdepasse)?>';
                            var ret  = (pass1 == pass2)? "correspond avec le votre":"ne correspond pas avec le votre";
                            document.getElementById("testancienmdp").innerHTML = "le mot de passe " + ret;
                        }
                    </script>

                    <script>
                        function testmotdepass() {
                            var pass1 = document.getElementById("pass1").value;
                            var pass2 = document.getElementById("pass2").value;
                            var ret  = (pass1 == pass2)? "correspond":"ne correspond pas";
                            document.getElementById("resulrcomparemdp").innerHTML = "le mot de passe " + ret;
                        }
                    </script>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i>Hivoaka</button>
                <button class="btn info"><i class="fa fa-check"></i>Handefa</button>
            </div>
            </form>
        </div>

    </div>
</div>
<div id="footer">
    <div class="container">
        <p class="pull-left">Copyright 2010 - <?= date('Y')?> Tia Tanindrazana</p
    </div> <!-- End Container -->
</div> <!-- End Footer -->
<div id="fb-root"></div>
<script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    function changeFBMeta(title,url,description,img){
        $("meta[property='og\\:title']").attr("content", title);
        $("meta[property='og\\:url']").attr("content", url);
        $("meta[property='og\\:description']").attr("content", description);
        $("meta[property='og\\:image']").attr("content", img);
    }
    $(document).ready(function () {
        $('#datetnaissance').datetimepicker({
            timepicker:false,
            format:'Y-m-d',
            formatDate:'Y-m-d'
        });
        $('#datelivraison').datetimepicker({
            timepicker:false,
            format:'Y-m-d',
            formatDate:'Y-m-d'
        });
    })
</script>
<script type='text/javascript' src='<?= base_url('assets/admin/js/bootstrap.min.js')?>'></script>
<script src="<?= base_url("assets/default/js/bootstrap-filestyle.min.js")?>" type="text/javascript"></script>
<script src="<?= base_url('assets/admin/js/jquery.datetimepicker.full.js')?>"></script>
</body>
</html>