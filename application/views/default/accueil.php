<div id="main" class="span8 image-preloader">

    <div id="home-slider" class="home-slider3">

        <div class="flexslider home-slider3-gallery">
            <ul class="slides">
                <li> <!-- One -->
                    <img src="<?= base_url($laune->lien_image_une)?>" alt="Screenshoot 1" />
                    <div class="content">
                        <div class="header">
                            <span class="date">
                            <span class="day">24</span>
                            <span class="date-details">
                            <span class="year">2013</span>
                            <span class="month">January</span>
                            </span>
                            </span>
                            <h3><a href="<?= base_url('accueil/detailArticle/'.$laune->idarticle)?>"><?= $laune->titre?></a></h3>
                        </div>
                        <p><?= $laune->resume?>[..]</p>
                    </div>
                </li>
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
        <span class="base">30<i>Tue</i></span>
        <div class="text-rotator">
            <div><a href="single_post.html" title="View permalink Small Market and St. Sebastian's Square in Opole">Small Market and St. Sebastian's Square in Opole</a></div>
            <div><a href="single_post.html" title="View permalink Mosaic Pool is Amazing And Beautiful Place">Mosaic Pool is Amazing And Beautiful Place</a></div>
            <div><a href="single_post.html" title="View permalink Glass House Below The Dark of Moon Light">Glass House Below The Dark of Moon Light</a></div>
            <div><a href="single_post.html" title="View permalink Platform House with Minimal Design">Platform House with Minimal Design</a></div>
            <div><a href="single_post.html" title="View permalink Winter Kitchen with Silver Panorama">Winter Kitchen with Silver Panorama</a></div>
        </div>
    </div> <!-- End Headlines -->

    <div class="row-fluid">

        <!-- One -->
        <?php
            $count = 1;
            foreach ($articlejournal as $article):
        ?>
        <div class="<?php echo ($count%2==0) ? "span6 post" : "span6 post no-margin-left"?>">
            <figure>
                <img src="<?php echo ($article->lien_image_une)? base_url($article->lien_image_une) : base_url('assets/default/images/content/600/1.jpg')?>" alt="Thumbnail 1" />
                <div class="cat-name">
                    <span class="base"><?=$article->libelle?></span>
                    <span class="arrow"></span>
                </div>
            </figure>
            <div class="text">
                <h2><a href="<?= base_url('accueil/detailArticle/'.$article->idarticle)?>" title="<?= $article->titre?>"><?= $article->titre?></a></h2>
                <p><?= substr($article->contenue,0,250)."...</p>"?></p>
                <div class="meta">By <a href="author.html">mdkiwol</a>&nbsp;&nbsp;|&nbsp;&nbsp;<?= $article->datepublication?>&nbsp;&nbsp;</div>
            </div>
        </div>
        <?php
            $count ++;
            endforeach;?>
        <div class="clearfix ie-sep"></div> <!-- Clearfix -->

    </div> <!-- End Row-Fluid -->
</div> <!-- End Main -->