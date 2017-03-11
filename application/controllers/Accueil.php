<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 10/03/2017
 * Time: 13:13
 */
class Accueil extends CI_Controller{
    public function homeView($view,$data = null,$titre=null){
        $this->load->view('default/templates/header.php',$titre);
        $this->load->view('default/'.$view,$data);
        $this->load->view('default/templates/sidebar.php',$data);
        $this->load->view('default/templates/footer');
    }
    public function index(){
        $data = $this->indexData();
        $data['titre'] = "Tonga soa : Tia Tanindrazana";
        $this->homeView('accueil',$data,$data);
    }
    //initialisation données ao @ accueil
    public function indexData(){
        $this->load->model("rubrique_model");
        $this->load->model("articlesmodel");
        $this->load->model("journal");
        $this->load->model("pubmodel");
        $data['rubriques'] = $this->rubrique_model->getFirstRang();
        $data['laune'] = $this->articlesmodel->getUne()[0];
        $data['articlejournal'] = $this->articlesmodel->getListArticle();
        $data['ampamoaka'] = $this->articlesmodel->getLastAmpamoaka();
        $data['sarisary'] = $this->articlesmodel->getLastSarisary();
        $data['banniere'] = $this->pubmodel->getPubByPosition(1)[0];
        $data['pub'] = $this->pubmodel->getPubByPosition(2);
        return $data;
    }
    public function detailArticle($id){
        $this->load->model('articlesmodel');
        $niveau_user = 1;
        //verifier session utilisateur
        $article = $this->articlesmodel->getById($id)[0];
        if($article->niveau > $niveau_user){
            $data = $this->indexData();
            $titre['titre'] = "Tonga soa : Tia Tanindrazana";
            $data['error'] = "Vous n'avez pas accées à cet article";
            $this->homeView('accueil',$data,$titre);
        }
        $data = $this->indexData();
        $data['article_lie'] = $this->articlesmodel->getByRubrique($article->idcategorie);
        $data['article'] = $article;
        $data['titre'] =  $article->titre." : Tia Tanindrazana";
        $this->homeView('detail',$data,$data);
    }
    public function detail_categorie($id){
        $data = $this->indexData();
        $articles =  $this->articlesmodel->getByRubrique($id);
        $rubrique =$this->rubrique_model->getRubriqueById($id)[0];
        $data['categorie']= $rubrique;
        $data['article_lie'] = $articles;
        $data['titre'] =  $rubrique->libelle." : Tia Tanindrazana";
        $this->homeView('detailcategorie',$data,$data);
    }
}