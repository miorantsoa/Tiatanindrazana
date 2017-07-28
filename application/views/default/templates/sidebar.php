<div id="sidebar" class="span4">
    <div class="widget clearfix">
        <div class="header">
            <h4>Faham-baovao</h4>
        </div>
        <div class="enews-tab">

            <!-- Tab Menu -->
            <ul class="nav nav-tabs" id="">
                <li class="active"><a data-toggle="tab"><?= (count( $last_fil)!=0) ? reformat($last_fil[0]->datepublication) : ""?></a></li>
            </ul>

            <div class="tab-content fil">
                <div class="tab-pane active fil">
                    <?php foreach ($last_fil as $fil):?>
                    <!-- One -->
                    <div class="item">
                        <div class="span2">
                            <span class="meta alignright"> <?= date('H:i',strtotime($fil->heurepublication))?></span>
                        </div>
                        <div class="span2 content pull-right">
                            <p><a href="<?= base_url('accueil/fil-d-actualite/'.$fil->datepublication)?>" title="<?= $fil->extrait?>"><?= $fil->extrait?> -- <span class="meta">Tohiny</span></a></p>
                        </div>
                    </div>
                    <?php endforeach;?>
                </div> <!-- End Fil -->
            </div> <!-- End Tab-Content -->

        </div> <!-- End Enews-Tab -->
    </div> <!-- End Widget -->
    <!--test-->
    <div class="widget clearfix">
        <div class="best-picture">

            <div class="header">
                <h4>Fanadihadiana</h4>
            </div>

            <div class="content" style="margin: 10px;">
                <div align="center">
                    <p><a href="single_photo.html" title="View permalink House in The Woods"><?=count($sondage)!=0 ? $sondage[0]->question : 'mbola tsy misy fanadiahana' ?></a></p>
                </div>
                <!-- Photo Galleries -->
                <?php
                $data = array();

                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'form-sondage', 'name'=>'form-sondage');
                $lien_action  ='sondagecontroller/vote';
                echo form_open_multipart($lien_action,$attributes);
                ?>
                <form id="demo-form2" class="form-horizontal form-label-left" method="post" onsubmit="check_if_capcha_is_filled()">
                    <input type="hidden" name="idsondage" value="<?=count($sondage)!=0 ? $sondage[0]->idsondage : null ?>">
                    <div class="radio">
                        <label><input type="radio" name="idreponse" value="1">Eny</label>
                    </div>
                    <div class="radio">
                        <label><input type="radio" name="idreponse" value="2">Tsia</label>
                    </div>
                    <div class="radio disabled">
                        <label><input type="radio" name="idreponse" value="3" checked>tsy maneo hevitra</label>
                    </div>

                    <div align="center">
                        <div class="g-recaptcha" data-callback="capcha_filled"
                             data-expired-callback="capcha_expired" data-sitekey="6LdCZikUAAAAAGLIArvXNrMcngw1HhbzaE-pTHWl" id="captcha"></div>
                        <input type="submit" name="submit" value="alefa" class="btn btn-green" <?= ($sondage)!=0 ? null :'disabled' ?>/>
                    </div>
                </form>
                <div class="meta">&nbsp;&nbsp;&nbsp;&nbsp;valiny:&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><?= isset($rvote) ? number_format($rvote['0'],2,',',' ') : 0?>% eny</a>| <a href="#"><?= isset($rvote) ? number_format($rvote['1'],2,',',' ') : 0?>% tsia</a>| <a href="#"><?= isset($rvote) ? number_format($rvote['2'],2,',',' ') : 0?>% tsy naneo hevitra</a></div>
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
                        <li><a href="<?= (isset($_SESSION['user'])) ? base_url($ampamoaka->lien_image_une) : "javascript:open_dialog()"?>" <?= (isset($_SESSION['user'])) ? 'data-rel="prettyPhoto[sliderGallery]"' : ""?>><img src="<?= base_url($ampamoaka->lien_image_une)?>" alt="<?=$ampamoaka->titre?>" /></a></li>
                    </ul>
                </figure>
            </div>

        </div>
    </div> <!-- End Widget -->
    <?php if(isset($pub)){
        $pub = current($pub)?>
    <div class="widget clearfix">
        <div class="best-picture">

            <div class="header">
                <h4>Doka</h4>
            </div>

            <div class="content">
                <!-- Photo Galleries -->
                <figure class="flexslider loading">
                    <ul class="slides">
                        <li><a href="<?= base_url($pub->lienredirection)?>" data-rel="prettyPhoto[sliderGallery]"><img src="<?= base_url($pub->lienimage)?>" alt="<?=$pub->alt?>" /></a></li>
                    </ul>
                </figure>
            </div>

        </div>
    </div> <!-- End Widget -->
    <?php }?>
    <div class="widget clearfix">
        <div class="best-picture">

            <div class="header">
                <h4>Sarisary zaritena</h4>
            </div>

            <div class="content">
                <!-- Photo Galleries -->
                <figure class="flexslider loading">
                    <ul class="slides">
                        <li><a href="<?= (isset($_SESSION['user'])) ? base_url($sarisary->lien_image_une) : "javascript:open_dialog()"?>" <?= (isset($_SESSION['user'])) ? 'data-rel="prettyPhoto[sliderGallery]"' : ""?>><img src="<?= base_url($sarisary->lien_image_une)?>" alt="<?=$sarisary->titre?>" /></a></li>
                    </ul>
                </figure>
            </div>

        </div>
    </div> <!-- End Widget -->
    
</div> <!-- End Sidebar -->
</div><!-- end row-fluid -->
<script>
	document.forms['form-sondage'].addEventListener('submit',function(e){
		if (!doSubmit) {
		    e.preventDefault();
            $("iframe").css( "border", "1px solid red" );
            return false;
		}
	})
</script>