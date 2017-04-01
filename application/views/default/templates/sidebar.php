<div id="sidebar" class="span4">
    <div class="widget clearfix">
        <div class="header">
            <h4>Faham-baovao</h4>
        </div>
        <div class="enews-tab">

            <!-- Tab Menu -->
            <ul class="nav nav-tabs" id="enewsTabs">
                <li class="active"><a href="#tab-populars" data-toggle="tab"><?= $last_fil[0]->datepublication?></a></li>
                <?= (count($fil_actuj2)!=0) ? '<li><a href="#tab-recents" data-toggle="tab"><?= (count($fil_actuj2)!=0) ? $fil_actuj2[0]->datepublication : "" ?></a></li>' : ""?>
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
                            <p><a href="single_post.html" title="<?= $fil->contenue?>"><?= $fil->contenue?></a></p>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div> <!-- End Populars -->

                <div class="tab-pane" id="tab-recents">

                    <?php foreach ($fil_actuj2 as $fil):?>
                        <!-- One -->
                        <div class="item">
                            <div class="span2">
                                <span class="meta alignright"> <?= date('H:i',strtotime($fil->heurepublication))?></span>
                            </div>
                            <div class="span2 content pull-right">
                                <p><a href="single_post.html" title="<?= $fil->contenue?>"><?= $fil->contenue?></a></p>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div> <!-- End Recents -->

            </div> <!-- End Tab-Content -->

        </div> <!-- End Enews-Tab -->
    </div> <!-- End Widget -->
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

                <div class="meta">By <a href="author.html">mdkiwol</a>&nbsp;&nbsp;|&nbsp;&nbsp;Jan. 7, 2013&nbsp;&nbsp;|&nbsp;&nbsp;<a href="single_video.html">15 comments</a></div>
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

                <div class="meta">By <a href="author.html">mdkiwol</a>&nbsp;&nbsp;|&nbsp;&nbsp;Jan. 7, 2013&nbsp;&nbsp;|&nbsp;&nbsp;<a href="single_video.html">15 comments</a></div>
            </div>

        </div>
    </div> <!-- End Widget -->

    <div class="widget clearfix">
        <div class="sponsors">

            <div class="header">
                <h4>Sponsors</h4>
            </div>

            <div class="content">
                <img src="<?= base_url('assets/default/images/ads/180x180.png')?>" alt="Sponsor 1" />
                <img src="<?= base_url('assets/default/images/ads/180x180.png')?>" alt="Sponsor 2" />
                <img src="<?= base_url('assets/default/images/ads/180x180.png')?>" alt="Sponsor 3" />
                <img src="<?= base_url('assets/default/images/ads/180x180.png')?>" alt="Sponsor 4" />
            </div>

        </div>
    </div> <!-- End Widget -->
    
</div> <!-- End Sidebar -->
</div><!-- end row-fluid -->