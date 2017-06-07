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
            <h1 class="titre">Hanavao tolotra</h1>
            <?php
            $data = array();
            $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
//            $lien_action  ='usercontroller/addUser/true';
            $lien_action = 'accueil/payement/true';
            echo form_open_multipart($lien_action,$attributes);
            ?>
            <form id="enews-contact-form" method="post" action="#">
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
                </fieldset>
            </form>
        </div>

	</div>
</div>
<script>
    function chooseAbonnement(mois,id){
        $('[name="tarifabonnement"]').val(mois);
        $('[name="idtarif"]').val(id);
    }

</script>
</body>
</html>