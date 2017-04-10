<div id="main" class="span8 page contact-page image-preloader">

    <div class="row-fluid">

        <h1>fisoratana anarana / Inscription</h1>

        <?php
        $data = array();

        $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
        $lien_action  ='kolikolycontroller/addKolikoly';
        echo form_open_multipart($lien_action,$attributes);
        ?>

        <form id="enews-contact-form" method="post" action="#">
            <h4>Ny momba anao / a propos de vous:</h4>
            <label>Type Abonnement</label>
            <select name="typeabonnement" id="typeabonnement" >

                <?php foreach ($categorieCorruption as $categorieCorruption):?>
                    <option value="<?=$categorieCorruption->idcatcorruption?>"><?=$categorieCorruption->libelle?></option>
                <?php endforeach;?>
            </select>
<!-- `corruption`(`idcatcorruption`, `datedenonciation`, `datefait`, `nomdenonciateur`, `adressedenonciateur`, `telephonedenonciateur`, `emaildenonciateur`, `sujet`, `contenue`, `lieu`)-->
            <label>Daty ny famohana / Date dénonciation:</label>
            <input type="date" name="datedenonciation" required/>
            <label>Daty nisehoany / Date fait:</label>
            <input type="date" name="datefait" maxlength="80" required/>
            <label>Anaranao / Votre nom(s):</label>
            <input type="text" name="nomdenonciateur" maxlength="80" required/>
            <label>Adiresy / Adresse dénoncitateur:</label>
            <input type="text" name="adressedenonciateur" maxlength="80" required/>
            <label>Ny nomeraon-telefaoniny/ Numéro de téléphone:</label>
            <input type="text" name="telephonedenonciateur" maxlength="80" required/>
            <label>Mailaka / E-mail <span class="font-required">*</span></label>
            <input type="email" name="emaildenonciateur" maxlength="225" required/>
            <label>Foto-kevitra / Sujet:</label>
            <input type="text" name="sujet" required/>
            <label>Toerna nitrangany / Lieu:</label>
            <input name="lieu" type="text">
            <label>Prorofo (sary) / Preuves:</label>
            <input type="file" name="media">

            <label>Hevitra ato Anatiny / Contenu:</label>
            <textarea name="contenue"></textarea>

            <p></p>


            <input type="submit" name="submit" value="Alefa" class="btn btn-blue" />


            <div class="data-status"></div> <!-- data submit status -->

        </form>

    </div> <!-- End Row-Fluid -->
</div>