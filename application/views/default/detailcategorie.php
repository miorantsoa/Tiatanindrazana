<div class="row-fluid white-bg">
    <div id="main" class="span8 blog-posts image-preloader">
        <div class="row-fluid">
            <div class="breadcrumb clearfix">
                <span class="base">Ato no misy anao</span>
                <p><a href="<?= base_url('accueil')?>">Fandraisana</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;Sokajy: <a href="<?= base_url('accueil/categorie/'.$categorie->idcategorie.'-'.tag_categorie($categorie->libelle))?>" title="View articles in Technology"><?= $categorie->libelle?></a></p>
            </div> <!-- End Breadcrumb -->
            <div class="filtre search-page">
                <form name="fikarohana" method="post" action="<?= base_url('accueil/categorie/'.$categorie->idcategorie.'-'.tag_categorie($categorie->libelle))?>">
                    <input type="text" name="recherche" value="" placeholder="lohateny , teny , fehezan-teny ..." class="col-md-4 col-sm-4 col-xs-12 filtre-form"/>
                    <select name="ordre" id="ordre">
                        <option value="">Fantina amin'ny daty</option>
                        <option value="DESC">Daty midina</option>
                        <option value="ASC">Daty miakatra</option>
                    </select>
                    <input type="submit" name="submit" value="Fantina" class="btn btn-blue pull-right" />
                </form>
            </div>
            <div class="filtre search-page">
                <form name="fikarohana" method="post" action="<?= base_url('accueil/categorie/'.$categorie->idcategorie.'-'.tag_categorie($categorie->libelle))?>">
                    <input type="text" name="mois" placeholder="Volana" class="col-md-2 col-sm-4 filtre-form">
                    <input type="text" name="annee" placeholder="Taona" class="col-md-2 col-sm-4 filtre-form">
                    <input type="submit" name="submit" value="Fantina" class="btn btn-blue pull-right" />
                </form>
            </div>
            <div class="filtre search-page">
                <form name="fikarohana" method="post" action="<?= base_url('accueil/categorie/'.$categorie->idcategorie.'-'.tag_categorie($categorie->libelle))?>">
                    <input type="text" name="date1" id="datetimepicker" value="" placeholder="Daty anombohana" class="col-md-4 col-sm-4 col-xs-12 filtre-form"/>
                    <input type="text" name="date2" id="datetimepicker2" value="" placeholder="Daty iafarana" class="col-md-4 col-sm-4 col-xs-12 filtre-form"/>
                    <input type="submit" name="submit" value="Fantina" class="btn btn-blue pull-right" />
                </form>
            </div>
            <?php foreach ($results as $article):?>
                <!-- Four -->
                <div class="post clearfix">
                    <figure>
                        <img src="<?php echo ($article->lien_image_une) ? base_url($article->lien_image_une): base_url('assets/default/images/content/300/4.jpg')?>" alt="<?= $article->titre?>" />
                        <div class="cat-name">
                            <span class="base"><?= $categorie->libelle?></span>
                        </div>
                    </figure>
                    <div class="content">
                        <h2><a href="<?= base_url('article/'.$article->url_tag)?>" title="<?= $article->titre?>"><?= $article->titre?></a></h2>
                        <?= $article->extrait." ..."?>
                    </div>
                    <div class="meta">
                        <span class="pull-left"><?= reformat($article->datepublication)?></span>
                        <span class="pull-right"><a href="<?= base_url('article/'.$article->url_tag)?>">Hamaky ny tohiny...</a></span>
                    </div>
                </div>
            <?php endforeach;
            if(!$results){?>
                <div class="grey">
                    <img src="<?= base_url('assets/default/images/page-vide.png')?>" alt="">
                </div>
            <?php }?>
            <nav class="nav-pagination">
                <ul>
                    <?php
                    $nbpage = $this->articlelibrarie->getNbPage(count($article_lie),$nbreponse);
                    $query = $filtre['query'];
                    if($query == null){
                        $query = "-";
                    }
                    if($nbpage >1){
                    for($i = 1; $i<=$nbpage;$i++){?>
                        <li class="<?= ($page == $i) ? "active" : "" ?>"><a href="<?= base_url('accueil/recherche/cat/'.$categorie->idcategorie.'/page/'.$i.'/affiche/'.$this->articlelibrarie->getLimit($i,$per_page)).'/query/'.$query.'/date1/'.$filtre['date_1'].'/date2/'.$filtre['date_2'].'/annee/'.$filtre['annee'].'/mois/'.$filtre['mois']?>"><?= $i?></a></li>
                    <?php }?>
                </ul>
                <p>Pejy <?= $page?> amin'ny <?= $nbpage?></p>
                <?php }?>
            </nav> <!-- End Nav-Pagination -->

        </div> <!-- End Row-Fluid -->
    </div> <!-- End Main -->
    <script>
        $(document).ready(function () {
            $('#datetimepicker').datetimepicker({
                timepicker:false,
                format:'Y-m-d',
                formatDate:'Y-m-d'
            });
            $('#datetimepicker2').datetimepicker({
                timepicker:false,
                format:'Y-m-d',
                formatDate:'Y-m-d'
            });
        })
    </script>