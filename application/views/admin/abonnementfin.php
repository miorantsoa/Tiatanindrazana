<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Les abonnement expiré</h3>
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
                        <h2>Liste des abonnées expiré</h2>
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
                            <form action="<?= base_url('page/administration/utilisateur_active')?>" method="post">
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
                                <label for="">Date fin abonnement</label>
                                <div class="form-group has-feedback">
                                    <input type="text" name="date" class="form-control has-feedback-right" id="datetimepicker" placeholder="Debut">
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
                                <th>Prenom</th
                                <th>Date Fin Abonnement</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($abonnees as $abonnee):?>
                                <tr>
                                    <td><?= $abonnee->civilite?></td>
                                    <td><?= $abonnee->nomutilisateur?></td>
                                    <td><?= $abonnee->prenomutilisateur?></td>
                                    <td><?= reformat($abonnee->datefinabonnement)?></td>
                                    <td><a href="<?= base_url('page/administration/info_abonnee/'.$abonnee->idutilisateur2)?>" class="btn">Plus d'info</a></td>
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