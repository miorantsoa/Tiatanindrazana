<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Ajout info utile | Ilaiko</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php
                        $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                        $lien_action  = (isset($infoutiles)) ? 'infoutilecontroller/updateInfoUtile' : 'infoutilecontroller/addInfoUtile';
                        echo form_open_multipart($lien_action,$attributes);
                    ?>
                    <?php if(isset($infoutiles)){?>
                        <input type="hidden" value="<?= $infoutiles[0]->idbeinfo?>" name="infoutile">
                    <?php }?>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="titre">Titre<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="titre" name="titre" required="required" class="form-control col-md-7 col-xs-12" value="<?= (isset($infoutiles) && count($infoutiles)!=0) ? $infoutiles[0]->titre : ""?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="categorie">Catégorie<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select name="categorie" id="categorie" class="form-control">
                                <option value="">Séléctionner une catégorie</option>
                                <?php foreach ($categorie as $categorie):?>
                                    <option value="<?= $categorie->idcatbeinfo?>" <?= (isset($infoutiles) && count($infoutiles)!=0 && $infoutiles[0]->idcatbeinfo == $categorie->idcatbeinfo) ? "selected" : ""?>><?= $categorie->libelle?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="photo">Photo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="file" id="photo" name="photo" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="creditphoto">Credit photo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="creditphoto" name="copyrightphoto" class="form-control col-md-7 col-xs-12" value="<?= (isset($infoutiles) && $infoutiles[0]->copyrightphoto!="") ? $infoutiles[0]->copyrightphoto : ""?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="contenu">Contenu<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <textarea name="contenu" id="contenu" cols="30" rows="10" class="form-control"><?=(isset($infoutiles) && $infoutiles[0]->contenue != "") ? $infoutiles[0]->contenue : "" ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="lien">Liens</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input type="text" id="lien" name="lien" class="form-control col-md-7 col-xs-12" placeholder="www.unlien.com, www.unautrelien.fr, ..." value="<?=(isset($infoutiles) && $infoutiles[0]->lien != "") ? $infoutiles->lien : "" ?>">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </div>

                    <?php echo form_close()?>
                </div>
            </div>
        </div>
    </div>
</div>