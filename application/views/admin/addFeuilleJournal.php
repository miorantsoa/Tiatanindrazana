<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Modifier Single</h3>
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
                        <h2>Feuille Journal</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-4">
                                <?php echo form_open_multipart('journalcontroller/addOnePage')?>
                                <div class="form-group">
                                    <input type="hidden" value="<?= $page?>" name="page">
                                    <input type="hidden" value="<?= $id?>" name="id">
                                    <input type="file" name="image" class="form-control has-feedback-right" id="uniqImage">
                                </div>
                                <div class="col-md-offset-4 col-md-4">
                                    <img src="" id="thumbs" class="img img-thumbnail" hidden/>
                                </div>
                                <button type="submit" class="btn btn-info">Enregistrer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        window.URL = window.URL || window.webkitURL;

        //Aperçu de l'image séléctionné

        $("#uniqImage").on('change', function () {
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
    });
</script>
