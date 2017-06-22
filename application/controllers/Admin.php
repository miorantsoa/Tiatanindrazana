<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
    }
	public function adminView($view,$data = null){
        if($this->session->userdata('admin')){
            $this->load->view('admin/header');
            $this->load->view('admin/'.$view,$data);
            $this->load->view('admin/footer');
        }
        else{
            $this->load->view('admin/login');
        }
	}
	public function index(){
        $this->load->model('articlesmodel');
        $this->load->model('rubrique_model');
        $this->load->model('abonneemodel');
        $this->load->model('adminmodel');
	    $data['new_user'] =count($this->abonneemodel->getInfoPayementAbonnee(null,null,null,null,null,-1));
        $data['user'] = count($this->adminmodel->getListActivation());
        $data['articles'] = count($this->articlesmodel->get2());
        $data['top_cat'] = $this->articlesmodel->getMaxCat()[0]->max;
        $data['top_cat_des'] = $this->articlesmodel->getMaxCat()[0]->libelle;
        $data['top_cat_id'] = $this->articlesmodel->getMaxCat()[0]->idcat;
		$this->adminView('index',$data);
	}

	public function login(){
	    $this->load->view('admin/login');
    }
	/*public function articles(){
        $this->load->model('rubrique_model');
        $data['rubrique'] = $this->rubrique_model->getrubrique();
        $date=$this->input->get('date');
        $titre=$this->input->get('titre');
        $rubrique=$this->input->get('rubrique');
	    $this->load->model('articlesmodel');
        $data['articles'] = $this->articlesmodel->getListArticle(true);
	    if($date!=null || $titre!=null || $rubrique!=null){
            $data['articles'] = $this->articlesmodel->get2($titre,$date,$rubrique);
        }
		$this->adminView('articles', $data);
	}*/

    public function articles($id=null,$page = 1,$limit = 0,$_titre=null,$_date=null, $_ordre = null){
        $this->load->model('articlesmodel');
        $this->load->model('rubrique_model');
        $this->load->library("articlelibrarie");
        $data['rubrique'] = $this->rubrique_model->getrubrique();
        $date=$this->input->get('date');
        $titre=$this->input->get('titre');
        $ordre = $this->input->get('ordre');
        if($_ordre){
            $ordre = $_ordre;
        }
        if($_titre!=null){
            $titre = $_titre;
        }
        if($titre == "-"){
            $titre = null;
        }
        if($_date){
            $date = $_date;
        }
        if($id ){
            $rubrique = $id;
        }
        else{
            $rubrique=$this->input->get('rubrique');
        }
        if($rubrique == '-'){
            $rubrique = null;
        }
        $articles = array();
        if($date == null && $titre == null && $rubrique == null){
            $articles = $this->articlesmodel->getListArticle(true);
            $date = $articles[0]->datepublication;
        }
        else {
            $articles = $this->articlesmodel->get2($titre, $date, $rubrique);
        }
        $per_page = 5;
        //$titre,$rubrique,$contenu,$resume,$date1,$date2,$laune,$limit,$start,$ordre='DESC',$idjournal=null
        $resultats = $this->articlesmodel->get2($titre,$date,$rubrique, $per_page, $limit, $ordre);
        $data['results'] = $resultats;
        $data['limit'] = $limit;
        //$titre,$rubrique,$contenu,$resume,$date1,$date2,$laune,$limit,$maxlimit
        $data['per_page'] = $per_page;
        $data['articles'] = $articles;
        $data['nbreponse'] = $per_page;
        $data['categorie'] = $rubrique;
        $data['page'] = $page;
        $data['filtre'] = array(
            "query" => $titre,
            "date" => $date,
            "ordre"=>$ordre
        );
        $this->adminView('articles', $data);
    }



	public function ajoutArticles(){
        $this->load->model('rubrique_model');
        $data['rubrique'] = $this->rubrique_model->getrubrique();
		$this->adminView('ajoutArticles',$data);
	}
	public function rubrique(){
        $this->load->model('rubrique_model');
        $data['rubrique'] = $this->rubrique_model->getFirstRang();
		$this->adminView('rubrique',$data);
	}
	public function ajoutRubrique(){
        $this->load->model('rubrique_model');
        $data['rubrique'] = $this->rubrique_model->getFirstRang();
		$this->adminView('ajouterRubrique',$data);
	}
	public function ajoutJournal(){
		$this->adminView('ajoutJournal');
	}
	public function journal(){
	    $this->load->model('journal');
	    $data['journals'] = $this->journal->getJournal();
		$this->adminView('journal',$data);
	}	
	public function detailJournal($id){
	    $this->load->model('articlesmodel');
	    $detail_journal = $this->articlesmodel->getAllArticleByJournal($id);
	    $data['articles'] = $detail_journal;
		$this->adminView('detailJournal',$data);
	}
    public function editUne($idArticle){
        $this->load->library('articlelibrarie');
        $id = $this->articlelibrarie->setUne($idArticle);
        redirect('admin/detailjournal/'.$id);
    }


    public function ajoutFilActu(){
		$this->adminView('ajoutFilActu');
	}

	public function abonnee(){
        $this->load->model('abonneemodel');
        $abonnees = array();
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $cin = $this->input->post('cin');
        $civilite = $this->input->post('civilite');
        $etat = -1;
//        var_dump($_REQUEST);die();
        if(count($this->abonneemodel->getInfoPayementAbonnee(null,$civilite,$nom,$prenom,$cin,$etat))!=0){
            $abonnees = $this->abonneemodel->getInfoPayementAbonnee(null,$civilite,$nom,$prenom,$cin,$etat);
        }
        $data['abonnees'] = $abonnees;
        $this->adminView('abonne',$data);
    }

    public function utilisateur_active(){
	    $admin = $this->session->userdata('admin');
        $this->load->model('adminmodel');
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $cin = $this->input->post('cin');
        $etat= $this->input->post('etat');
        $civilite = $this->input->post('civilite');
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');
        $abonnees = array();
        if(count($this->adminmodel->getListActivation(null, null, $civilite,$nom, $prenom, $cin , $date1, $date2))!=0) {
            $abonnees = $this->adminmodel->getListActivation(null, null, $civilite, $nom, $prenom, $cin, $date1, $date2);
        }
        $data['abonnees'] = $abonnees;
        $this->adminView('abonneeactive', $data);
    }

    public function utilisateur_expire(){
        $admin = $this->session->userdata('admin');
        $this->load->model('adminmodel');
        $nom = $this->input->post('nom');
        $prenom = $this->input->post('prenom');
        $cin = $this->input->post('cin');
        $etat= $this->input->post('etat');
        $civilite = $this->input->post('civilite');
        $date1 = $this->input->post('date1');
        $date2 = $this->input->post('date2');
        $abonnees = array();
        if(count($this->adminmodel->getListExpire(null, $civilite,$nom, $prenom, $cin , $date1, $date2))!=0) {
            $abonnees = $this->adminmodel->getListExpire(null, $civilite, $nom, $prenom, $cin, $date1, $date2);
        }
        $data['abonnees'] = $abonnees;
        $this->adminView('abonnementfin', $data);
    }

    public function info_abonnee($id){
        $this->load->model('abonneemodel');
        $abonnee = $this->abonneemodel->getInfoPayementAbonnee($id, null, null,  null, null, null);
        if(count($abonnee)!=0){
            $data['abonnees'] = $abonnee;
            $this->adminView('info_utilisateur',$data);
        }
//        else{
//            $abonnee = $this->abonneemodel->getAbonnementUtilisateur($id);
//            $data['abonnees'] = $abonnee;
//            $this->adminView('info_utilisateur',$data);
//        }
    }
	public function editArticle($id){
	    $this->load->model('articlesmodel');
        $this->load->model('rubrique_model');
        $data['rubrique'] = $this->rubrique_model->getrubrique();
        if($this->articlesmodel->getSingleArticle($id)!=null) {
            $data['article'] = $this->articlesmodel->getSingleArticle($id);
            $this->adminView('ajoutArticles', $data);
        }
        else{
            $erreur['heading'] = "Tsy misy ny pejy notadiavinao";
            $erreur['message'] = "";
            $this->load->view('errors/html/error_404',$erreur);
        }
    }
    public function editJournal($id){
	    $this->load->model('journal');
	    if($this->journal->getByID($id)!=null) {
            $data['journal'] = $this->journal->getById($id);
            $this->adminView('ajoutJournal', $data);
        }
        else{
            $erreur['heading'] = "Tsy misy ny pejy notadiavinao";
            $erreur['message'] = "";
            $this->load->view('errors/html/error_404',$erreur);
        }
    }


    public function  ajoutPub(){
        $this->adminView('ajoutPub');
    }

    /*info utile*/
    public function ajoutInfoUtile(){
        $this->load->model('infoutilemodel');
        $data['categorie'] = $this->infoutilemodel->getCategorie();
        $this->adminView('ajoutInfoUtile',$data);
    }
    public function infoutile(){
        $this->load->model('infoutilemodel');
        $data['rubrique'] = $this->infoutilemodel->getCategorie();
        $date=$this->input->get('date');
        $titre=$this->input->get('titre');
        $rubrique=$this->input->get('rubrique');
        if($date!=null || $titre!=null || $rubrique!=null){
            //$id=null,$titre=null,$idcategorie=null,$contenu=null,$ordre='DESC',$date1=null,$date2=null,$date = null, $publie = null
            $data['infos'] = $this->infoutilemodel->get(null,$titre,$rubrique,null,null,null,null,$date);
        }
        else{
            $data['infos'] = $this->infoutilemodel->get();
        }
        $this->adminView('infoutil',$data);
    }
    public function editInfoutile($id){
        $this->load->model('infoutilemodel');
        if($this->infoutilemodel->get($id)!=null) {
            $data['categorie'] = $this->infoutilemodel->getCategorie();
            $data['infoutiles'] = $this->infoutilemodel->get($id);
            $this->adminView('ajoutInfoUtile', $data);
        }
        else{
            $erreur['heading'] = "Tsy misy ny pejy notadiavinao";
            $erreur['message'] = "";
            $this->load->view('errors/html/error_404',$erreur);
        }
    }

    /*info util*/
    public function  filactu(){
        $this->load->model('filactu_model');
        if($this->input->get('date')){
            $data['filactualite'] = $this->filactu_model->getByDate($this->input->get('date'));
        }
        else{
            $data['filactualite'] = $this->filactu_model->getLastFilAdmin();
        }
        $this->adminView('filactu',$data);
    }

    public function publicite(){
        $this->load->model('pubmodel');
        $data['publicite'] = $this->pubmodel->getPub();
        $this->adminView('publicite', $data);
    }

    /*Feuille journal*/
    public function ajoutFeuilleJournal(){
        $this->adminView('ajoutpagejournal');
    }

    public function feuilleJournal(){
        $date = $this->input->get('date');
        $this->load->model('feuillejournalmodel');
        $feuille_journal = $this->feuillejournalmodel->getLastJournal();
        if ($date != null){
            $feuille_journal = $this->feuillejournalmodel->getDetail(null,$date);
        }
        if (count($feuille_journal) != 0) {
            $data['journals'] = $feuille_journal;
            $this->adminView('feuilleJournal', $data);
        }
    }

    public function editSingleImage($id){
        $data['id'] = $id;
        $this->adminView('editFeuille', $data);
    }
    /*Feuille journal*/

    public function addsondage(){
        $this->adminView('addsondage');
    }

    public function updateSondage($id)
    {
        $this->load->model('sondage_model');
        $data['modif'] = $this->sondage_model->get($id);
        $data['id'] = $id;
        $this->adminView('addsondage',$data);
    }
    public function listesondage(){
        $this->load->model('sondage_model');
        $data['sondage'] = $this->sondage_model->getsondagesimple();
        $this->adminView('listesondage', $data);
    }
    public function updatefilactu($id)
    {
        $this->load->model('filactu_model');
        $data['modif'] = $this->filactu_model->getFilActuById($id);
        $data['id'] = $id;
        $this->adminView('ajoutFilActu',$data);
    }
    public function addcategorieilaiko(){
        $this->adminView('addcatilaiko');
    }
    public function listecategorieutil(){
        $this->load->model('categorieutilmodel');
        $data['listecat'] = $this->categorieutilmodel->get();
        $this->adminView('listecategorieutil',$data);
    }
    //updatecateultil
    public function updatecateultil($id)
    {
        $this->load->model('categorieutilmodel');
        $data['modif'] = $this->categorieutilmodel->getcategorieinfoutileById($id);
        $data['id'] = $id;
        $this->adminView('addcatilaiko',$data);
    }
}
