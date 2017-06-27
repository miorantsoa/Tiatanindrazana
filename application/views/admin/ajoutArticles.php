<div class="right_col" role="main">
    <div class="modal fade" id="myModal2" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Information</h4>
                </div>
                <div class="modal-body">
                    <p id="message">Journal ajouté avec succés</p>
                </div>
                <!--  <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </div> -->
            </div>

        </div>
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Création d'un nouveau journal</h4>
                </div>
                <div class="modal-body">
                    <?php
                    $attributes = array('class' => 'form-horizontal', 'id' => 'journal-form');
                    $lien_action  = 'journalcontroller/ajoutAjax';
                    echo form_open_multipart($lien_action,$attributes);
                    ?>
                    <form class="form-horizontal" role="form" id="journal-form">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label"
                                    for="numeroparution">Numero de parution <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control"
                                       id="numeroparution" placeholder="n° 000" name="numjournal" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label"
                                    for="date">Date parution <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" name="dateParution" id="date" class="form-control" value="" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <label for="">Couverture <span class="required">*</span></label>
                                <input type="file"  onchange="javascript:checkFile(this)" name="couverture" id="couverture" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-default">Enregistrer</button>
                                <a class="btn btn-danger" id="annuller" onClick="annuler()"> Annuler</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!--  <div class="modal-footer">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                 </div> -->
            </div>

        </div>
    </div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
				<div class="x_title">
					<h2>Nouvelle article<small>Veuillez remplir le formulaire puis appuyer sur enregistrer</small></h2>
					<ul class="nav navbar-right panel_toolbox">
					<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li><a class="close-link"><i class="fa fa-close"></i></a>
					</li>
					</ul>
					<div class="clearfix"></div>
				</div>
				<div class="x_content">
                    <?php
                    $data = array();
                    if(isset($article)){
                        $data = $article[0];
                    }
                    $attributes = array('class' => 'form-horizontal form-label-left', 'id' => 'demo-form2');
                    $lien_action  = (isset($article)) ? 'articles/updateArticle' : 'articles/addArticle';
                    echo form_open_multipart($lien_action,$attributes);
                   ?>
                    <form action="">
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="titre">Titre <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input type="text" id="titre" name="titre" required="required" value="<?php $titre = (isset($article)) ? $data->titre : ""; echo $titre;?>" class="form-control col-md-7 col-xs-12">
							</div>
						</div>
                        <br>
                        <?php if(isset($article)){?>
                            <input type="hidden" value="<?= $data->idarticle?>" name="article">
                        <?php }?>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Rubrique <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<select class="form-control" name="rubrique" required>
									<option  value="">-- Choisir un rubrique --</option>
									<?php foreach ($rubrique as $rubrique):?>
                                        <option value="<?= $rubrique->idcategorie?>" <?php echo (isset($article) && $article[0]->idcategorie == $rubrique->idcategorie) ? "selected" : ""?>><?= $rubrique->libelle?></option>
                                    <?php endforeach;?>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Date de parrution<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="parution" name="date" class="date-picker form-control col-md-7 col-xs-12" required="required" type="text" value="<?php echo (isset($article)) ? $data->dateparution : ""?>">
							</div>
						</div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Niveau de restriction</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select name="niveau" id="niveau" class="form-control text-center" required>
                                    <option>---Choisir le niveau--</option>
                                    <option value="1" <?php echo (isset($article) && $article[0]->niveau == 1) ? "selected" : ""?>>1</option>
                                    <option value="2" <?php echo (isset($article) && $article[0]->niveau == 2) ? "selected" : ""?>>2</option>
                                </select>
                            </div>
                        </div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Image à la une</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<input id="img-une" name="img-une" class="form-control col-md-7 col-xs-12" type="file">
							</div>
                            <div class="col-md-offset-4 col-md-4">
                                <?php if($article && $article[0]->lien_image_une!=null){?>
                                    <img src="<?= base_url($article[0]->lien_image_une)?>" class="img img-thumbnail" id="thumbs"/>
                                <?php }
                                else{?>
                                    <img src="" id="thumbs" class="img img-thumbnail" hidden/>
                                <?php }?>
                            </div>
						</div>
                        <div class="form-group">
                            <div class="col-lg-offset-3 col-md-6 col-sm-6 col-xs-12">
                                <input type="checkbox" name="laune" id="hobby3" value="<?= isset($article) ? $article[0]->laune : 1?>"  <?=(isset($article) && $article[0]->laune == 1) ?"checked" : "" ?> class="flat" /> La une
                            </div>
                        </div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12">Résumé</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
								<textarea class="resizable_textarea form-control" placeholder="Resumé" name="resume"><?=(isset($article) && $article[0]->resume != "") ? $data->resume : ""?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="contenu">Contenu<span class="required">*</span>
							</label>
                            <div>
                                <textarea name="contenu" id="contenu" rows="10"><?=(isset($article) && $article[0]->resume != "") ? strip_tags($data->contenue) : "" ?></textarea>
                            </div>
						</div>
						<div class="ln_solid"></div>
						<div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="reset">Reset</button>
						<button type="submit" class="btn btn-success">Enregistrer</button>
						</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?= base_url('assets/admin/js/tinymce/tinymce.min.js') ?>"></script>
<script type="text/javascript">
    tinymce.init({
        // General options
        them:'modern',
        selector: 'textarea#contenu',
        invalid_elements : 'style',
        plugins: [
            'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
            'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
            'save table contextmenu directionality emoticons template paste textcolor'
        ],
        toolbar :'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons',
    });


    $(document).ready(function() {

            window.URL = window.URL || window.webkitURL;

           //Aperçu de l'image séléctionné

           $("#img-une").on('change', function () {
               var file = $(this)[0].files;
               if (file.length > 0) {
                   image = file[0];
                   $("#thumbs").show();
                   $img = $("#thumbs");
                   $("#thumbs").attr('src', window.URL.createObjectURL(image));
                   $("#thumbs").onload = function () {
                       window.URL.revokeObjectURL(this.src);
                   }
               }

           });
           
            var uploadField = document.getElementById("img-une");

            uploadField.onchange = function() {
                alert(this.files[0].size);
                if(this.files[0].size > 307200){
                    alert("Fichier trop grand, pensez à reduire la taille");
                    this.value = "";
                };
            };
            $('#parution').datetimepicker({
                timepicker:false,
                format:'Y-m-d',
                formatDate:'Y-m-d'
            });
            function annuler(){
                console.log("annul");
                $('#date').attr('value',"");
                $('#myModal').modal('hide');
            }
        $("#parution").on('change', function (e) {
            var date = $("#parution").val();
            if(date!="") {
                $.ajax(
                    {
                        url: "<?= base_url();?>articles/isNewJournal/" + date,
                        type: "POST",
                        success: function (data) {
                            if (data == "success") {
                                $('#date').attr('value', date);
                                $('#myModal').modal();
                            }
                        }
                    });
            }
        });
        $("#journal-form").on('submit', function (e) {
            e.preventDefault();
            $('#myModal').modal('hide')
            console.log(this);
            $.ajax(
                {
                    url:"<?= base_url();?>journalcontroller/ajoutAjax",
                    type:"POST",
                    data:new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,
                    success: function (data) {
                        if(data=="success"){
                            $('#myModal2').modal();
                        }
                    }
                });
        });
    }
    );
</script>