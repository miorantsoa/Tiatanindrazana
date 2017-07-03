<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Images du journal parut le <?= (isset($journals)) ? reformat($journals[0]->dateparution) : "Indéfinie"?></h3>
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
                        <h2>Tout les images du journal</h2>
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
                                <form action="<?= base_url('page/administration/feuillejournal')?>" method="get">
                                    <div class="form-group has-feedback">
                                        <input type="text" name="date" class="form-control has-feedback-right" id="datetimepicker" placeholder="Date parution">
                                        <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    <button type="submit" class="btn btn-info">Filtrer</button>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <?php
                            foreach ($journals as $journal):?>
                                <div class="col-md-3 col-sm-3 col-xs-12 box-image">
                                    <img class="img img-thumbnail" src="<?= base_url($journal->cheminmedia) ?>" alt="Test fotsiny">
                                    <div class="btn btn-group">
                                        <a href="<?= base_url('journalcontroller/deleteFeuille/'.$journal->idmedia)?>" class="btn btn-danger"><i class="fa fa-trash"></i> Supprimer</a>
                                        <a href="<?= base_url('page/administration/editSingleImage/'.$journal->idmedia)?>" type="button"  class="btn btn-info"><i class="fa fa-edit"></i> Modifier</a>
                                    </div>
                                </div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function setID(id){
        $('[name="idimage"]').val(id);
    }
    $(document).ready(function () {
        $('#datetimepicker').datetimepicker({
            timepicker:false,
            format:'Y-m-d',
            formatDate:'Y-m-d',
        });
    })
</script>