<div class="right_col" main="role">
	<div>
		<div class="page_title">
			<div class="title_left">
				<h3>Mes journals</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
					<div class="x_title">
						<h2>Tous les journal</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<table id="datatable" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th>Numero de parrution</th>
									<th>Date parrution</th>
                                    <th>Couverture</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($journals as $journal):?>
                                    <tr>
                                        <th><?= $journal->numeroparution?></th>
                                        <th><?= $journal->datepublication?></th>
                                        <th><?= $journal->liencouverture ?></th>
                                        <th>
                                            <div class="btn-group btn-group-lg" role="group">
                                                <a href="<?= base_url('index.php/journalcontroller/delete/'.$journal->idjournal)?>">
                                                    <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                                                </a>
                                                <a href="<?= base_url('index.php/admin/editJournal/'.$journal->idjournal)?>">
                                                    <button type="button" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i></button>
                                                </a>
                                            </div>
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