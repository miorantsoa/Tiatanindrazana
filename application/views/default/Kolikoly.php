<?php
/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 12/06/2017
 * Time: 14:43
 */
echo var_dump($Corruption);
?>
<div class="row-fluid white-bg">
    <div id="main" class="span8 blog-posts image-preloader">
        <div class="row-fluid">
            <div class="breadcrumb clearfix">
                <span class="base">Ato no misy anao</span>
                <p><a href="<?= base_url('accueil')?>">Fandraisana</a> <a>Ireo kolikoly nozaraina teto aminay</a></p>
            </div> <!-- End Breadcrumb -->
            <div class="filtre search-page">
                <form name="fikarohana" method="post" action="<?= base_url('accueil/kolikoly')?>">
                    <input type="text" name="recherche" value="" placeholder="lohateny , teny , fehezan-teny ..." class="col-md-4 col-sm-4 col-xs-12 filtre-form"/>
                    <select name="ordre" id="ordre">
                        <option value="">Sokajy</option>
                        <?php foreach ($categories as $category):?>
                            <option value="<?= $categorie->idcatcorruption?>"><?= $categorie->libelle?></option>
                        <?php endforeach;?>
                    </select>
                    <input type="submit" name="submit" value="Fantina" class="btn btn-blue pull-right" />
                </form>
            </div>
            <?php foreach ($Corruption as $article):?>
                <!-- Four -->
                <div class="post clearfix">
                    <figure>
                        <img src="<?php echo ($article->cheminmedia) ? base_url($article->cheminmedia): base_url('assets/default/images/content/300/4.jpg')?>" alt="<?= $Corruption->alt?>" />
                        <div class="cat-name">
                            <span class="base"><?=vide ?></span>
                        </div>
                    </figure>
                    <div class="content">
                        <h2><a href="<?= base_url('kolikoly/'.$article->sujet)?>" title="<?= $article->titre?>"><?= $article->titre?></a></h2>
                        <?= $article->extrait." ..."?>
                    </div>
                    <div class="meta">
                        <span class="pull-left"><?= reformat($article->datepublication)?></span>
                        <span class="pull-right"><a href="<?= base_url('kolikoly/'.$article->url_tag)?>">Hamaky ny tohiny...</a></span>
                    </div>
                </div>
            <?php endforeach;
            if(!$Corruption){?>
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
                        <li class="<?= ($page == $i) ? "active" : "" ?>"><a href="<?= base_url('accueil/recherche/cat/'.$categorie->idcategorie.'/page/'.$i.'/affiche/'.$this->articlelibrarie->getLimit($i,$per_page)).'/query/'.$query.'/date1/'.$filtre['date_1'].'/date2/'.$filtre['date_2']?>"><?= $i?></a></li>
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