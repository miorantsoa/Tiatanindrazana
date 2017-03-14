<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 10/03/2017
 * Time: 13:13
 */
class Accueil extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("rubrique_model");
        $this->load->model("articlesmodel");
        $this->load->model("journal");
        $this->load->model("pubmodel");
        $this->load->library("articlelibrarie");
        $this->load->model("filactu_model");
    }

    public function homeView($view,$data = null,$titre=null){
        $this->load->view('default/templates/header.php',$titre);
        $this->load->view('default/'.$view,$data);
        $this->load->view('default/templates/sidebar.php',$data);
        $this->load->view('default/templates/footer');
    }
    public function index(){
        $data = $this->indexData();
        $data['titre'] = "Tonga soa : Tia Tanindrazana";
        $data['fil_actu'] = $this->filactu_model->getFilActu();
        $this->homeView('accueil',$data,$data);
    }
    //initialisation données ao @ accueil
    public function indexData(){
        $data['rubriques'] = $this->rubrique_model->getFirstRang();
        $data['laune'] = $this->articlesmodel->getUne()[0];
        $data['articlejournal'] = $this->articlesmodel->getListArticle();
        $data['ampamoaka'] = $this->articlesmodel->getLastAmpamoaka()[0];
        $data['sarisary'] = $this->articlesmodel->getLastSarisary()[0];
        $data['banniere'] = $this->pubmodel->getPubByPosition(1)[0];
        $data['pub'] = $this->pubmodel->getPubByPosition(2);
        $data['active'] = "";
        return $data;
    }
    public function detailArticle($id){
        $this->load->model('articlesmodel');
        $niveau_user = 1;
        //verifier session utilisateur
        $article = $this->articlesmodel->getById($id)[0];
        if(!$this->session->userdata('user') && $article->niveau != 1){
            $data = $this->indexData();
            $data['titre'] = "Tonga soa : Tia Tanindrazana";
            $data['error'] = "erreur";
            $this->homeView('accueil',$data,$data,$data);
        }
        else{
            $data = $this->indexData();
            $data['article_lie'] = $this->articlesmodel->getByRubrique($article->idcategorie);
            $data['article'] = $article;
            $data['titre'] =  $article->titre." : Tia Tanindrazana";
            $this->homeView('detail',$data,$data);
        }
        
    }
    public function detail_categorie($id,$page = 1,$nbreponse = 10){
        $data = $this->indexData();
        $articles =  $this->articlesmodel->getByRubrique($id);
        $rubrique =$this->rubrique_model->getRubriqueById($id)[0];
        //$titre,$rubrique,$contenu,$resume,$date1,$date2,$laune,$limit,$maxlimit
        $resultats = $this->articlesmodel->get(null,$rubrique->libelle,null,null,null,null,null,$nbreponse,$page);
        $data['categorie']= $rubrique;
        $data['article_lie'] = $articles;
        $data['active'] = $rubrique->libelle;
        $data['titre'] =  $rubrique->libelle." : Tia Tanindrazana";
        $data['nbreponse'] = $nbreponse;
        $data['page'] = $page;
        $this->homeView('detailcategorie',$data,$data);
    }
    public function list_sarisary($id){
        $data = $this->indexData();
        $sarisary =  $this->articlesmodel->getByRubrique($id);
        $rubrique =$this->rubrique_model->getRubriqueById($id)[0];
        $sous_rubrique = $this->rubrique_model->getSousCategorieByIdMere(10);
        $data['categorie']= $rubrique;
        $data['sarisary'] = $sarisary;
        $data['sous_rubrique'] = $sous_rubrique;
        $data['titre'] =  $rubrique->libelle." : Tia Tanindrazana";
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/detailsarisary',$data);
        $this->load->view('default/templates/footer');
    }
    public function contact(){
        $data = $this->indexData();
        $data['titre'] = "Hitafa aminay : Tia Tanindrazana";
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/contact',$data);
        $this->load->view('default/templates/footer');
    }
    public function recherche_simple($query = null,$limit = 0,$offset = 1, $page= 1){
        if($this->input->post('search'))
            $query = $this->input->post('search');
        if($query!=null)
            $query =$query;
        $data = $this->indexData();
        //$titre,$rubrique,$contenu,$resume,$date1,$date2,$laune,$limit,$maxlimit
        $all = $this->articlesmodel->get($query,null,$query,$query,null,null,null,null,null);
        $resultats = $this->articlesmodel->get($query,null,$query,$query,null,null,null,$limit,$offset);
        $data['articles'] = $resultats;
        $data['all'] =  $all;
        $data['recherche'] = $query;
        $data['titre'] = "Valin'ny fikarohana : ".$query." :Tiatanindrazana";
        $data['nbreponse'] = $offset;
        $data['page'] = $page;
        $this->homeView('resultat_recherche',$data,$data);
    }
    public function inscription(){
        $data = $this->indexData();
        $data['titre'] = "Inscription : Tia Tanindrazana";
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/inscription',$data);
        $this->load->view('default/templates/footer');
    }
}