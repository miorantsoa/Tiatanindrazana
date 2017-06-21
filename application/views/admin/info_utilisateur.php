<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Information Abonnée</h3>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="row">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Détail sur l'abonnée</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Information général</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-md-3">
                                        <div class="profile_img">
                                            <div id="crop-avatar">
                                                <!-- Current avatar -->
                                                <img class="img-responsive avatar-view" src="<?= base_url($abonnees[0]->imageprofile)?>" alt="Avatar" title="Change the avatar">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h3><?= $abonnees[0]->nomutilisateur." ".$abonnees[0]->prenomutilisateur?></h3>
                                        <ul class="list-unstyled user_data">
                                            <li><i></i> Né le <?= reformat($abonnees[0]->naissanceutilisateur)?></li>
                                            <li><i></i> N° CIN : <?= $abonnees[0]->cin?></li>
                                            <li><i></i> Livré le <?= reformat($abonnees[0]->datedelivrancecin)?> à <?= $abonnees[0]->lieudelivrancecin?></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Etat du compte</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="">
                                        <?= ($abonnees[0]->statututilisateur==0) ? "Non actif" : "Actif"?>
                                    </div>
                                    <a href="<?= ($abonnees[0]->statututilisateur==0) ? base_url('usercontroller/activerCompte/'.$abonnees[0]->idutilisateur2) : ""?>" class="btn btn-info pull-right"><?= ($abonnees[0]->statututilisateur==0) ? "Activer" : "Désactiver"?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Abonnement</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <p>Abonnement : <?= $abonnees[0]->libelle?></p>
                                    <p>Durrée de l'abonnement : <?= $abonnees[0]->durreeabonnement?></p>
                                    <p>Montant de l'abonnement : <?= $abonnees[0]->prixabonnement?></p>
                                    <p>Debut : <?= reformat($abonnees[0]->datedebutabonnement)?> - Fin : <?= reformat($abonnees[0]->datefinabonnement)?></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Information de payement</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <p>Numero de telephone utilisé pour le payement : <?= $abonnees[0]->numero?></p>
                                    <p>Numero de transaction : <?= $abonnees[0]->trans_id?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Recto CIN</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <img src="<?= base_url($abonnees[0]->liencin_recto) ?>" alt="" class="img img-thumbnail">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Verso CIN</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <img src="<?= base_url($abonnees[0]->liencin_verso) ?>" alt="" class="img img-thumbnail">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>