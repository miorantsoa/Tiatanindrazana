<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Créer un journal</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
                    <?php
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                    $lien_action  = (isset($journal)) ? 'journalcontroller/update' : 'journalcontroller/ajoutJournal';
                    echo form_open_multipart($lien_action,$attributes);
                    ?>
					<form class="form-horizontal form-label-left" action="<?= base_url('index.php/journalcontroller/ajoutJournal')?>" method="post">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="numero">Numéro de parrution <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="titre" required="required" name="numjournal" class="form-control col-md-7 col-xs-12" value="<?=(isset($journal)) ? $journal[0]->numeroparution : ""?>">
							</div>
						</div>
                        <?php if(isset($journal)){?>
                            <input type="hidden" value="<?= $journal[0]->idjournal?>" name="idjournal">
                        <?php } ?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="date">Date parrution <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="date" name="dateParution" id="date" class="form-control" value="<?=(isset($journal)) ? $journal[0]->datepublication : date('Y-m-d')?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="couverture">Couverture<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="file" name="couverture" id="couverture" class="form-control">
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