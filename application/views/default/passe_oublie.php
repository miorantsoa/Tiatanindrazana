<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url("assets/admin/css/bootstrap.min.css")?>">
    <script src="<?= base_url("assets/login/plugins/jquery-1.10.2.js")?>"></script>
    <script src="<?= base_url("assets/login/plugins/bootstrap/bootstrap.min.js")?>"></script>
    <title>Hanova teny miafina</title>
</head>
<body>
    <div class="container">

        <div class="col-md-offset-3 col-md-6">
            <br>
            <?php
            if($this->session->flashdata('message')!=null){?>
                <div class="alert alert-warning">
                    <strong>Fampahafantarana : </strong> <?= $this->session->flashdata('message')?>
                </div>
            <?php }?>
            <form action="<?= base_url('usercontroller/send_reset_mail')?>" method="post">
                <div class="form-group">
                    <input type="email" placeholder="Ampidiro ny mailaka" name="email" class="form-control" required>
                </div>
                <button class="btn btn-info" type="submit">Handefa</button>
            </form>
        </div>
    </div>

</body>
</html>