<div class="row-fluid white-bg">
<div id="main" class="span8 single single-post image-preloader">

    <div class="row-fluid">

        <div class="breadcrumb clearfix">
            <span class="base">Ato no misy anao</span>
            <p><a href="<?= base_url('accueil')?>">Fandraisana</a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;<a href="<?= base_url('accueil/categorie/'.$article->idcategorie.'-'.tag_categorie($article->libelle))?>" title="Vaovao rehetra ao amin'ny sokajy <?= $article->libelle?>"><?= $article->libelle ?></a>&nbsp;&nbsp;&rarr;&nbsp;&nbsp;<?= substr($article->titre,0,40)." ..."?></p>
        </div> <!-- End Breadcrumb -->
        <figure class="head-section">
            <img src="<?php echo ($article->lien_image_une)? base_url($article->lien_image_une) : base_url('assets/default/images/content/full/4.jpg"')?>" alt="Image" />
            <div class="head-section-content">
                <h1><?= $article->titre?></h1>
                <p class="meta"><?= $article->dateparution?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?= base_url('accueil/categorie/'.$article->idcategorie.'-'.tag_categorie($article->libelle))?>" title="Vaovao rehetra ao amin'ny sokajy <?= $article->libelle?>"><?= $article->libelle ?></a></p>
            </div>
        </figure>

        <a href="<?= base_url('accueil/addfavoris/'.$article->idarticle)?>" title="View author profile page">Ajouter favoris</a>
        <div class="fb-share-button" data-href="<?=current_url()?>" data-layout="button" data-mobile-iframe="false"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?=current_url()?>&amp;src=sdkpreparse">Partager</a></div>
        <div class="content">
            <p><?= $article->resume?></p>
           <?= strip_tags($article->contenue)?>
        </div> <!-- End Content -->

        <div class="sep-border no-margin-bottom"></div> <!-- Separator -->

        <div class="sep-border no-margin-top"></div> <!-- Separator -->

        <div class="related-posts">
            <h3>Mitovy sokajy</h3>
            <?php
                $count = 1;
                for($i = 0 ; $i<count($article_lie);$i++){
                    if($i<4){
            ?>
            <!-- One -->
            <div class="<?= ($count == 1) ? "item span3 no-margin-left" : "item span3"?>">
                <a href="<?= base_url('article/'.$article_lie[$i]->url_tag)?>">
                    <figure class="figure-hover">
                        <img src="<?php echo ($article_lie[$i]->lien_image_une) ? base_url($article_lie[$i]->lien_image_une) : base_url('assets/default/images/content/300/4.jpg')?>" alt="Thumbnail 1" />
                        <div class="figure-hover-masked">
                            <p class="icon-plus"></p>
                        </div>
                    </figure>
                </a>
                <p><?= $article_lie[$i]->titre?></p>
            </div>
            <?php
                        $count++;
                    }

            }?>

        </div> <!-- End Related-Posts -->

        <div class="sep-border"></div> <!-- Separator -->

        <div id="comments">

            <div class="comment-lists">
                <h4>Isan'ny fanehoan-kevitra : <?= count($commentaire)?> </h4>

                <ul id="comment">
                    <?php
                    $count = 1;
                    foreach ($commentaire as $comment):?>
                    <li> <!-- One -->
                        <figure><img src="<?= base_url()?>/assets/default/images/content/avatar/1.jpg" alt="Avatar 1" /></figure>
                        <div class="content">
                            <h5><a href="#"><?= $comment->nomprenom?></a></h5>
                            <p class="meta"><?= $comment->datecommentaire?></p>
                            <span class="comment-id"><?= $count?></span>
                            <p class="text"><?= $comment->commentaire?></p>
                        </div>
                    </li>
                    <?php
                    $count++;
                    endforeach;?>
                </ul>
            </div> <!-- End Comment-Lists -->

            <div class="form-comment" >
                <h4>Hametraka fanehoan-kevitra</h4>
                <p>Tsy maintsy fenoina izay misy <span class="font-required">*</span></p>
                <form id="com-form" action="<?= base_url('accueil/addCommentaire');?>" method="post" name="comm">
                    <label>Anarana <span class="font-required">*</span></label>
                    <input type="text" name="nom" required/>
                    <label>Adiresy mailaka <span class="font-required">*</span></label>
                    <input type="text" name="email" required/>
                    <label>Fanehoan-kevitra <span class="font-required">*</span></label>
                    <input type="hidden" name="article" value="<?= $article->idarticle?>" required>
                    <textarea name="commentaire" id="message" placeholder="Hametraka fanehoan-kevitra..." required></textarea>
                    <div class="g-recaptcha" data-sitekey="6LdCZikUAAAAAGLIArvXNrMcngw1HhbzaE-pTHWl" id="captcha1"></div>
                    <button class="btn btn-blue" type="submit">Handefa</button>
                </form>
            </div> <!-- End Form-Comment -->
        </div> <!-- End Comments -->

    </div> <!-- End Row-Fluid -->
</div> <!-- End Main -->
    <script>
        document.forms['comm'].addEventListener('submit',function(e){
            if (!doSubmitComm) {
                $("#captcha1").find("iframe").css( "border", "1px solid red" );
                e.preventDefault();
                return false;
            }
        })
    </script>
