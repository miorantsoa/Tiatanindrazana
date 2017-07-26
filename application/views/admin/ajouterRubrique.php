
<div class="right_col"  role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Ajouter un rubrique</h2>
					<div class="clearfix"></div>
				</div>

				<div class="x_content">
                    <?php $lien = (isset($update)) ? 'index.php/rubrique/uptdaterubrique' : 'index.php/rubrique/addRubrique';

                    ?>
					<br>
					<form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="<?= base_url('index.php/rubrique/addRubrique')?>">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="rubrique">Nom du rubrique <span class="required">*</span>
							</label>
                            <input type="hidden" id="idrub" name="idrub" value="<?=(isset($update)) ? $update[0]->idcategorie : null?>">
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="rubrique" required="required" class="form-control col-md-7 col-xs-12" name="rubrique" value="<?=(isset($update)) ? $update[0]->libelle : null?>">
							</div>
						</div>
                        <div class="form-group">
                            <label for="rubrique-mere" class="control-label col-md-3 col-sm-3 col-xs-12">Rubrique mère</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="rubrique-mere" id="rubrique-mere" class="form-control col-md-3 col-sm-3 col-xs-12">
                                    <option value="">Choisir un rubrique mère</option>
                                    <?php foreach ($rubrique as $rubrique):?>
                                        <option value="<?=$rubrique->idcategorie?>"><?= $rubrique->libelle?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="niveau">Niveau de restriction <span class="required">*</span></label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select name="niveau" id="niveau" class="form-control" required>
									<option value="1">1</option>
									<option value="2">2</option>
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
<script>
    document.getElementById('niveau').value = <?= isset($update) ? intval($update[0]->niveau) : null ?>;

</script>