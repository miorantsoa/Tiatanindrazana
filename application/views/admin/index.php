<div class="right_col" role="main">
    <div class="">
        <div class="row top_tiles">
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('admin/articles')?>">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-newspaper-o"></i></div>
                        <div class="count"><?= $articles?></div>
                        <h3>Articles</h3>
                        <p>Tous les articles</p>
                    </div>
                </a>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('admin/articles/'.$top_cat_id)?>">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-sort-amount-asc"></i></div>
                        <div class="count"><?= $top_cat?></div>
                        <h3><?= $top_cat_des?></h3>
                        <p>Catégorie ayant le max d'articles</p>
                    </div>
                </a>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('admin/abonnee')?>">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-gears"></i></div>
                        <div class="count"><?= $new_user?></div>
                        <h3>Utilisateur en attente</h3>
                        <p>Nombre d'utilisateurs en attente de validation</p>
                    </div>
                </a>
            </div>
            <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a href="<?= base_url('admin/utilisateur_active')?>">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-group"></i></div>
                        <div class="count"><?= $user?></div>
                        <h3>Utilisateurs actif</h3>
                        <p>Nombre d'utilisateur avec compte activé</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>