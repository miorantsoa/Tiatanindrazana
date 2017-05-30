<!DOCTYPE html>
<html>
<head>
    <title>Fandoavam-bola</title>
    <link rel="stylesheet" href="<?= base_url("assets/admin/css/bootstrap.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("assets/default/css/bootstrap-filestyle.min.css")?>">
    <link rel="stylesheet" href="<?= base_url("assets/default/css/custom-register.css")?>">
    <link href="<?= base_url('assets/admin/css/jquery.datetimepicker.css')?>" rel="stylesheet">
    <script type="text/javascript" src="<?= base_url('assets/default/js/jquery-1.8.3.min.js')?>"></script>
</head>
<body>
<div class="container-fluid">
    <div class="col-md-offset-2 col-md-8 panel">
        <div class="panel-heading">
            <h2>Ny Kaomanandy nataonao</h2>
        </div>
        <div class="panel-body">
            <p>Tolotra Gold <?= $duree?> volana</p>
            <p>Vidin'ny Tolotra  : <?= $montant?> Ar</p>
        </div>
    </div>
    <form action="<?= base_url('usercontroller/ajout')?>" method="post">
    <div class="col-md-offset-2 col-md-8 panel">
        <div class="panel-heading">
            <h2>Safidy ny handoavam-bola</h2>
        </div>
        <div class="panel-body">
            <ul class="list-inline">
                <li><input type="checkbox" name="mobile" value="airtel">Airtel Money</li>
                <li><input type="checkbox" name="mobile" value="telma">M'Vola</li>
                <li><input type="checkbox" name="mobile" value="orang">Orange Money</li>
            </ul>
            <div class="form-group">
                <label>Nomerao mpandefa</label>
                <input type="text" name="num" placeholder="Nomereo mpandefa" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Trans id</label>
                <input type="text" name="trans_id" placeholder="Transaction id" class="form-control" required>
            </div>
        </div>
    </div>
    <div class="col-md-offset-2 col-md-8 panel">
        <div class="panel-heading">
        <h2>Fanamarihana</h2>
        </div>
        <div class="panel-body">
            <p>Rehefa voamarina fa voaloa tokoa ny vidin'ny tolotra dia hahazo mailaka ianao, hahafantaranao </p>
            <button class="btn btn-info pull-right" type="submit"><i class="glyphicon glyphicon-check"></i> Alefa</button>
        </div>
    </div>
    </form>
</div>
</body>
</html>