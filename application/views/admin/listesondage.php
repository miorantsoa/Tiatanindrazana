
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tous les sondages</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Liste des sondages</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a href="<?= base_url('admin/addsondage')?>"><i class="fa fa-plus-circle"></i> Nouveau fil d'info</a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <form action="<?= base_url('admin/filactu')?>" method="get">
                                <div class="form-group has-feedback">
                                    <input type="text" name="date" class="form-control has-feedback-right" id="datetimepicker" placeholder="Date parution">
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <button type="submit" class="btn btn-info">Filtrer</button>
                            </form>
                        </div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>question</th>
                                <th>date publication</th>
                                <th>Modiffier</th>
                                <th>supprimer</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($sondage as $sondage):?>
                                <tr>
                                    <th><?= $sondage->question?></th>
                                    <th><?= $sondage->dateparution?></th>

                                    <th>
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="<?=base_url('index.php/admin/updateSondage/'.$sondage->idsondage)?>">
                                                <button type="button" class="btn btn-warning btn-xs"><i class="glyphicon glyphicon-pencil"></i> Modillier</button>
                                            </a>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="btn-group" role="group" aria-label="...">
                                            <a href="<?=base_url('index.php/sondagecontroller/deleteSondage/'.$sondage->idsondage)?>">
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
