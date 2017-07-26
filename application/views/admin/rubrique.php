<div class="right_col" role="main">
	<div>
		<div class="page_title">
			<div class="title_left">
				<h3>Rubriques <small>Some examples to get you started</small></h3>
			</div>
		</div>
		<div class="clear_fix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Tous les rubriques</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a href="<?= base_url('admin/ajoutrubrique')?>"><i class="fa fa-plus-circle"></i> Nouveau rubrique</a>
                            </li>
                        </ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Nom du rubrique</th>
									<th>Niveau</th>
                                    <th>Modifier</th>
                                    <th>Supprimer</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($rubrique as $rub):?>
                                <tr>
                                    <th><?=$rub->libelle?></th>
                                    <th><?=$rub->niveau?></th>
                                    <th>
                                        <a href="<?=base_url('index.php/admin/updaterubrique/'.$rub->idcategorie)?>">
                                            <button type="button" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i> Modillier</button>
                                        </a>
                                    </th>
                                    <th>
                                        <a href="<?= base_url('index.php/rubrique/delete/'.$rub->idcategorie)?>">
                                            <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Supprimer</button>
                                        </a>
                                    </th>
                                </tr>
                                <?php endforeach;?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>