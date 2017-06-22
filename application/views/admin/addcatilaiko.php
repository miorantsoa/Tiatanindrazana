<div class="right_col"  role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Ajouter un categorie info utile / ilaiko</h2>
                    <div class="clearfix"></div>
                </div>
                <?php
                $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                $lien_action  = (isset($modif)) ? 'categorieutilcontroller/update' : 'categorieutilcontroller/addcategorie';
                echo form_open_multipart($lien_action,$attributes);
                ?>
                <div class="x_content">
                    <br>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="<?= base_url('index.php/categorieutilcontroller/addcategorie')?>">
                        <input type="hidden" name="idcategorie" value="<?=(isset($id)) ? $id : null ?>">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="rubrique">Nom de la categorie: <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="categorie" required="required" class="form-control col-md-7 col-xs-12" name="categorie" value="<?=(isset($modif)) ? $modif[0]->libelle : null?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="niveau">Niveau de restriction <span class="required">*</span></label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="niveau" id="niveau" class="form-control" value="<?=(isset($modif)) ? $modif[0]->niveau : null?>" required>
                                    <option>1</option>
                                    <option>2</option>
                                </select>
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