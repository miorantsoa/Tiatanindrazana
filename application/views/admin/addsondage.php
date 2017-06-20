<div class="right_col"  role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Ajouter un sondage</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php
                    $lien = (isset($modif)) ? 'index.php/sondagecontroller/updatesondage' : 'index.php/sondagecontroller/addsondage';
                    ?>
                    <br>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url($lien)?>">
                        <input type="hidden" name="idsondage" value="<?=(isset($id)) ? $id : null?>">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="niveau">Niveau de restriction <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" id="date" name="dateparution" value="<?=(isset($modif)) ? $modif[0]->dateparution : date('Y-m-d')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rubrique">question <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea type="text" id="question" required="required" class="form-control col-md-7 col-xs-12" name="question" placeholder="votre qestion pour le sondage"><?=(isset($modif)) ? $modif[0]->question : null?></textarea>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
