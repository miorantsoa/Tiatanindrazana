<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Nouvelle article</h2>
					<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
                    <?php
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                    echo form_open_multipart('articles/addArticle',$attributes);?>
                    <form action="">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="titre">Titre <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="titre" name="titre" required="required" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
                        <br>
                        <div class="form-group">
                            <label for="journal" class="control-label col-md-3 col-sm-3 col-xs-12">Journal</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" name="journal" class="form-control col-md-7 col-xs-12">
                            </div>
                        </div>
                        <p></p>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rubrique <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="form-control" name="rubrique">
									<option  value="">-- Choisir un rubrique --</option>
									<?php foreach ($rubrique as $rubrique):?>
                                        <option value="<?= $rubrique->idcategorie?>"><?= $rubrique->libelle?></option>
                                    <?php endforeach;?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Date de parrution<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="parution" name="date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?= date('Y-m-d')?>">
							</div>
						</div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Niveau de restriction</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="niveau" id="niveau" class="form-control text-center">
                                    <option>---Choisir le niveau--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                </select>
                            </div>
                        </div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Image à la une</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="img-une" name="img-une" class="form-control col-md-7 col-xs-12" type="file">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Résumé</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea class="resizable_textarea form-control" placeholder="Resumé" name="resume"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="contenu">Contenu<span class="required">*</span>
							</label>
                            <div>
                                <textarea name="contenu" id="contenu"></textarea>
                            </div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						<button class="btn btn-primary" type="button">Cancel</button>
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
<script type="text/javascript" src="<?= base_url('assets/js/tinymce/tinymce.min.js') ?>"></script>
<script type="text/javascript">
    tinymce.init({
        // General options
        them:'modern',
        selector: 'textarea#contenu',
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality emoticons template paste textcolor'
        ],
        toolbar :'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
        plugins : 'advlist autolink link image lists charmap print preview'
    });
</script>