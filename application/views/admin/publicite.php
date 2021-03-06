<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tous les publicites</h3>
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
                                <th>date de diffusion</th>
                                <th>Date fin</th>
                                <th>description</th>
                                <th>position</th>
                                <th>lien de redirection</th>
                                <th>image</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($publicite as $publicite):?>
                                <tr>
                                    <th><?= $publicite->datedebutdiffusion?></th>
                                    <th><?= $publicite->datefindiffusion?></th>
                                    <th><?= $publicite->alt?></th>
                                    <th><?= $publicite->position?></th>
                                    <th><?= $publicite->lienredirection?></th>
                                    <th><img src="<?= base_url($publicite->lienimage)?>" class="img-thumbnail"></th>
                                    <th>
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="<?=base_url('index.php/pubcontroller/delete/'.$publicite->idpublicite)?>">
                                                <button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i></button>
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