<div class="row-fluid white-bg">
<div id="main" class="span8 blog-posts search-page image-preloader">
    <div class="row-fluid">
        <?php if(count($articles)!=0){?>
        <!-- Search Results -->
        <h2>Valin'ny fikarohana “<i><?= $recherche?></i>”</h2>
        <form name="fikarohana" method="post" action="<?= base_url('accueil/recherche_simple')?>">
            <input type="text" name="search" value="<?= $recherche?>" />
            <input type="submit" name="submit" value="Karohy" class="btn btn-blue" />
        </form>
        <p class="search-info">Valiny <?= count($results)?> amin'ny <i><?= count($articles)?></i></p>

        <div class="sep-border margin-bottom20"></div> <!-- Separator -->

        <?php foreach ($results as $article):?>
        <div class="post clearfix">
            <figure>
                <img src="<?php echo ($article->lien_image_une)? base_url($article->lien_image_une) : base_url('assets/default/images/content/300/1.jpg')?>" alt="Post 1" />
                <div class="cat-name">
                    <span class="base"><?= $article->libelle?></span> <!-- Category Name -->
                </div>
            </figure>
            <div class="content">
                <h2><a href="<?= base_url('article/'.$article->url_tag)?>" title="<?= $article->titre?>"><?= $article->titre?></a></h2>
                <?= ($article->extrait)."...</p>"?>
            </div>
            <div class="meta">
                <span class="pull-left"><?= $article->datepublication?> | <a href="">15 comments</a></span>
                <span class="pull-right"><a href="<?= base_url('article/'.$article->url_tag)?>">Hamaky ny tohiny...</a></span>
            </div>
        </div>
        <?php endforeach;?>

        <nav class="nav-pagination">
            <ul>
                <?php
                $nbpage = $this->articlelibrarie->getNbPage(count($all),$nbreponse);
                for($i = 1; $i<=$nbpage;$i++){?>
                    <li class="<?= ($page == $nbpage[$i]) ?"active" : "" ?>"><a href="<?= base_url('accueil/recherche_simple/'.$recherche.'/'.$i.'/'.$this->articlelibrarie->getLimit($i,$nbreponse))?>"><?= $i?></a></li>
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
            <div class="grey">
                <img src="<?= base_url('assets/default/images/page-vide.png')?>" alt="">
            </div>
        <?php }?>
    </div> <!-- End Row-Fluid -->
</div> <!-- End Main -->