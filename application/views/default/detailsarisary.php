<div id="main" class="portofolio">

    <div class="breadcrumb clearfix">
        <span class="base">Ato no misy anao</span>
        <p><a href="<?= base_url('accueil')?>">Fandraisana</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;<a href="<?= base_url('accueil/sarisary/'.$categorie->idcategorie.'-'.tag_categorie($categorie->libelle))?>" title="Vaovao rehetra ao amin'ny sokajy <?= $categorie->libelle?>"><?= $categorie->libelle ?></a></p>
    </div> <!-- End Breadcrumb -->

    <div class="filtre search-page">
        <form name="fikarohana" method="post" action="<?= base_url('accueil/list_sarisary/'.$categorie->idcategorie)?>">
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
        <form name="fikarohana" method="post" action="<?= base_url('accueil/list_sarisary/'.$categorie->idcategorie)?>">
            <input type="text" name="date1" id="datetimepicker" value="" placeholder="Daty anombohana" class="col-md-4 col-sm-4 col-xs-12 filtre-form"/>
            <input type="text" name="date2" id="datetimepicker2" value="" placeholder="Daty iafarana" class="col-md-4 col-sm-4 col-xs-12 filtre-form"/>
            <input type="submit" name="submit" value="Fantina" class="btn btn-blue pull-right" />
        </form>
    </div>
    <div class="margin-top40 grey">
        <ul class="portofolio-filter">
            <li><a href="#" class="current active" data-filter="*">Sarisary rehetra</a></li>
            <?php foreach ($sous_rubrique as $rubrique):?>
            <li><a href="#" data-filter=".<?php echo str_replace(' ','',$rubrique->libelle)?>"><?= $rubrique->libelle?></a></li>
            <?php endforeach;?>
        </ul> <!-- End Portofolio-Filter -->

        <div class="portofolio-items row">
            <?php foreach ($sarisary as $item):?>
            <div class="span3 item <?php echo str_replace(' ','',$item->libelle)?> wordpress"> <!-- One -->
                <figure class="figure-overlay">
                    <a href="<?= base_url($item->lien_image_une)?>" data-rel="prettyPhoto[sliderGallery]" title="<?= $item->libelle?> nivoaka ny <?= $item->dateparution ?>">
                        <img src="<?= base_url($item->lien_image_une)?>" alt="<?= $item->libelle?> nivoaka ny <?= $item->dateparution ?>"/>
                        <div><p><?= $item->datepublication?> <i><?= $item->libelle?></i></p></div>
                    </a>
                </figure>
                <p><?= $item->datepublication?><i><?= $item->libelle?></i></p>
            </div>
            <?php endforeach;?>
        </div> <!-- End Portofolio-Items -->
        <?php if(!$sarisary){?>
            <div class="grey">
                <img src="<?= base_url('assets/default/images/page-vide.png')?>" alt="">
            </div>
        <?php }?>

    </div> <!-- End Margin-Top40 -->
</div> <!-- End Main -->
<script>
    $(document).ready(function(){
        $('#datetimepicker').datetimepicker({
            format:'Y-m-d',
            formatDate:'Y-m-d',
            onShow:function( ct ){
                this.setOptions({
                    maxDate:$('#datetimepicker2').val()?$('#datetimepicker2').val():false
                })
            },
            timepicker:false
        });
        $('#datetimepicker2').datetimepicker({
            format:'Y-m-d',
            formatDate:'Y-m-d',
            onShow:function( ct ){
                this.setOptions({
                    minDate:$('#datetimepicker').val()?$('#datetimepicker').val():false
                })
            },
            timepicker:false
        });
    });
</script>