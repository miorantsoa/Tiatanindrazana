<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Connexion Admin</title>

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/css/bootstrap.min.css')?>">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/css/font-awesome.min.css')?>">

     <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/css/nprogress.css')?>">

    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/admin/css/custom.min.css')?>">
</head>

<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form action="<?= base_url('logincontroller/connect_admin')?>" method="post">
                    <h1>Connexion Admin </h1>
                    <?php if($this->session->flashdata('erreur')){?>
                    <div class="alert alert-danger" role="alert">
                        <?= $this->session->flashdata('erreur')['message']?>
                    </div>
                    <?php } ?>
                    <div>
                        <input type="text" name="username" class="form-control" placeholder="Nom d'utilisateur" required="" value="<?= ($this->session->flashdata('erreur')) ? $this->session->flashdata('erreur')['identifiant'] : ""?>" />
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="" />
                    </div>
                    <div>
                        <button class="btn btn-default submit" type="submit">Se connecter</button>
                    </div>

                    <div class="clearfix"></div>
                </form>
            </section>
        </div>
    </div>
</div>
</body>
</html>
