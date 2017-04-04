<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h3>Ajout fil d'actualité</h3>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
                    <?php
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                    $lien_action  = 'filactucontroller/addFilActu';
                    echo form_open_multipart($lien_action,$attributes);
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Date <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" name="datepublication" id="date" class="form-control" value="<?=(isset($fildactu)) ? $fildactu[0]->datepublication : date('Y-m-d')?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Heure de publication <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="time" name="heurepublication" placeholder="HH:MM" id="fil" class="form-control" value="<?=(isset($fildactu)) ? $fildactu[0]->heurepublication : time('hour(:)minute')?>">
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Extrait du fil d'actualité <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="extrait" placeholder="En quelque mot..." id="fil" class="form-control"></textarea>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Contenu du fil d'actualité <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea name="contenue" placeholder="Entrer le cotenu..." id="fil" class="form-control"></textarea>
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