<div class="row-fluid">
    <div id="main" class="span8 single single-post image-preloader">
        <div class="row-fluid">
            <div class="breadcrumb clearfix">
                <span class="base">Ato no misy anao</span>
                <p><a href="<?= base_url('accueil/ilaiko')?>">Ilaiko</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;<?= $info_utile->libelle ?></a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;<?= substr($info_utile->titre,0,50)." ..."?></p>
            </div> <!-- End Breadcrumb -->
            <figure class="head-section">
                <img src="<?php echo ($info_utile->lienphoto)? base_url($info_utile->lienphoto) : base_url('assets/default/images/content/full/4.jpg"')?>" alt="Image" />
                <div class="head-section-content">
                    <h1><?= $info_utile->titre?></h1>
                    <p class="meta">Modif. le <?= $info_utile->dernieremaj?>&nbsp;&nbsp;| <?= $info_utile->libelle ?>&nbsp;</p>
                </div>
            </figure>
            <div class="fb-share-button" data-href="<?=current_url()?>" data-layout="button" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?=current_url()?>&amp;src=sdkpreparse">Partager</a></div>
            <div class="content">
                <p><span class="dropcaps dropcaps-circle dropcaps-green"><?= strtoupper(substr($info_utile->contenue,0,1)) ?></span> <?= substr($info_utile->contenue,1)?></p>
                <?= strip_tags($info_utile->contenue)?>
            </div> <!-- End Content -->

            <div class="sep-border no-margin-bottom"></div> <!-- Separator -->

            <div class="related-posts">
                <h3>Mitovy sokajy</h3>
                <?php
                $count = 1;
                for($i = 0 ; $i<count($associe);$i++){
                    if($i<4){
                        ?>
                        <!-- One -->
                        <div class="<?= ($count == 1) ? "item span3 no-margin-left" : "item span3"?>">
                            <a href="<?= base_url('ilaiko/'.$associe[$i]->url_tag)?>">
                                <figure class="figure-hover">
                                    <img src="<?php echo ($associe[$i]->lienphoto) ? base_url($associe[$i]->lienphoto) : base_url('assets/default/images/content/300/4.jpg')?>" alt="Thumbnail 1" />
                                    <div class="figure-hover-masked">
                                        <p class="icon-plus"></p>
                                    </div>
                                </figure>
                            </a>
                            <p><?= $associe[$i]->titre?></p>
                        </div>
                        <?php
                        $count++;
                    }

                }?>

            </div> <!-- End Related-Posts -->

        </div> <!-- End Row-Fluid -->
    </div> <!-- End Main -->
    <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>