<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Info utile | Ilaiko</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                          <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Mes articles</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Titre</th>
                                <th>Date mis à jour</th>
                                <th>Contenu</th>
                                <th>Catégorie</th>
                                <th>Chemin image</th>
                                <th>Credit photo</th>
                                <th>Liens  </th>
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
                                    <th><?= $info->lien?></th>
                                    <th>
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="<?=base_url('index.php/infoutilecontroller/deleteInfoUtile/'.$info->idbeinfo)?>">
                                                <button type="button" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></button>
                                            </a>
                                            <a href="<?=base_url('index.php/admin/editinfoutile/'.$info->idbeinfo)?>">
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