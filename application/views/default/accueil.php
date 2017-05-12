<div class="row-fluid">
<div id="main" class="span8 image-preloader">
    <div id="home-slider" class="home-slider3">

        <div class="flexslider home-slider3-gallery">
            <ul class="slides">
                <?php if(isset($laune)){?>
                <li> <!-- One -->
                    <img src="<?= base_url($laune->lien_image_une)?>" alt="Screenshoot 1" />
                    <div class="content">
                        <div class="header">
                            <span class="date">
                            <span class="day"><?= date('d',strtotime($laune->datepublication)) ?></span>
                            <span class="date-details">
                            <span class="year"><?= date('Y',strtotime($laune->datepublication))?></span>
                            <span class="month"><?= date('M',strtotime($laune->datepublication))?></span>
                            </span>
                            </span>
                            <h3><a href="<?= base_url('accueil/detailArticle/'.$laune->idarticle)?>"><?= $laune->titre?></a></h3>
                        </div>
                        <p><?= $laune->resume?>[..]</p>
                    </div>
                </li>
                <?php }?>
            </ul>
        </div> <!-- End Home-Slider-Gallery -->

        <!--<div class="flexslider loading home-slider3-carousel">
            <ul class="slides">
                <li><img src="<?= base_url()?>/assets/default/images/content/300/1.jpg" alt="Thumbnail 1" title="Alvear Art Black and White Theme" /></li>
                <li><img src="<?= base_url()?>/assets/default/images/content/300/2.jpg" alt="Thumbnail 2" title="Camerette - Your Time to Explore" /></li>
                <li><img src="<?= base_url()?>/assets/default/images/content/300/3.jpg" alt="Thumbnail 3" title="Living Room in Italy" /></li>
                <li><img src="<?= base_url()?>/assets/default/images/content/300/4.jpg" alt="Thumbnail 4" title="Mosaic Pool is Amazing And Beautiful Place" /></li>
                <li><img src="<?= base_url()?>/assets/default/images//content/300/9.jpg" alt="Thumbnail 5" title="Platform House with Minimal Design" /></li>
            </ul>
        </div> <!-- End Home-Slider-Carousel -->

    </div> <!-- End Home-Slider3 -->

    <div class="headlines clearfix">
        <?php if(isset($last_fil) && count($last_fil)!=0){?>
        <span class="base"><?= date('d',strtotime($last_fil[0]->datepublication))?><i><?= date('M',strtotime($last_fil[0]->datepublication)) ?></i></span>
        <div class="text-rotator">
            <?php foreach ($last_fil as $fil):?>
                <div><a href="<?= base_url('accueil/detail_filactu/'.$fil->datepublication)?>" title="<?= substr($fil->contenue,0,50)?>"> <?= date('H:i',strtotime($fil->heurepublication))?> <?= substr($fil->contenue,0,100)?>...</a></div>
           <?php endforeach;?>
         </div>
        <?php }?>
    </div> <!-- End Headlines -->

    <div class="row-fluid">

        <!-- One -->
        <?php
            $count = 1;
            foreach ($articlejournal as $article):
        ?>
        <div class="<?php echo ($count%2==0) ? "span6 post box" : "span6 post no-margin-left box"?>">
            <figure>
                <img src="<?php echo ($article->lien_image_une)? base_url($article->lien_image_une) : base_url('assets/default/images/content/600/1.jpg')?>" alt="Thumbnail 1" />
                <div class="cat-name">
                    <span class="base"><?=$article->libelle?></span>
                    <span class="arrow"></span>
                </div>
            </figure>
            <div class="text">
                <h2><a href="<?= base_url('accueil/detailArticle/'.$article->idarticle)?>" title="<?= $article->titre?>"><?= $article->titre?></a></h2>
                <p><?= substr(strip_tags($article->contenue),0,250)."...</p>"?></p>
                <div class="meta"><a href="author.html">Niseho ny</a>&nbsp;&nbsp;|&nbsp;&nbsp;<?= $article->datepublication?>&nbsp;&nbsp;</div>
            </div>
        </div>
        <?php
            $count ++;
            endforeach;?>
        <div class="clearfix ie-sep"></div> <!-- Clearfix -->

    </div> <!-- End Row-Fluid -->
</div> <!-- End Main -->