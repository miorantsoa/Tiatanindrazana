<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Core CSS - Include with every page -->
    <link href="<?= base_url("assets/login/plugins/bootstrap/bootstrap.css")?>" rel="stylesheet" />
    <link href="<?= base_url("assets/login/font-awesome/css/font-awesome.css")?>" rel="stylesheet" />
    <link href="<?= base_url("assets/login/plugins/pace/pace-theme-big-counter.css")?>" rel="stylesheet" />
    <link href="<?= base_url("assets/login/css/style.css")?>" rel="stylesheet" />
    <link href="<?= base_url("assets/login/css/main-style.css")?>" rel="stylesheet" />

</head>

<body class="body-Login-back">

<div class="container">
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Fampahafantarana</h4>
                </div>
                <div class="modal-body">
                    <p><?=$this->session->flashdata('message')?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hivoaka</button>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
        <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
            <a href="<?= base_url("accueil")?>"><img href="<?= base_url("accueil")?>" src="<?= base_url()?>/assets/login/img/logoTT.png" alt="Tia Tanindrazana"/></a>
        </div>
        <div class="col-md-4 col-md-offset-4">
            <br>
            <?php if($this->session->flashdata('message')!=null){?>
                <div class="alert alert-warning">
                    <strong>Fampahafantarana : </strong> <?= $this->session->flashdata('message')?>
                </div>
            <?php }?>
            <div class="login-panel panel panel-default">
                <div class="panel-heading">
                    <strong class="panel-title">Hiditra / Se Connecter</strong>
                </div>
                <?php
                $data = array();

                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                $lien_action  ='logincontroller/connect';
                echo form_open_multipart($lien_action,$attributes);
                ?>
                <div class="panel-body">
                    <form role="form">
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Mailaka / E-mail" name="email" type="email" autofocus required>
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Teny miafina / mot de passe" name="password" type="password" value="" required>
                            </div>
                            <div>
                                <a href="<?= base_url("accueil/inscription")?>">Mbola tsy manana kaonty?</a>
                            </div>
                            <!-- Change this to a button or input when using this as a form -->
                            <button href="#" class="btn btn-lg btn-success btn-block">Hiditra</button>
                            <div>
                                <a href="<?= base_url("usercontroller/oublie_mot_de_passe")?>" class="pull-right">Nanadino teny miafina ve ianao?</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Core Scripts - Include with every page -->
<script src="<?= base_url("assets/login/plugins/jquery-1.10.2.js")?>"></script>
<script src="<?= base_url("assets/login/plugins/bootstrap/bootstrap.min.js")?>"</script>
<script src="<?= base_url("assets/login//plugins/metisMenu/jquery.metisMenu.js")?>"</script>
<script>
    $(document).ready(function(){
        var message = "<?=$this->session->flashdata('message')?>";
        if(message){
            $("#myModal").modal();
            console.log(message);
        }
    });
</script>
</body>

</html>
