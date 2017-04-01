<div id="main" class="portofolio blog-posts image-preloader"">
<div class="breadcrumb clearfix">
    <span class="base">Ato no misy anao</span>
    <p><a href="<?= base_url('accueil')?>">Tahiry</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;Tahiry</p>
</div> <!-- End Breadcrumb -->
<div class="margin-top40">
    <div class="filtre search-page">
        <form name="fikarohana" method="post" action="<?= base_url('accueil/filtre_journal')?>">
            <span class="tile_header">Tahiry</span>
            <input type="text" name="recherche" value="" placeholder="lohateny , teny , fehezan-teny ..." class="col-md-4 col-sm-4 col-xs-12 filtre-form"/>
            <select name="categorie" id="categorie">
                <option value="">Fantina ara-tsokajy</option>
            </select>
            <select name="ordre" id="ordre">
                <option value="">Fantina amin'ny daty</option>
                <option value="DESC">Daty midina</option>
                <option value="ASC">Daty miakatra</option>
            </select>
            <input type="submit" name="submit" value="Fantina" class="btn btn-blue pull-right" />
        </form>
    </div>
    <div class="span3">
        <?php if(isset($last_journal)){?>
        <figure class="figure">
            <img src="<?= base_url($last_journal->liencouverture)?>" alt="" class="img-thumbnail">
        </figure>
        <a href="<?= base_url('accueil/detailjournal/'.$last_journal->idjournal)?>" > <button class="btn btn-blue aligncenter span3 margin-top20">Hamaky</button></a>
        <p>Gazety nivoaka ny <?= $last_journal->datepublication?></p>
        <?php }?>
    </div>
    <div class="span8 pull-right">
        <div class="panel-danger ">
            <div class="panel-body">
                <?php foreach ($archive as $journal):?>
                    <div class="span2 no-margin-left archive">
                        <figure class="figure">
                            <a href="<?= base_url('accueil/detailjournal/'.$journal->idjournal)?>"><img src="<?= base_url($journal->liencouverture)?>" alt="" class="img-thumbnail"></a>
                        </figure>
                        <p class="span2 margin-top20">Gazety ny <?= $journal->datepublication?></p>
                    </div>
                <?php endforeach;?>
            </div>
        </div>
    </div>
</div>
</div>