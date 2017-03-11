<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 10/03/2017
 * Time: 13:13
 */
class AccueilController extends CI_Controller{
    public function homeView($view,$data = null,$titre=null){
        $this->load->view('default/templates/header.php',$titre);
        $this->load->view('default/'.$view,$data);
        $this->load->view('default/templates/footer');
    }
    public function index(){
        $data = $this->indexData();
        $titre['titre'] = "Tonga soa : Tia Tanindrazana";
        $this->homeView('accueil',$data,$titre);
    }
    //initialisation données ao @ accueil
    public function indexData(){
        $this->load->model("rubrique_model");
        $this->load->model("articlesmodel");
        $this->load->model("journal");
        $this->load->model("pubmodel");
        $data['rubrique'] = $this->rubrique_model->getFirstRang();
        $data['laune'] = $this->articlesmodel->getUne();
        $data['articlejournal'] = $this->articlesmodel->getListArticle();
        $data['ampamoaka'] = $this->articlesmodel->getLastAmpamoaka();
        $data['sarisary'] = $this->articlesmodel->getLastSarisary();
        $data['banniere'] = $this->pubmodel->getPubByPosition(1);
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
        $data['article'] = $article;
        $titre['titre'] =  $article->titre." : Tia Tanindrazana";
        $this->homeView('detail',$data,$titre);
    }
}