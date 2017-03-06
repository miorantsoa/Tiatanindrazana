<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3>Ajout Pub</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                    $lien_action  = 'pubcontroller/addPub';
                    echo form_open_multipart($lien_action,$attributes);
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Date debut <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" name="datedebutdiffusion" id="date" class="form-control" value="<?=(isset($fildactu)) ? $fildactu[0]->datepublication : date('Y-m-d')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Date fin<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" name="datefindiffusion" id="date" class="form-control">
                            </div>
                        </div><div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">description<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="alt" placeholder="pub/lancement/..." id="fil" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Niveau de restriction</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="position" id="niveau" class="form-control text-center">
                                    <option>---Choisir la position--</option>
                                    <option value="1" <?php echo (isset($article) && $article[0]->niveau == 1) ? "selected" : ""?>>baniere</option>
                                    <option value="2" <?php echo (isset($article) && $article[0]->niveau == 2) ? "selected" : ""?>>pub</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Lien<span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input name="lienredirection" placeholder="chemin" id="fil" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Image *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input id="lienimage" name="lienimage" class="form-control col-md-7 col-xs-12" type="file">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Commentaire (facultatif) *</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class="resizable_textarea form-control" placeholder="text" name="resume"><?=(isset($publicite) && $publicite[0]->commentaire != "") ? $data->commentaire : ""?></textarea>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>