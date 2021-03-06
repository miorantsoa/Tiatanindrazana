<?php  ?>

<div id="main" class="portofolio blog-posts image-preloader"">
    <div class="breadcrumb clearfix">
        <span class="base">Ato no misy anao</span>
        <p><a href="<?= base_url('accueil/feuileter_journal')?>">Hamaky Gazety</a></p>
    </div> <!-- End Breadcrumb -->
    <div class="margin-top40">
        <div class="filtre search-page">
            <form name="fikarohana" method="post" action="<?= base_url('accueil/feuilleter_journal')?>">
                <input type="text" name="date1" id="datetimepicker" value="" placeholder="Daty anombohana" class="col-md-4 col-sm-4 col-xs-12 filtre-form"/>
                <input type="text" name="date2" id="datetimepicker2" value="" placeholder="Daty iafarana" class="col-md-4 col-sm-4 col-xs-12 filtre-form"/>
                <select name="ordre" id="ordre">
                    <option value="">Fantina amin'ny daty</option>
                    <option value="DESC">Daty midina</option>
                    <option value="ASC">Daty miakatra</option>
                </select>
                <input type="submit" name="submit" value="Fantina" class="btn btn-blue pull-right" />
            </form>
        </div>
        <div class="span3">
            <figure class="figure">
                <img src="<?= (count($last)!=0)? base_url($last[0]->cheminmedia) : ""?>" alt="" class="img-thumbnail">
            </figure>
            <button class="btn btn-blue aligncenter span3 margin-top20"><a href="<?= (count($last)!=0) ? base_url('accueil/detail_gazety/'.$last[0]->idfeuille_journal) : ""?>">Hamaky</a></button>
            <p>Gazety nivoaka ny <?= (count($last)!=0) ? $last[0]->dateparution : ""?></p>
        </div>
        <div class="span8 pull-right">
            <div class="panel-danger ">
                <div class="panel-body">
                    <?php foreach ($gazety as $item):?>
                        <?php $temp=$item->cheminmedia;
                        if($item->min!=null){
                            $temp=$item->min;
                        }
                        ?>
                    <div class="span2  archive">
                        <figure class="figure">
                            <a href="<?= base_url('accueil/detail_gazety/'.$item->idfeuille_journal)?>"><img src="<?= base_url($temp)?>" alt="<?= $item->alt?>" class="img-thumbnail"></a>
                        </figure>

                        <p class="span2 margin-top20">Gazety ny <?= $item->dateparution?></p>
                    </div>
                    <?php endforeach;?>
                    <?php if(!$gazety){?>
                        <div class="grey">
                            <img src="<?= base_url('assets/default/images/page-vide.png')?>" alt="">
                        </div>
                    <?php }?>
                    <nav class="nav-pagination">
                        <ul>
                            <?php
                            $nbpage = $this->articlelibrarie->getNbPage(count($total),$per_page);
                            if($nbpage >1){
                            for($i = 1; $i<=$nbpage;$i++){?>
                                <li class="<?= ($page == $i) ? "active" : "" ?>"><a href="<?= base_url('accueil/feuilleter_journal/'.$i.'/'.$this->articlelibrarie->getLimit($i,$per_page)).'/'.$filtre['date1'].'/'.$filtre['date2']?>"><?= $i?></a></li>
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
<script type="text/javascript" src="<?= base_url()?>assets/default/js/modernizr.2.5.3.min.js"></script>
<script type="text/javascript" src="<?= base_url()?>assets/default/js/hash.js"></script>
<script type="text/javascript">
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
    })
</script>