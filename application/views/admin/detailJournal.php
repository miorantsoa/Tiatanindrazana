<div class="right_col" role="main">
	<div class="page_title">
		<div class="title_left">
			<h2>Journal n°1220 du 11 fevrier 2017</h2>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Detail du journal</h2>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
					<form class="form-inline  form-label-left">
						<div class="form-group">
							<label class="col-md-6 col-sm-6 col-xs-12" for="numero">Catégorie</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select>
									<option>Politika</option>
									<option>Finoana</option>
									<option>Fanatanjahan-tena</option>
								</select>
							</div>
						</div>
						
						<button class="btn btn-success btn-xs">Filtrer</button>
					</form>
					<table id="datatable" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Titre</th>
								<th>Catégorie</th>
								<th>Résumé</th>
								<th>Image de couverture</th>
								<th>Contenue</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach ($articles as $article):?>
							<tr>
                                <th><?= $article->titre?></th>
                                <th><?= $article->idcategorie?></th>
                                <th><?= $article->resume?></th>
                                <th><img src="<?= base_url($article->lien_image_une)?>" alt="Enawo Mandravarava"></th>
                                <th><?= $article->contenue?></th>
                                <th></th>
							</tr>
                            <?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>			
		</div>
	</div>
</div>