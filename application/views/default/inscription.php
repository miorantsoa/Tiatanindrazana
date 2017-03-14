<div id="main" class="span8 page contact-page image-preloader">

    <div class="row-fluid">

        <h1>fisoratana anarana / Inscription</h1>
        <p>`civilite`, `nomutilisateur`, `prenomutilisateur`, `naissanceutilisateur`, `cin`, `datedelivrancecin`, `lieudelivrancecin`, `liencin_recto`, `liencin_verso`, `emailutilisateur`, `identifiant`, `motdepasse`, `statututilisateur`, `imageprofile`</p>

        <form id="enews-contact-form" method="post" action="#">
            <h4>Ny momba anao / a propos de vous:</h4>
            <label>Fahalalam-pomba / civilité</label>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="civilite" id="exampleRadios1" value="Mr." checked>
                    Mr.
                </label>
            </div>
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="civilite" id="exampleRadios2" value="Mrs.">
                    Mrs.
                </label>
            </div>

            <label>Anarana / Nom</label>
            <input type="text" name="nomutilisateur" maxlength="80" required/>
            <label>Fananpiny / Prenom</label>
            <input type="text" name="prenomutilisateur" maxlength="80" required/>
            <label>Daty nahaterahana / date de naissance</label>
            <input type="date" name="naissanceutilisateur" maxlength="80" required/>
            <label>Laharana karapanondro / Numéro CIN</label>
            <input type="text" name="cin" maxlength="80" required/>
            <label>Daty nazahona karapanondro / Date de livraison CIN</label>
            <input type="date" name="datedelivrancecin" required/>
            <label>Toerana nazahona karapanondro / Lieu d'obtention CIN</label>
            <input type="text" name="lieudelivrancecin" maxlength="100">
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Sary recto karapanondro / image recto CIN</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="lienimagerectocin" name="lienimagerectocin" class="form-control col-md-7 col-xs-12" type="file">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Sary verso karapanondro / image verso CIN</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="lienimageversocin" name="lienimageversocin" class="form-control col-md-7 col-xs-12" type="file">
                </div>
            </div>
            <label>Mailaka / E-mail <span class="font-required">*</span></label>
            <input type="text" name="emailutilisateur" maxlength="225" required/>

            <h4>Ny momba ny kaonty / a propos de votre compte:</h4>
            <label>Anrana fahafantarana / Nom d'utilisateur</label>
            <input type="text" name="identifiant" required/>
            <label>Tenimiafina / Mot de passe</label>
            <input type="password" name="motdepasse" required>
            <label>Fanamarinana tenimiafina / Verification mot de passe</label>
            <input type="password" name="motdepasseverif" required>
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Sary / photo de profil</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="lienimagepdp" name="lienimagepdp" class="form-control col-md-7 col-xs-12" type="file">
                </div>
            </div>
            <input type="submit" name="submit" value="Envoyer" class="btn btn-blue" />

            <div class="data-status"></div> <!-- data submit status -->

        </form>

    </div> <!-- End Row-Fluid -->
</div>