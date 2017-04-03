<div id="main" class="span8 page contact-page image-preloader">

    <div class="row-fluid">

        <h1>Fanovana ny momba ny kaonty / Modification du compte</h1>

        <?php
        $data = array();

        $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
        $lien_action  ='usercontroller/updateInfoUser';
        echo form_open_multipart($lien_action,$attributes);
        ?>
        <?php var_dump($this->session->userdata('user')) ?>

        <form id="enews-contact-form" method="post" action="#">
            <h4>Ny momba anao / a propos de vous:</h4>
            <label>civilité:</label>
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
            <div class="form-check">
                <label class="form-check-label">
                    <input class="form-check-input" type="radio" name="civilite" id="exampleRadios2" value="Mlle.">
                    Mlle.
                </label>
            </div>

            <label>Anarana / Nom</label>
            <input type="text" name="nomutilisateur" maxlength="80" value="<?php echo($this->session->userdata('user')[0]->nomutilisateur)?>" required/>
            <label>Fananpiny / Prenom</label>
            <input type="text" name="prenomutilisateur" maxlength="80" value="<?php echo($this->session->userdata('user')[0]->prenomutilisateur)?>" required/>
            <label>Daty nahaterahana / date de naissance</label>
            <input type="date" name="naissanceutilisateur" maxlength="80" value="<?php echo($this->session->userdata('user')[0]->naissanceutilisateur)?>" required/>
            <label>Laharana karapanondro / Numéro CIN</label>
            <input type="text" name="cin" maxlength="80" value="<?php echo($this->session->userdata('user')[0]->cin)?>" required/>
            <label>Daty nazahona karapanondro / Date de livraison CIN</label>
            <input type="date" name="datedelivrancecin" value="<?php echo($this->session->userdata('user')[0]->datedelivrancecin)?>" required/>
            <label>Toerana nazahona karapanondro / Lieu d'obtention CIN</label>
            <input type="text" name="lieudelivrancecin" maxlength="100" value="<?php echo($this->session->userdata('user')[0]->lieudelivrancecin)?>">
            <label>Sary recto karapanondro / image recto CIN</label>
            <p></p>
            <img src="<?= base_url( $this->session->userdata('user')[0]->liencin_recto)?>">
            <p></p>
            <input id="lienimagerectocin" name="liencin_recto" type="file">
            <label>Sary verso karapanondro / image verso CIN</label>
            <p></p>
            <img src="<?= base_url($this->session->userdata('user')[0]->liencin_verso)?>">
            <p></p>
            <input id="lienimageversocin" name="liencin_verso" type="file">
            <label>Mailaka / E-mail <span class="font-required">*</span></label>
            <input type="email" name="emailutilisateur" maxlength="225" value="<?php echo($this->session->userdata('user')[0]->emailutilisateur)?>" required/>
            <p></p>
            <div class="sep-border no-margin-top"></div>
            <p></p>
            <h4>Ny momba ny kaonty / a propos de votre compte:</h4>
            <label>Anarana fahafantarana / Nom d'utilisateur</label>
            <input type="text" name="identifiant" value="<?php echo($this->session->userdata('user')[0]->identifiant)?>" required/>

            <label>Sary / photo de profil</label>
            <p></p>
            <img src="<?= base_url($this->session->userdata('user')[0]->imageprofile)?>">
            <p></p>
            <input id="lienimagepdp" name="imageprofile" type="file">

            <input type="submit" name="submit" value="Modifier" class="btn btn-blue" />


            <div class="data-status"></div> <!-- data submit status -->

        </form>

    </div> <!-- End Row-Fluid -->
</div>