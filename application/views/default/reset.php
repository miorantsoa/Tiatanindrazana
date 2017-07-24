<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url("assets/admin/css/bootstrap.min.css")?>">
    <title>Document</title>
</head>
<body>
<div class="container">
    <div class="col-md-offset-3 col-md-6">
        <form action="<?= base_url('usercontroller/reset')?>" method="post">
            <input type="hidden" name="id" value="<?= $id?>">
            <div class="form-group">
                <input type="password" placeholder="Ampidiro ny teny miafina vaovao" id="pass1" name="motdepasse" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="password" placeholder="Avereno ampidirina ilay teny miafina vaovao" id="pass2" onchange="testmotdepass()" required class="form-control">
            </div>
            <p id="resulrcomparemdp"></p>
            <button class="btn btn-info" type="submit">Handefa</button>
        </form>
    </div>
</div>
<script>
    function testmotdepass() {
        var pass1 = document.getElementById("pass1").value;
        var pass2 = document.getElementById("pass2").value;
        var ret  = (pass1 == pass2)? "correspond":"ne correspond pas";
        document.getElementById("resulrcomparemdp").innerHTML = "le mot de passe " + ret;
    }
</script>
</body>
</html>