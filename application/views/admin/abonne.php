<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Liste abonnées en attente</h3>
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
                        <h2>Liste des abonnées en attente</h2>
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
                    <div class="row">
                        <div class="col-md-4">
                            <form action="<?= base_url('page/administration/abonnee')?>" method="post">
                                <div class="form-group">
                                    <label for="civilite">Civilite</label>
                                    <select name="civilite" id="" class="form-control">
                                        <option value="">Civilite</option>
                                        <option value="Andriamatoa">Mr.</option>
                                        <option value="Ramatoa">Mme.</option>
                                    </select>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="nom" class="form-control"  placeholder="Nom">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="prenom" placeholder="Prenom">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="cin" placeholder="CIN">
                                </div>
                                <label for="">Date d'inscription</label>
                                <div class="form-group has-feedback">
                                    <input type="text" name="date1" class="form-control has-feedback-right" id="datetimepicker" placeholder="Debut">
                                    <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                </div>
                                <div class="form-group has-feedback">
                                    <input type="text" name="date2" id="datetimepicker2" value="" placeholder="Fin" class="form-control has-feedback-right"/>
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
                                <th>Civilité</th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Date de naissance</th>
                                <th>Email</th>
                                <th>modifier</th>
                                <th>detail</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($abonnees as $abonnee):?>
                                <tr>
                                    <td><?= $abonnee->civilite?></td>
                                    <td><?= $abonnee->nomutilisateur?></td>
                                    <td><?= $abonnee->prenomutilisateur?></td>
                                    <td><?= $abonnee->naissanceutilisateur?></td>
                                    <td><?= $abonnee->emailutilisateur?></td>
                                    <td><a href="<?= base_url('page/administration/updateinfoabonnee/'.$abonnee->idutilisateur2)?>" class="btn btn-warning">Modifier</a></td>
                                    <td><a href="<?= base_url('page/administration/info_abonnee/'.$abonnee->idutilisateur2)?>" class="btn btn-success">Plus d'info</a></td>
                                    <td>
                                        <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-trash"></i> Supprimer</button>
                                        <div id="myModal" class="modal fade" role="dialog">
                                            <div class="modal-dialog">
                                                <!-- Modal content-->
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        <h4 class="modal-title">Suppression</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Etes-vous sûr de vouloir supprimer cet abonnnée ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="javascript:redirect('<?=base_url('usercontroller/delete_compte_vide/'.$abonnee->idutilisateur2)?>')">Supprimer</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </td>
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