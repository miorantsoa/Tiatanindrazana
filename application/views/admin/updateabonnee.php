<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3>Modifier abonnee :</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                    $lien_action  = (isset($modif)) ? 'usercontroller/updateInfoUserBack' : null;
                    echo form_open_multipart($lien_action,$attributes);
                    ?>
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        <input type="hidden" name="idabonnee" value="<?=(isset($id)) ? $id : null ?>">
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Civilte : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="civilite" id="exampleRadios1" value="Ramosea" checked>
                                        Ramosea
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" name="civilite" id="exampleRadios2" value="Ramatoa">
                                        Ramatoa
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Nom : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="text" name="nomutilisateur" placeholder="RAKOTO" id="nomutilisateur" class="form-control" value="<?=(isset($modif)) ? $modif[0]->	nomutilisateur : null?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Prenom : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="text" name="prenomutilisateur" placeholder="Jean" id="prenomutilisateur" class="form-control" value="<?=(isset($modif)) ? $modif[0]->prenomutilisateur : null?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Date de naissance : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="date" name="naissanceutilisateur" placeholder="12/12/1970" id="naissanceutilisateur" class="form-control" max="<?= date('Y-m-d',mktime(0, 0, 0, date("m"),   date("d"),   date("Y")-18))?>" value="<?=(isset($modif)) ? $modif[0]->naissanceutilisateur : null?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">E-Mail : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="email" name="emailutilisateur" placeholder="" id="emailutilisateur" class="form-control" value="<?=(isset($modif)) ? $modif[0]->emailutilisateur : null?>" required>
                            </div>
                        </div>
                        <p></p>
                        <div class="sep-border no-margin-top"></div>
                        <p></p>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Nom d'utilisateur : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="text" name="identifiant" placeholder="" id="identifiant" class="form-control" value="<?=(isset($modif)) ? $modif[0]->identifiant : null?>" required>
                            </div>
                        </div>


                        <div class="ln_solid"></div>
                        <button type="submit" class="btn btn-success">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>