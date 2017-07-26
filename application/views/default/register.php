<!DOCTYPE html>
<html>
<head>
	<title>Hisoratra anarana : Tia Tanindrazana</title>
    <link href="<?= base_url('assets/admin/css/jquery.datetimepicker.css')?>" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url("assets/default/css/bootstrap-filestyle.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("assets/admin/css/bootstrap.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("assets/default/css/custom-register.css")?>">
    <script type="text/javascript" src="<?= base_url('assets/default/js/jquery-1.8.3.min.js')?>"></script>
    <script src="<?= base_url('assets/default/js/parsley.min.js')?>"></script>
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
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2', 'data-parsley-validate'=>'');
                    $lien_action = 'accueil/payement';
                    echo form_open_multipart($lien_action,$attributes);
                    ?>
            <form>
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
                        <input type="text" data-parsley-length="[4,80]" name="nomutilisateur" required class="form-control" placeholder="Anarana"/>
                    </div>
                    <div class="form-group">
                        <label>Fanampiny :</label>
                        <input type="text" name="prenomutilisateur" maxlength="80" required class="form-control" placeholder="Fanampin'anarana"/>
                    </div>
                    <div class="form-group">
                        <label>Daty nahaterahana :</label>
                        <div class="input-group">
                            <input type="text" id="datetnaissance" name="naissanceutilisateur" maxlength="80" required class="form-control" placeholder="Daty nahaterahana" data-parsley-trigger="change" max="<?= date('Y-m-d',mktime(0, 0, 0, date("m"),   date("d"),   date("Y")-18))?>"/>
                            <div class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Mailaka :<span class="font-required">*</span></label>
                        <input  name="emailutilisateur" required="" class="form-control" placeholder="Mailaka" type="email" data-parsley-trigger="change" data-parsley-length="[10,150]" data-parsley-mail=""/>
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
                        <?php foreach ($typeabonnement as $abonnement):?>
                        <div class="row pricing">
                            <?php
                    for($i = 1; $i<count($tarifabonnement);$i++){?>
                            <div class="col-md-4">
                                <div class="well">
                                    <h3><b>Tolotra <?=$abonnement->libelle?> <?= $tarifabonnement[$i]->durreeabonnement?> Volana </b></h3>
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
                        </div>
                        <?php endforeach;?>
                    </div>
                    <div class="data-status"></div> <!-- data submit status -->
                </fieldset>
            </form>
        </div>

	</div>
</div>
<script>
    Parsley.addValidator('mail', {
        validateString: function(value) {
            // Zippopotam.us returns a status 404 for incorrect zip codes,
            // so we simply return the ajax request:
            return $.ajax('<?= base_url("usercontroller/verifierMail?email=")?>'+ value)
        },
        messages: {fr: 'Efa misy mampiasa io mailaka io!'}
    });
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
<script src="<?= base_url('assets/default/js/i18n/fr.js')?>"></script>
<script src="<?= base_url("assets/default/js/bootstrap-filestyle.min.js")?>" type="text/javascript"></script>
<script src="<?= base_url('assets/admin/js/jquery.datetimepicker.full.js')?>"></script>
</body>
</html>