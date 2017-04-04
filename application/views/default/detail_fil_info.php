<div class="row-fluid">
<div id="main" class="span8 single single-post image-preloader">

    <div class="row-fluid">

        <div class="breadcrumb clearfix">
            <span class="base">Ato no misy anao</span>
            <p><a href="<?= base_url('accueilcontroller')?>">Fandraisana</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;<a href="<?= base_url('accueil/detail_categorie/')?>" title="Faham-baovao"></a>Faham-baovao ny <?= (count($detail_fil)!=0)?$detail_fil[0]->datepublication : ""?></p>
        </div> <!-- End Breadcrumb -->

        <div class="content">
        <div class="header">
            <h4>Faham-baovao tamin'ny <?= (count($detail_fil)!=0)?$detail_fil[0]->datepublication : ""?></h4>
        </div>
        <?php foreach ($detail_fil as $fil): ?>
            <div class="item">
                <div class="span2">
                    <span class="meta alignleft"> <?= date('H:i',strtotime($fil->heurepublication))?></span>
                </div>
                <div class="span10 content pull-right">
                    <p><?= $fil->contenue?></p>
                </div>
            </div>
            <div class="sep-border"></div> <!-- Separator -->
        <?php endforeach;?>
        </div> <!-- End Comments -->
        <div class="prevnext-posts clearfix">
            <?php $prev =$this->filactu_model->getPrevDate($fil->datepublication);
            $next = $this->filactu_model->getNextDate($fil->datepublication);
            ?>
            <a href="<?= (count($prev)!=0) ? base_url('accueil/detail_filactu/'.$prev[0]->datepublication) : ""?>" class="prev">
                <p>Faham-baovao teo aloha</p>
            </a>
            <a href="<?= (count($next)!=0) ? base_url('accueil/detail_filactu/'.$next[0]->datepublication) : ""?>" class="next">
                <p>Faham-baovao manaraka</p>
            </a>
        </div> <!-- End PrevNext-Posts -->

    </div> <!-- End Row-Fluid -->
</div> <!-- End Main -->