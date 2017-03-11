<div id="main" class="span8 blog-posts image-preloader">

    <div class="row-fluid">

        <div class="breadcrumb clearfix">
            <span class="base">Ato no misy anao</span>
            <p><a href="<?= base_url('accueil')?>">Fandraisana</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;Sokajy: <a href="<?= base_url('accueil/detail_categorie/'.$categorie->idcategorie)?>" title="View articles in Technology"><?= $categorie->libelle?></a></p>
        </div> <!-- End Breadcrumb -->
        <?php foreach ($article_lie as $article):?>
        <!-- Four -->
        <div class="post clearfix">
            <figure>
                <img src="<?php echo ($article->lien_image_une) ? base_url($article->lien_image_une): base_url('assets/default/images/content/300/4.jpg')?>" alt="<?= $article->titre?>" />
                <div class="cat-name">
                    <span class="base"><?= $categorie->libelle?></span>
                </div>
            </figure>
            <div class="content">
                <h2><a href="<?= base_url('accueil/detailarticle/'.$article->idarticle)?>" title="<?= $article->titre?>"><?= $article->titre?></a></h2>
                <?= substr($article->contenue,0,250)." ..."?>
            </div>
            <div class="meta">
                <span class="pull-left"><?= $article->datepublication?> | <a href="single_post.html">15 comments</a></span>
                <span class="pull-right"><a href="<?= base_url('accueil/detailarticle/'.$article->idarticle)?>">Hamaky ny tohiny...</a></span>
            </div>
        </div>
        <?php endforeach;?>
        <nav class="nav-pagination">
            <ul>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">7</a></li>
                <li><a href="#">8</a></li>
                <li><a href="#">9</a></li>
                <li><a href="#">10</a></li>
                <li class="empty-space">....</li>
                <li><a href="#">17</a></li>
            </ul>
            <p>Page 1 of 17</p>
        </nav> <!-- End Nav-Pagination -->

    </div> <!-- End Row-Fluid -->
</div> <!-- End Main -->