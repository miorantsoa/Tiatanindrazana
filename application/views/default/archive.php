<div id="main" class="portofolio blog-posts image-preloader"">
<div class="breadcrumb clearfix">
    <span class="base">Ato no misy anao</span>
    <p><a href="<?= base_url('accueil/archive')?>">Tahiry</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;Tahiry</p>
</div> <!-- End Breadcrumb -->
<div class="margin-top40">
    <div class="filtre search-page">
        <form name="fikarohana" method="post" action="<?= base_url('accueil/archive')?>">
            <span class="tile_header">Tahiry</span>
            <input type="text" name="recherche" value="" placeholder="lohateny , teny , fehezan-teny ..." class="col-md-4 col-sm-4 col-xs-12 filtre-form"/>
            <select name="ordre" id="ordre">
                <option value="">Fantina amin'ny daty</option>
                <option value="DESC">Daty midina</option>
                <option value="ASC">Daty miakatra</option>
            </select>
            <input type="submit" name="submit" value="Fantina" class="btn btn-blue pull-right" />
        </form>
        <form name="fikarohana" method="post" action="<?= base_url('accueil/archive')?>">
            <input type="text" name="date1" id="datetimepicker" value="" placeholder="Daty anombohana" class="col-md-4 col-sm-4 col-xs-12 filtre-form"/>
            <input type="text" name="date2" id="datetimepicker2" value="" placeholder="Daty iafarana" class="col-md-4 col-sm-4 col-xs-12 filtre-form"/>
            <input type="submit" name="submit" value="Fantina" class="btn btn-blue pull-right" />
        </form>
    </div>
    <div class="span3">
        <?php if(isset($last_journal)){?>
        <figure class="figure">
            <img src="<?= base_url($last_journal->liencouverture)?>" alt="" class="img-thumbnail">
        </figure>
        <a href="<?= base_url('accueil/archive/'.$last_journal->idjournal.'/'.reformat($last_journal->datepublication))?>" > <button class="btn btn-blue aligncenter span3 margin-top20">Hamaky</button></a>
        <p>Gazety nivoaka ny <?= reformat($last_journal->datepublication)?></p>
        <?php }?>
    </div>
    <div class="span8 pull-right">
        <div class="panel-danger ">
            <div class="panel-body">
                <?php foreach ($archive as $journal):?>
                    <div class="span2 no-margin-left archive">
                        <figure class="figure">
                            <a href="<?= base_url('accueil/archive/'.$journal->idjournal.'/'.reformat($journal->datepublication))?>"><img src="<?= base_url($journal->liencouverture)?>" alt="" class="img-thumbnail"></a>
                        </figure>
                        <p class="span2 margin-top20">Gazety ny <?= reformat($journal->datepublication)?></p>
                    </div>
                <?php endforeach;?>
                <nav class="nav-pagination">
                    <ul>
                        <?php
                        $nbpage = $this->articlelibrarie->getNbPage(count($total),$nbreponse);
                        $query = $filtre['query'];
                        if($query == null){
                            $query = "-";
                        }
                        if($nbpage >1){
                        for($i = 1; $i<=$nbpage;$i++){?>
                            <li class="<?= ($page == $i) ? "active" : "" ?>"><a href="<?= base_url('accueil/archive/'.$query.'/'.$i.'/'.$this->articlelibrarie->getLimit($i,$nbreponse)).'/'.$filtre['date_1'].'/'.$filtre['date_2']?>"><?= $i?></a></li>
                        <?php }?>
                    </ul>
                    <p>Pejy <?= $page?> amin'ny <?= $nbpage?></p>
                    <?php }?>
                </nav> <!-- End Nav-Pagination -->
            </div>
        </div>
    </div>
</div>
</div>
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