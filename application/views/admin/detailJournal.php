<div class="right_col" role="main">
	<div class="page_title">
		<div class="title_left">
			<?= (count($articles)!=0) ? '<h2>Journal n° '.$articles[0]->numeroparution.' du 11 '.$articles[0]->datepublication.'</h2>' : ""?>
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
					<table id="datatable" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Titre</th>
								<th>Catégorie</th>
								<th>Résumé</th>
								<th>Image de couverture</th>
								<th>Contenue</th>
								<th>La une</th>
							</tr>
						</thead>
						<tbody>
                            <?php foreach ($articles as $article):?>
							<tr>
                                <th><?= $article->titre?></th>
                                <th><?= $article->libelle?></th>
                                <th><?= $article->resume?></th>
                                <th><img class="img img-thumbnail" src="<?= base_url($article->lien_image_une)?>" alt="Enawo Mandravarava"></th>
                                <th><?= substr(strip_tags($article->contenue),0,250)?>...</th>
                                <th>
                                    <div class="btn btn-group btn-group-lg" role="group">
                                        <a href="<?= base_url('index.php/admin/editUne/'.$article->idarticle)?>">
                                            <button type="button" class="btn btn-info btn-xs">La une : <?= $article->laune?></button>
                                        </a>
                                        <a href="<?=base_url('index.php/admin/editArticle/'.$article->idarticle)?>">
                                            <button type="button" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i> Modifier</button>
                                        </a>
                                    </div>
                                </th>
							</tr>
                            <?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>			
		</div>
	</div>
</div>