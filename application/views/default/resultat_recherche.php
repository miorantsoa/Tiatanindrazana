<div class="row-fluid">
<div id="main" class="span8 blog-posts search-page image-preloader">
    <div class="row-fluid">
        <?php if(count($articles)!=0){?>
        <!-- Search Results -->
        <h2>Valin'ny fikarohana “<i><?= $recherche?></i>”</h2>
        <form name="fikarohana" method="post" action="<?= base_url('accueil/recherche_simple')?>">
            <input type="text" name="search" value="<?= $recherche?>" />
            <input type="submit" name="submit" value="Karohy" class="btn btn-blue" />
        </form>
        <p class="search-info">Valiny <?= count($articles)?> amin'ny <i><?= count($articles)?></i></p>

        <div class="sep-border margin-bottom20"></div> <!-- Separator -->

        <?php foreach ($articles as $article):?>
        <div class="post clearfix">
            <figure>
                <img src="<?php echo ($article->lien_image_une)? base_url($article->lien_image_une) : base_url('assets/default/images/content/300/1.jpg')?>" alt="Post 1" />
                <div class="cat-name">
                    <span class="base"><?= $article->libelle?></span> <!-- Category Name -->
                </div>
            </figure>
            <div class="content">
                <h2><a href="<?= base_url('accueil/detailarticle/'.$article->idarticle)?>" title="<?= $article->titre?>"><?= $article->titre?></a></h2>
                <?= substr($article->contenue,0,250)."...</p>"?>
            </div>
            <div class="meta">
                <span class="pull-left"><?= $article->datepublication?> | <a href="">15 comments</a></span>
                <span class="pull-right"><a href="<?= base_url('accueil/detailarticle/'.$article->idarticle)?>">Hamaky ny tohiny...</a></span>
            </div>
        </div>
        <?php endforeach;?>

        <nav class="nav-pagination">
            <ul>
                <?php
                $nbpage = $this->articlelibrarie->getNbPage(count($all),$nbreponse);
                for($i = 1; $i<=$nbpage;$i++){?>
                    <li class="active"><a href="<?= base_url('accueil/recherche_simple/'.$recherche.'/'.($i-1).'/'.$nbreponse.'/'.$i)?>"><?= $i?></a></li>
                <?php }?>
            </ul>
            <p>Pejy <?= $page?> amin'ny <?= $nbpage?></p>
        </nav> <!-- End Nav-Pagination -->
        <?php }
        else{?>
            <h2>Valin'ny fikarohana “<i><?= $recherche?></i>”</h2>
            <form name="fikarohana" method="post" action="<?= base_url('accueil/recherche_simple')?>">
                <input type="text" name="search" value="<?= $recherche?>" />
                <input type="submit" name="submit" value="Karohy" class="btn btn-blue" />
            </form>
            <p class="search-info">Valiny 0 amin'ny <i>0</i></p>

            <div class="sep-border margin-bottom20"></div> <!-- Separator -->

            <h4>Tsy misy valiny ny fikarohana "<span class="font-required"><?= $recherche?></span>" nataonao</h4>
            <p class="label label-important">Avereno indray ny fikarohana ka manandrama teny vaovao.</p><br><br>
            <p>You might want to consider some of our suggestions to get better results:</p>
            <ul>
                <li>Check your spelling.</li>
                <li>Try a similar keyword, for example: tablet instead of laptop.</li>
                <li>Try using more than one keyword.</li>
            </ul>
        <?php }?>
    </div> <!-- End Row-Fluid -->
</div> <!-- End Main -->