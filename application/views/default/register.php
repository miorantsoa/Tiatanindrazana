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
                        </div>
                    </div>
                    <div class="data-status"></div> <!-- data submit status -->
                </fieldset>
            </form>
        </div>

	</div>
</div>
<!--<div class="bs-callout bs-callout-warning hidden">
    <h4>Oh snap!</h4>
    <p>This form seems to be invalid :(</p>
</div>

<div class="bs-callout bs-callout-info hidden">
    <h4>Yay!</h4>
    <p>Everything seems to be ok :)</p>
</div>

<form id="demo-form" data-parsley-validate="">
    <label for="fullname">Full Name * :</label>
    <input type="text" class="form-control" name="fullname" required="">

    <label for="email">Email * :</label>
    <input type="email" class="form-control" name="email" data-parsley-trigger="change" required="">

    <label for="gender">Gender *:</label>
    <p>
        M: <input type="radio" name="gender" id="genderM" value="M" required="">
        F: <input type="radio" name="gender" id="genderF" value="F">
    </p>

    <label for="hobbies">Hobbies (Optional, but 2 minimum):</label>
    <p>
        Skiing <input type="checkbox" name="hobbies[]" id="hobby1" value="ski" data-parsley-mincheck="2"><br>
        Running <input type="checkbox" name="hobbies[]" id="hobby2" value="run"><br>
        Eating <input type="checkbox" name="hobbies[]" id="hobby3" value="eat"><br>
        Sleeping <input type="checkbox" name="hobbies[]" id="hobby4" value="sleep"><br>
        Reading <input type="checkbox" name="hobbies[]" id="hobby5" value="read"><br>
        Coding <input type="checkbox" name="hobbies[]" id="hobby6" value="code"><br>
    </p>

    <p>
        <label for="heard">Heard about us via *:</label>
        <select id="heard" required="">
            <option value="">Choose..</option>
            <option value="press">Press</option>
            <option value="net">Internet</option>
            <option value="mouth">Word of mouth</option>
            <option value="other">Other..</option>
        </select>
    </p>

    <p>
        <label for="message">Message (20 chars min, 100 max) :</label>
        <textarea id="message" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 character comment.." data-parsley-validation-threshold="10"></textarea>
    </p>

    <br>
    <input type="submit" class="btn btn-default" value="validate">

    <p><small>* Please, note that this demo form is not a perfect example of UX-awareness. The aim here is to show a quick overview of parsley-API and Parsley customizable behavior.</small></p>
</form>

<script type="text/javascript">
    $(function () {
        $('#demo-form').parsley().on('field:validated', function() {
            var ok = $('.parsley-error').length === 0;
            $('.bs-callout-info').toggleClass('hidden', !ok);
            $('.bs-callout-warning').toggleClass('hidden', ok);
        })
            .on('form:submit', function() {
                return false; // Don't submit form for this demo
            });
    });
</script>-->
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