<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Info utile | Ilaiko</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Liste Ilaiko | Info Utile</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a href="<?= base_url('admin/ajoutInfoUtile')?>"><i class="fa fa-plus-circle"></i>Nouveau info utile</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <form action="<?= base_url('admin/infoutile')?>" method="get">
                                <div class="form-group has-feedback">
                                    <input type="text" name="date" class="form-control has-feedback-right" id="datetimepicker" placeholder="Date création, date modification">
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div class="form-group">
                                    <label for="titre">Titre</label>
                                    <input type="text" class="form-control" name="titre" placeholder="Titre">
                                </div>
                                <div class="form-group">
                                    <label for="date">Rubrique</label>
                                    <select name="rubrique" id="" class="form-control">
                                        <option value="">Choix rubrique</option>
                                        <?php foreach ($rubrique as $item):?>
                                            <option value="<?= $item->idcatbeinfo?>"><?= $item->libelle?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-info">Filtrer</button>
                            </form>
                        </div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Date modification</th>
                                <th>Contenu</th>
                                <th>Catégorie</th>
                                <th>Chemin image</th>
                                <th>Credit photo</th>
                                <th>Etat publication</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($infos as $info):?>
                                <tr>
                                    <th><?= $info->titre?></th>
                                    <th><?= $info->dernieremaj?></th>
                                    <th><?= $info->contenue?></th>
                                    <th><?= $info->libelle?></th>
                                    <th><img src="<?= base_url($info->lienphoto)?>" class="img-thumbnail"></th>
                                    <th><?= $info->copyrightphoto?></th>
                                    <th>
                                        <a href="<?= base_url('index.php/infoutilecontroller/editEtatPublication/'. $info->idbeinfo)?>">
                                            <button type="button" class="btn btn-info btn-xs">Publié :  <?= $info->publie?></button>
                                        </a>
                                    </th>
                                    <th>
                                        <div class="btn btn-group-xs" role="group" aria-label="...">
                                            <a href="<?=base_url('index.php/admin/editinfoutile/'.$info->idbeinfo)?>">
                                                <button type="button" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i> Modifier</button>
                                            </a>
                                            <a href="<?=base_url('index.php/infoutilecontroller/deleteInfoUtile/'.$info->idbeinfo)?>">
                                                <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Supprimer</button>
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
    <script>
        $(document).ready(function () {
            $('#datetimepicker').datetimepicker({
                timepicker:false,
                format:'Y-m-d',
                formatDate:'Y-m-d',
            });
        })
    </script>