
<div class="row-fluid home-page">
    <div id="main" class="span8 image-preloader">
        <div id="home-slider" class="home-slider3">

            <div class="flexslider home-slider3-gallery">
                <ul class="slides">
                    <?php if(isset($laune)){?>
                        <li> <!-- One -->
                            <img src="<?= ($laune->min!=null)? base_url($laune->min): base_url($laune->lien_image_une)?>" alt="Screenshoot 1" />
                            <div class="content">
                                <div class="header">
                            <span class="date">
                            <span class="day"><?= date('d',strtotime($laune->datepublication)) ?></span>
                            <span class="date-details">
                            <span class="year"><?= date('Y',strtotime($laune->datepublication))?></span>
                            <span class="month"><?= date('M',strtotime($laune->datepublication))?></span>
                            </span>
                            </span>
                                    <h3><a href="<?= base_url('article/'.$laune->url_tag)?>"><?= $laune->titre?></a></h3>
                                </div>
                                <p><?= $laune->resume?>[..]</p>
                            </div>
                        </li>
                    <?php }?>
                </ul>
            </div> <!-- End Home-Slider-Gallery -->
        </div> <!-- End Home-Slider3 -->

        <div class="headlines clearfix">
            <?php if(isset($last_fil) && count($last_fil)!=0){?>
                <span class="base"><?= date('d',strtotime($last_fil[0]->datepublication))?><i><?= date('M',strtotime($last_fil[0]->datepublication)) ?></i></span>
                <div class="text-rotator">
                    <?php foreach ($last_fil as $fil):?>
                        <div><a href="<?= base_url('accueil/fil-d-actualite/'.$fil->datepublication)?>" title="<?= substr($fil->contenue,0,50)?>"> <?= date('H:i',strtotime($fil->heurepublication))?> <?= substr($fil->contenue,0,100)?>...</a></div>
                    <?php endforeach;?>
                </div>
            <?php }?>
        </div> <!-- End Headlines -->

        <div class="row-fluid">

            <!-- One -->
            <?php
            var_dump(get_interval("2017-07-21"));
            $count = 1;
            foreach ($articlejournal as $article):
                ?>
                <div class="<?php echo ($count%2==0) ? "span6 post box" : "span6 post no-margin-left box"?>">
                    <figure>
                        <img src="<?php echo ($article->min)? base_url($article->min) : base_url($article->lien_image_une)?>" alt="Thumbnail 1" />
                        <div class="cat-name">
                            <span class="base"><?=$article->libelle?></span>
                            <span class="arrow"></span>
                        </div>
                    </figure>
                    <div class="text">
                        <h2><a href="<?= (isset($_SESSION['user']) && $article->niveau!=1) || get_interval($article->datepublication) >2 ? base_url('article/'.$article->url_tag) : "javascript:open_dialog()"?>" title="<?= $article->titre?>"><?= $article->titre?></a></h2>
                        <p><?= getExtrait($article->extrait)."...</p>"?></p>
                        <div class="meta">
                            <span class="pull-left">Niseho ny&nbsp;&nbsp;|&nbsp;&nbsp;<?= reformat($article->datepublication)?></span>&nbsp;&nbsp;
                            <span class="pull-right"><a href="<?= (isset($_SESSION['user']) && $article->niveau!=1 && get_interval($article->datepublication) <2) ? base_url('article/'.$article->url_tag) : "javascript:open_dialog()"?>">Hamaky ny tohiny...</a></span>
                        </div>
                    </div>
                </div>
                <?php
                $count ++;
            endforeach;?>
            <div class="clearfix ie-sep"></div> <!-- Clearfix -->

        </div> <!-- End Row-Fluid -->
    </div> <!-- End Main -->