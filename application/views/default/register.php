<!DOCTYPE html>
<html>
<head>
	<title>Hisoratra anarana : Tia Tanindrazana</title>
    <link rel="stylesheet" href="<?= base_url("assets/admin/css/bootstrap.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("assets/default/css/bootstrap-filestyle.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("assets/default/css/custom-register.css")?>">
    <link href="<?= base_url('assets/admin/css/jquery.datetimepicker.css')?>" rel="stylesheet">
    <script type="text/javascript" src="<?= base_url('assets/default/js/jquery-1.8.3.min.js')?>"></script>
</head>
<body>
<div class="container-fluid">
	<div class="col-md-offset-2 col-md-8 panel panel-blue">
        <div class="col-md-12 ">
            <figure class="logo col-md-12">
                <a href="<?= base_url()?>"><img src="<?= base_url("assets/default/images/logoTT.png")?>" alt=""></a>
            </figure>
            <h1 class="titre">Fisoratana anarana </h1>
            <?php
            $data = array();
            $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
//            $lien_action  ='usercontroller/addUser';
            $lien_action = 'accueil/payement';
            echo form_open_multipart($lien_action,$attributes);
            ?>
            <form id="enews-contact-form" method="post" action="#">
                <fieldset>
                    <legend>Ny momba anao :</legend>
                    <div class="form-group">
                        <label>Fahalalam-pomba / Civilité:</label>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-label" type="radio" name="civilite" id="exampleRadios1" value="Andriamatoa" checked>
                                Andriamatoa
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="radio" name="civilite" id="exampleRadios2" value="Ramatoa">
                                Ramatoa
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Anarana :</label>
                        <input type="text" name="nomutilisateur" maxlength="80" required class="form-control" placeholder="Anarana"/>
                    </div>
                    <div class="form-group">
                        <label>Fananpiny :</label>
                        <input type="text" name="prenomutilisateur" maxlength="80" required class="form-control" placeholder="Fanampin'anarana"/>
                    </div>
                    <div class="form-group">
                        <label>Daty nahaterahana :</label>
                        <div class="input-group">
                            <input type="text" id="datetnaissance" name="naissanceutilisateur" maxlength="80" required class="form-control" placeholder="Daty nahaterahana" max="<?= date('Y-m-d',mktime(0, 0, 0, date("m"),   date("d"),   date("Y")-18))?>"/>
                            <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                        </div>
                    </div>
                    <!--
                    <div class="form-group">
                        <label>Laharana karapanondro :</label>
                        <input type="text" name="cin" minlength="12" maxlength="12" required class="form-control" placeholder="Laharana karapanondro"/>
                    </div>
                    <div class="form-group">
                        <label>Daty nazahona karapanondro :</label>
                        <div class="input-group">
                            <input type="text" id="datelivraison" name="datedelivrancecin" required class="form-control" placeholder="Daty nahazahoana karapanondro"/>
                            <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Toerana nazahona karapanondro :</label>
                        <input type="text" name="lieudelivrancecin" maxlength="100" class="form-control" placeholder="Toerana nahazahoana karapanondro">
                    </div>
                    <div class="form-group">
                        <label>Sary recto karapanondro :</label>
                        <input id="lienimagerectocin" name="lienimagerectocin" type="file" class="filestyle" data-buttonText="Hisafidy sary">
                    </div>
                    <div class="form-group">
                        <label>Sary verso karapanondro :</label>
                        <input id="lienimageversocin" name="lienimageversocin" type="file"  class="filestyle" data-buttonText="Hisafidy sary">
                    </div>
                    -->
                    <div class="form-group">
                        <label>Mailaka :<span class="font-required">*</span></label>
                        <input type="email" name="emailutilisateur" maxlength="225" required class="form-control" placeholder="Mailaka"/>
                    </div>
                </fieldset>
                <fieldset>
                    <legend>Ny momba ny kaonty :</legend>
                    <div class="form-group">
                        <label>Anarana fahafantarana :</label>
                        <input type="text" name="identifiant" required class="form-control" placeholder="Solon'anarana"/>
                    </div>
                    <div class="form-group">
                        <label>Tenimiafina :</label>
                        <input type="password" name="motdepasse" id="pass1" required class="form-control" placeholder="Teny miafina">
                    </div>
                    <div class="form-group">
                        <label>Fanamarinana tenimiafina :</label>
                        <input type="password" name="motdepasseverif" id="pass2" onchange="testmotdepass()" required class="form-control" placeholder="Fanamarinana teny miafina">
                        <p id="resulrcomparemdp"></p>
                    </div>

                    <script>
                        function testmotdepass() {
                            var pass1 = document.getElementById("pass1").value;
                            var pass2 = document.getElementById("pass2").value;
                            var ret  = (pass1 == pass2)? "correspond":"ne correspond pas";
                            document.getElementById("resulrcomparemdp").innerHTML = "le mot de passe " + ret;
                        }
                    </script>
                    <div class="form-group">
                        <label>Sary / Photo de profil:</label>
                        <input id="lienimagepdp" name="lienimagepdp" type="file" class="filestyle" data-buttonText="Hisafidy sary">
                    </div>
                </fieldset>

                <fieldset>
                    <legend>Safidy ny tolotra / Choix de l'offre:</legend>
                    <div class="">
                        <div class="row pricing">
                            <?php
                            for($i = 1; $i<count($tarifabonnement);$i++){?>
                            <div class="col-md-4">
                                <div class="well">
                                    <h3><b>Tolotra Gold <?= $tarifabonnement[$i]->durreeabonnement?> Volana </b></h3>
                                    <input type="hidden" name="tarifabonnement">
                                    <input type="hidden" name="idtarif">
                                    <hr>
                                    <p>Afaka mamaky ny lahatsoratra rehetra</p>
                                    <hr>
                                    <p>Fahafahana mijery Ilaiko</p>
                                    <hr>
                                    <p>Afaka mamaky mijery lahatsoratra @n'ny gazety an-tsary</p>
                                    <hr>
                                    <p><b><?= $tarifabonnement[$i]->prixabonnement?> Ar</b>
                                    <hr>
                                    <input type="hidden" name="typeabonnement" value="<?= $typeabonnement[0]->idtypeabon?>">
                                    <input type="hidden">
                                    <button type="submit" onclick="chooseAbonnement(<?= $tarifabonnement[$i]->durreeabonnement?>,<?= $tarifabonnement[$i]->idtarif?>)" class="btn btn-info btn-block">Hiditra</button>
                                </div>
                            </div>
                            <?php }?>
                            <!--<div class="col-md-4">
                                <div class="well">
                                    <h3><b>Tolotra Gold 6 Volana </b></h3>
                                    <input type="hidden" name="tarifabonnement">
                                    <hr>
                                    <p>Afaka mamaky ny lahatsoratra rehetra</p>
                                    <hr>
                                    <p>Fahafahana mijery Ilaiko</p>
                                    <hr>
                                    <p>Afaka mamaky mijery lahatsoratra @n'ny gazety an-tsary</p>
                                    <hr>
                                    <p><b>38 000 Ar</b></p>
                                    <input type="hidden" name="typeabonnement" value="<?/*= $typeabonnement[0]->idtypeabon*/?>">
                                    <hr>
                                    <button type="submit" onclick="chooseAbonnement(6)" class="btn btn-info btn-block">Hiditra</button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="well">
                                    <h3><b>Tolotra Gold 12 Volana </b></h3>
                                    <input type="hidden" name="tarifabonnement">
                                    <hr>
                                    <p>Afaka mamaky ny lahatsoratra rehetra</p>
                                    <hr>
                                    <p>Fahafahana mijery Ilaiko</p>
                                    <hr>
                                    <p>Afaka mijery lahatsoratra @n'ny gazety an-tsary</p>
                                    <hr>
                                    <p><b>75 000 Ar</b></p>
                                    <hr>
                                    <input type="hidden" name="typeabonnement" value="<?/*= $typeabonnement[0]->idtypeabon*/?>">
                                    <button type="submit" onclick="chooseAbonnement(12)" class="btn btn-info btn-block">Hiditra</button>
                                </div>
                            </div>-->
                        </div>
                    </div>
                    <!--<div class="form-group">
                        <label>Karazany / Type Abonnement:</label>
                        <select name="typeabonnement" id="typeabonnement" class="form-control" >
                            <?php /*foreach ($typeabonnement as $typeabonnement):*/?>
                                <option value="<?/*=$typeabonnement->idtypeabon*/?>"><?/*=$typeabonnement->libelle*/?></option>
                            <?php /*endforeach;*/?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>durée abonnement:</label>
                        <select name="tarifabonnement" id="tarifabonnement" onchange="montantabonnement()" class="form-control">
                            <option value="3">3 mois</option>
                            <option value="6">6 mois</option>
                            <option value="12">12 mois</option>
                        </select>
                        <p id="prix"></p>
                        <input type="hidden" value="" >
                    </div>
                    <script>
                        function montantabonnement() {
                            var x = document.getElementById("tarifabonnement").value;
                            var y = document.getElementById("typeabonnement").value;
                            document.getElementById("prix").innerHTML = "Ny sarany io tolotra dia : Ar " + x*y*200*30;
                        }
                    </script>
                    <button type="submit" name="submit" class="btn btn-info">Hiditra</button>-->
                    <div class="data-status"></div> <!-- data submit status -->
                </fieldset>
            </form>
        </div>

	</div>
</div>
<script>
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
    });
    function chooseAbonnement(mois,id){
        $('[name="tarifabonnement"]').val(mois);
        $('[name="idtarif"]').val(id);
    }

</script>
<script src="<?= base_url("assets/default/js/bootstrap-filestyle.min.js")?>" type="text/javascript"></script>
<script src="<?= base_url('assets/admin/js/jquery.datetimepicker.full.js')?>"></script>
</body>
</html>