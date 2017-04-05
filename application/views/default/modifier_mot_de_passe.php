<div id="main" class="span8 page contact-page image-preloader">

    <div class="row-fluid">

        <h1>Fanovana teny miafina / modification mot de passe</h1>

        <?php
        $data = array();

        $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
        $lien_action  ='usercontroller/modifiermotdepasse';
        echo form_open_multipart($lien_action,$attributes);
        ?>

        <form id="enews-contact-form" method="post" action="#">
            <h4></h4>
            <label>Temy miafina taloha / Ancien mot de passe:</label>
            <input type="password" name="ancienmdp" id="ancienmdp" onchange="testancienmotdepass()" required/>
            <p id="testancienmdp"></p>
            <label>Tenimiafina vaovao/ Nouveau mot de passe</label>
            <input type="password" name="motdepasse" id="pass1" required>
            <label>Fanamarinana tenimiafina vaovao/ Verification du nouveau mot de passe</label>
            <input type="password" name="motdepasseverif" id="pass2" onchange="testmotdepass()" required>
            <p id="resulrcomparemdp"></p>

            <script>
                function testancienmotdepass() {
                    var pass1 = document.getElementById("ancienmdp").value;
                    var pass2 = <?php echo($this->session->userdata('user')[0]->motdepasse)?>;
                    var ret  = (pass1 == pass2)? "correspond avec le votre":"ne correspond pas avec le votre";
                    document.getElementById("testancienmdp").innerHTML = "le mot de passe " + ret;
                }
            </script>

            <script>
                function testmotdepass() {
                    var pass1 = document.getElementById("pass1").value;
                    var pass2 = document.getElementById("pass2").value;
                    var ret  = (pass1 == pass2)? "correspond":"ne correspond pas";
                    document.getElementById("resulrcomparemdp").innerHTML = "le mot de passe " + ret;
                }
            </script>

            <input type="submit" name="submit" value="Modifier" class="btn btn-blue" />


            <div class="data-status"></div> <!-- data submit status -->

        </form>

    </div> <!-- End Row-Fluid -->
</div>