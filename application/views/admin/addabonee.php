<div class="right_col" role="main">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h3>Nouvelle abonnee :</h3>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                    $lien_action  = (isset($modif)) ? 'usercontroller/updateFilActu' : 'usercontroller/addUserback';
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

                                <input type="text" name="nomutilisateur" placeholder="RAKOTO" id="nomutilisateur" class="form-control" value="<?=(isset($modif)) ? $modif[0]->heurepublication : null?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Prenom : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="text" name="prenomutilisateur" placeholder="Jean" id="prenomutilisateur" class="form-control" value="<?=(isset($modif)) ? $modif[0]->heurepublication : null?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Date de naissance : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="date" name="naissanceutilisateur" placeholder="12/12/1970" id="naissanceutilisateur" class="form-control" max="<?= date('Y-m-d',mktime(0, 0, 0, date("m"),   date("d"),   date("Y")-18))?>" value="<?=(isset($modif)) ? $modif[0]->heurepublication : null?>" required>
                            </div>
                        </div>
    <!--                    <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Numero CIN : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="number" name="cin" placeholder="CIN ****" id="cin" class="form-control" maxlength="15" minlength="8" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Date obtention CIN : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="date" name="datedelivrancecin" placeholder="12/12/88" id="datedelivrancecin" class="form-control" max="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Lieu obtention CIN : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="text" name="lieudelivrancecin" placeholder="" id="lieudelivrancecin" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Image recto CIN : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="file" name="lienimagerectocin" placeholder="" id="lienimagerectocin" class="form-control" value="" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Image verso CIN : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="file" name="lienimageversocin" placeholder="" id="lienimageversocin" class="form-control" value="" required>
                            </div>
                        </div>
                        -->
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">E-Mail : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="email" name="emailutilisateur" placeholder="" id="emailutilisateur" class="form-control" value="<?=(isset($modif)) ? $modif[0]->heurepublication : null?>" required>
                            </div>
                        </div>
                        <p></p>
                        <div class="sep-border no-margin-top"></div>
                        <p></p>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Nom d'utilisateur : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="text" name="identifiant" placeholder="" id="identifiant" class="form-control" value="<?=(isset($modif)) ? $modif[0]->heurepublication : null?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Mot de passe : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="password" name="motdepasse" placeholder="" id="pass1" class="form-control" value="<?=(isset($modif)) ? $modif[0]->heurepublication : null?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Verification de passe : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="password" name="motdepasseverif" placeholder="" id="pass2" class="form-control" value="<?=(isset($modif)) ? $modif[0]->heurepublication : null?>" required>
                            </div>
                        </div>
                        <p id="resulrcomparemdp"></p>

                        <script>
                            function testmotdepass() {
                                var pass1 = document.getElementById("pass1").value;
                                var pass2 = document.getElementById("pass2").value;
                                var ret  = (pass1 == pass2)? "correspond":"ne correspond pas";
                                document.getElementById("resulrcomparemdp").innerHTML = "le mot de passe " + ret;
                            }
                        </script>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fil">Photo de profil : <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">

                                <input type="file" name="lienimagepdp" placeholder="" id="lienimagepdp" class="form-control" value="<?=(isset($modif)) ? $modif[0]->heurepublication : null?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="rubrique-mere" class="control-label col-md-3 col-sm-3 col-xs-12">Durree abonnement :</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="tarifabonnement" id="tarifabonnement" class="form-control col-md-3 col-sm-3 col-xs-12">
                            <option value="6">3 mois</option>
                            <option value="7">6 mois</option>
                            <option value="8">12 mois</option>
                        </select>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <button type="submit" class="btn btn-success">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>