<div id="main" class="span8 page contact-page image-preloader">

    <div class="row-fluid">

        <h1>Ny kaontiko / Mon compte</h1>
        <img src="<?= base_url( $this->session->userdata('user')[0]->imageprofile)?>">
        <p></p>
        <strong>Anarana / Nom:</strong>
        <p><?php echo($this->session->userdata('user')[0]->nomutilisateur)?></p>
        <strong>Fananpiny / Prenom:</strong>
        <p><?php echo($this->session->userdata('user')[0]->prenomutilisateur)?></p>
        <strong>Daty nahaterahana / Date de naissance</strong>
        <p><?php // echo($this->session->userdata('user')[0]->naissanceutilisateur)?></p>
  <!--      <strong>Laharana karapanondro / Numéro CIN</strong>
        <p><?php // echo($this->session->userdata('user')[0]->cin)?></p>
        <strong>Daty nazahona karapanondro / Date de livraison CIN</strong>
        <p><?php // echo($this->session->userdata('user')[0]->datedelivrancecin)?></p>
        <strong>Toerana nazahona karapanondro / Lieu d'obtention CIN</strong>
        <p><?php // echo($this->session->userdata('user')[0]->lieudelivrancecin)?></p>
        <strong>Sary recto karapanondro / image recto CIN</strong>
        <p></p>
        <img src="<? // base_url($this->session->userdata('user')[0]->liencin_recto)?>">
        <p></p>
        <strong>Sary verso karapanondro / image verso CIN</strong>
        <p></p>
        <img src="<? // base_url($this->session->userdata('user')[0]->liencin_verso)?>">
        -->
        <p></p>

        <strong>Mailaka / E-mail <span class="font-required">*</span></strong>
        <p><?php echo($this->session->userdata('user')[0]->emailutilisateur)?></p>
        <p></p>
        <div class="sep-border no-margin-top"></div>
        <p></p>
        <h4>Ny momba ny kaonty / a propos de votre compte:</h4>
        <strong>Anarana fahafantarana / Nom d'utilisateur</strong>
        <p><?php echo($this->session->userdata('user')[0]->identifiant)?></p>

    </div> <!-- End Row-Fluid -->
</div>