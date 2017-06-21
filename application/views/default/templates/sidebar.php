<div id="sidebar" class="span4">
    <div class="widget clearfix">
        <div class="header">
            <h4>Faham-baovao</h4>
        </div>
        <div class="enews-tab">

            <!-- Tab Menu -->
            <ul class="nav nav-tabs" id="enewsTabs">
                <li class="active"><a href="#tab-populars" data-toggle="tab"><?= (count( $last_fil)!=0) ? reformat($last_fil[0]->datepublication) : ""?></a></li>
                <?php echo (count($fil_actuj2)!=0) ? '<li><a href="#tab-recents" data-toggle="tab">'.reformat($fil_actuj2[0]->datepublication).'</a></li>' : ""?>
            </ul>

            <div class="tab-content fil">
                <div class="tab-pane active fil" id="tab-populars">
                    <?php foreach ($last_fil as $fil):?>
                    <!-- One -->
                    <div class="item">
                        <div class="span2">
                            <span class="meta alignright"> <?= date('H:i',strtotime($fil->heurepublication))?></span>
                        </div>
                        <div class="span2 content pull-right">
                            <p><a href="<?= base_url('accueil/fil-d-actualite/'.$fil->datepublication)?>" title="<?= $fil->extrait?>"><?= $fil->extrait?></a></p>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div> <!-- End Populars -->

                <div class="widget clearfix">
                    <div class="best-picture">

                        <div class="header">
                            <h4>Sarisary zaritena</h4>
                        </div>

                        <div class="content">
                            <!-- Photo Galleries -->
                            <figure class="flexslider loading">
                                <ul class="slides">
                                    <li><a href="<?= base_url($sarisary->lien_image_une)?>" data-rel="prettyPhoto[sliderGallery]"><img src="<?= base_url($sarisary->lien_image_une)?>" alt="<?=$sarisary->titre?>" /></a></li>
                                </ul>
                            </figure>
                        </div>

                    </div>
                </div> <!-- End Widget -->
                <div class="tab-pane" id="tab-recents">

                    <?php
                   foreach ($fil_actuj2 as $fil):?>
                        <!-- One -->
                        <div class="item">
                            <div class="span2">
                                <span class="meta alignright"> <?= date('H:i',strtotime($fil->heurepublication))?></span>
                            </div>
                            <div class="span2 content pull-right">
                                <p><a href="<?= base_url('accueil/detail_filactu/'.$fil->datepublication)?>" title="<?= $fil->extrait?>"><?= $fil->extrait?></a></p>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div> <!-- End Recents -->

            </div> <!-- End Tab-Content -->

        </div> <!-- End Enews-Tab -->
    </div> <!-- End Widget -->
    <!--test-->
    <div class="widget clearfix">
        <div class="best-picture">

            <div class="header">
                <h4>Fanadihadiana</h4>
            </div>

            <div class="content">
                <div align="center">
                <p><a href="single_photo.html" title="View permalink House in The Woods"><?= isset($sondage) ? $sondage[0]->question : 'mbola tsy misy fanadihadina azo aseo'?></a></p>
                </div>
                <!-- Photo Galleries -->
                <?php
                $data = array();

                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                $lien_action  ='sondagecontroller/vote';
                echo form_open_multipart($lien_action,$attributes);
                ?>
                <form id="demo-form2" class="form-horizontal form-label-left" method="post">
                    <input type="hidden" name="idsondage" value="<?= isset($sondage) ? $sondage[0]->idsondage : null ?>">
                    <div class="radio">
                        <label><input type="radio" name="idreponse" value="1">Eny</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="idreponse" value="2">Tsia</label>
                    </div>
                    <div class="radio disabled">
                        <label><input type="radio" name="idreponse" value="3">tsy maneo hevitra</label>
                    </div>

                    <div align="center">
                    <input type="submit" name="submit" value="manaiky" class="btn btn-green" <?= isset($sondage) ? null :'disabled' ?>/>
                    </div>
                </form>
                <div class="meta">&nbsp;&nbsp;&nbsp;&nbsp;valiny:&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><?= isset($rvote) ? number_format($rvote['0'],2,',',' ') : 0?>% eny</a>| <a href="#"><?= isset($rvote) ? number_format($rvote['1'],2,',',' ') : 0?>% tsia</a>| <a href="#"><?= isset($rvote) ? number_format($rvote['2'],2,',',' ') : 0?>% tsy maneo hevitra</a></div>
            </div>

        </div>
    </div> <!-- End Widget -->
    <!--endtest-->
    <div class="widget clearfix">
        <div class="best-picture">

            <div class="header">
                <h4>Ampamoaka</h4>
            </div>

            <div class="content">
                <!-- Photo Galleries -->
                <figure class="flexslider loading">
                    <ul class="slides">
                        <li><a href="<?= base_url($ampamoaka->lien_image_une)?>" data-rel="prettyPhoto[sliderGallery]"><img src="<?= base_url($ampamoaka->lien_image_une)?>" alt="<?=$ampamoaka->titre?>" /></a></li>
                    </ul>
                </figure>
            </div>

        </div>
    </div> <!-- End Widget -->
    <div class="widget clearfix">
        <div class="best-picture">

            <div class="header">
                <h4>Sarisary zaritena</h4>
            </div>

            <div class="content">
                <!-- Photo Galleries -->
                <figure class="flexslider loading">
                    <ul class="slides">
                        <li><a href="<?= base_url($sarisary->lien_image_une)?>" data-rel="prettyPhoto[sliderGallery]"><img src="<?= base_url($sarisary->lien_image_une)?>" alt="<?=$sarisary->titre?>" /></a></li>
                    </ul>
                </figure>
            </div>

        </div>
    </div> <!-- End Widget -->
    
</div> <!-- End Sidebar -->
</div><!-- end row-fluid -->