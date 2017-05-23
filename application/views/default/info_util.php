<div id="main" class="portofolio blog-posts image-preloader"">
    <div class="breadcrumb clearfix">
        <span class="base">Ato no misy anao</span>
        <p><a href="<?= base_url('accueil/ilaiko')?>">Ilaiko</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;Sokajy:  <?= (count($info_util)!=0) ? $info_util[0]->libelle : "" ?></p>
    </div> <!-- End Breadcrumb -->

    <div class="margin-top40">
        <?php if(count($info_util)){?>
        <div class="filtre search-page">
            <form name="fikarohana" method="post" action="<?= base_url('accueil/filtre_info_utile')?>">
                <input type="text" name="recherche" value="" placeholder="lohateny , teny , fehezan-teny ..." class="col-md-4 col-sm-4 col-xs-12 filtre-form"/>
                <select name="categorie" id="categorie">
                    <option value="">Fantina ara-tsokajy</option>
                    <?php foreach ($categories as $category):?>
                        <option value="<?= $category->idcatbeinfo?>"><?= $category->libelle?></option>
                    <?php endforeach;?>
                </select>
                <select name="ordre" id="ordre">
                    <option value="">Fantina amin'ny daty</option>
                    <option value="DESC">Daty midina</option>
                    <option value="ASC">Daty miakatra</option>
                </select>
                <input type="submit" name="submit" value="Fantina" class="btn btn-blue pull-right" />
            </form>
        </div>
            <div class="filtre search-page">
                <form name="fikarohana" method="post" action="<?= base_url('accueil/filtre_info_utile')?>">
                    <input type="text" name="date1" id="datetimepicker" value="" placeholder="Daty anombohana" class="col-md-4 col-sm-4 col-xs-12 filtre-form"/>
                    <input type="text" name="date2" id="datetimepicker2" value="" placeholder="Daty iafarana" class="col-md-4 col-sm-4 col-xs-12 filtre-form"/>
                    <input type="submit" name="submit" value="Fantina" class="btn btn-blue pull-right" />
                </form>
            </div>
        <?php foreach ($info_util as $beinfo):?>
            <!-- Four -->
            <div class="post clearfix">
                <figure>
                    <img src="<?php echo ($beinfo->lienphoto) ? base_url($beinfo->lienphoto): base_url('assets/default/images/content/300/4.jpg')?>" alt="<?= $beinfo->titre?>" />
                    <div class="cat-name">
                        <span class="base"><?= $beinfo->libelle?></span>
                    </div>
                </figure>
                <div class="content">
                    <h2><a href="<?= base_url('ilaiko/'.$beinfo->url_tag)?>" title="<?= $beinfo->titre?>"><?= $beinfo->titre?></a></h2>
                    <?= substr(strip_tags($beinfo->contenue),0,250)." ..."?>
                </div>
                <div class="meta">
                    <span class="pull-left"><?= $beinfo->dernieremaj?></span>
                    <span class="pull-right"><a href="<?= base_url('accueil/detail_info_utile/'.$beinfo->idbeinfo)?>">Hamaky ny tohiny...</a></span>
                </div>
            </div>
        <?php endforeach;?>
        <nav class="nav-pagination">
            <ul>
                <?php
                //$nbpage = $this->articlelibrarie->getNbPage(count($article_lie),$nbreponse);
                /*for($i = 1; $i<=$nbpage;$i++){?>
                    <li class="active"><a href="<?= base_url('accueil/detail_categorie/'.$categorie->idcategorie.'/'.$i.'/'.$this->articlelibrarie->getLimit($i,$per_page))?>"><?= $i?></a></li>
                <?php }*/?>
            </ul>
            <!--<p>Pejy <?= $page?> amin'ny <?= $nbpage?></p>-->
        </nav> <!-- End Nav-Pagination -->
        <?php }
        else{?>
            <div class="filtre search-page">
                <form name="fikarohana" method="post" action="<?= base_url('accueil/filtre_info_utile')?>">
                    <input type="text" name="recherche" value="" placeholder="lohateny , teny , fehezan-teny ..." class="col-md-4 col-sm-4 col-xs-12 filtre-form"/>
                    <select name="categorie" id="categorie">
                        <option value="">Fantina ara-tsokajy</option>
                        <?php  foreach ($categories as $category):?>
                            <option value="<?= $category->idcatbeinfo?>"><?= $category->libelle?></option>
                        <?php endforeach;?>
                    </select>
                    <select name="ordre" id="ordre">
                        <option value="">Fantina amin'ny daty</option>
                        <option value="DESC">Daty midina</option>
                        <option value="ASC">Daty miakatra</option>
                    </select>
                    <input type="submit" name="submit" value="Fantina" class="btn btn-blue pull-right" />
                </form>
            </div>
            <div class="filtre search-page">
                <form name="fikarohana" method="post" action="<?= base_url('accueil/filtre_info_utile')?>">
                    <input type="date" name="date1" title="Daty niatombohaha">
                    <input type="date" name="date2" title="Daty niafarana">
                    <input type="submit" name="submit" value="Fantina" class="btn btn-blue pull-right" />
                </form>
            </div>
        <div class="sep-border margin-bottom20"></div> <!-- Separator -->

        <h4>Tsy nisy valiny ny fantina nataonao</h4>
        <p class="label label-important">Avereno indray ny fikarohana ka manandrama teny vaovao.</p><br><br>
        <p>You might want to consider some of our suggestions to get better results:</p>
        <ul>
            <li>Check your spelling.</li>
            <li>Try a similar keyword, for example: tablet instead of laptop.</li>
            <li>Try using more than one keyword.</li>
        </ul>
        <?php }?>
    </div> <!-- End Margin-Top40 -->
</div> <!-- End Main -->
<script>
    $(document).ready(function(){
        $('#datetimepicker').datetimepicker({
            timepicker: false,
            format: 'Y-m-d',
            formatDate: 'Y-m-d'
        });
        $('#datetimepicker2').datetimepicker({
            timepicker: false,
            format: 'Y-m-d',
            formatDate: 'Y-m-d'
        });
    })
</script>