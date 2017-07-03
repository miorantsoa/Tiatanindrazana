<div class="right_col" role="main">
   <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Tous mes articles</h3>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Mes articles</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a href="<?= base_url('admin/ajoutarticles')?>"><i class="fa fa-plus-circle"></i> Nouvelle article</a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <form action="<?= base_url('admin/articles')?>" method="get">
                        <div class="form-group has-feedback">
                            <input type="text" name="date" class="form-control has-feedback-right" id="datetimepicker" placeholder="Date parution" value="<?= ($filtre && $filtre['date']) ? $filtre['date'] : ""?>">
                            <span class="fa fa-calendar form-control-feedback right" aria-hidden="true"></span>
                        </div>
                        <div class="form-group">
                            <label for="titre">Titre</label>
                            <input type="text" class="form-control" name="titre" placeholder="Titre" value="<?= ($filtre['query']) ? $filtre['query'] : ""?>">
                        </div>
                        <div class="form-group">
                            <label for="date">Rubrique</label>
                            <select name="rubrique" id="" class="form-control">
                                <option value="">Choix rubrique</option>
                                <?php foreach ($rubrique as $item):?>
                                    <option value="<?= $item->idcategorie?>" <?= ($categorie && $categorie == $item->idcategorie) ? "selected" : ""?>><?= $item->libelle?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Ordre d'apparition</label>
                            <select name="ordre" id="ordre" class="form-control">
                                <option value="">Ordre d'apparition</option>
                                <option value="DESC" <?= ($filtre['ordre'] && $filtre['ordre'] == "DESC") ? "selected" : ""?>>Descendant</option>
                                <option value="ASC" <?= ($filtre['ordre'] && $filtre['ordre'] == "ASC") ? "selected" : ""?>>Ascendant</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Filtrer</button>
                    </form>
                </div>
            </div>
          <div class="x_content">
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Titre</th>
                  <th>Date</th>
                  <th>Resume</th>
                  <th>Contenu</th>
                  <th>Chemin image</th>
                  <th>Publié</th>
                  <th>La une</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($results as $article):?>
                    <tr>
                        <th><?= $article->titre?></th>
                        <th><?= $article->dateparution?></th>
                        <th><?= $article->resume?></th>
                        <th><?= substr(strip_tags($article->contenue),0,250)?></th>
                        <th><img src="<?= base_url($article->lien_image_une)?>" class="img-thumbnail"></th>
                        <th>
                            <a href="<?= base_url('index.php/articles/editEtatPublication/'.$article->idarticle)?>">
                                <button type="button" class="btn btn-info btn-xs">Publié :   <?= $article->etatpublication?></button>
                            </a>
                          </th>
                        <th>
                            <a href="<?= base_url('index.php/page/administration/editUne/'.$article->idarticle)?>">
                                <button type="button" class="btn btn-info btn-xs">La une : <?= $article->laune?></button>
                            </a>
                        </th>
                        <th>
                            <div class="btn btn-group" role="group" aria-label="...">
                                <a href="<?=base_url('index.php/page/administration/editArticle/'.$article->idarticle)?>">
                                <button type="button" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-edit"></i> Modifier</button>
                                </a>

                                <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal"><i class="glyphicon glyphicon-trash"></i> Supprimer</button>
                                <div id="myModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                <h4 class="modal-title">Suppression</h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Etes-vous sur de vouloir supprimer cet article?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="javascript:redirect('<?=base_url('index.php/articles/deleteArticle/'.$article->idarticle)?>')">Supprimer</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
<!--                                </a>-->
                            </div>
                        </th>
                    </tr>
                <?php endforeach;?>
              </tbody>
            </table>
              <?php
              $nbpage = $this->articlelibrarie->getNbPage(count($articles),$nbreponse);
              $query = $filtre['query'];
              if($query == null){
                  $query = "-";
              }
              if($filtre && $filtre['ordre']==null){
                  $filtre['ordre'] = "DESC";
              }
              if($categorie == null){
                  $categorie = "-";
              }
              if($nbpage >1){?>
              <ul class="pagination">
                  <?php
                  for($i = 1; $i<=$nbpage;$i++){?>
                      <li class="<?= ($page == $i) ? "active" : "" ?>"><a href="<?= base_url('dashboard/articles/'.$categorie.'/'.$i.'/'.$this->articlelibrarie->getLimit($i,$per_page)).'/'.$query.'/'.$filtre['date'].'/'.$filtre['ordre']?>"><?= $i?></a></li>
                  <?php }?>
                <!--  <li><a href="#">&laquo;</a></li>
                  <li><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">&raquo;</a></li>-->
              </ul>
              <?php }?>
          </div>
        </div>
    </div>
  </div>
</div>
    <script>
        $(document).ready(function () {
            $('#datetimepicker').datetimepicker({
                timepicker:false,
                format:'Y-m-d',
                formatDate:'Y-m-d',
            });
        })
    </script>