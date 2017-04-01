<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	public function adminView($view,$data = null){
		$this->load->view('admin/header');
		$this->load->view('admin/'.$view,$data);
		$this->load->view('admin/footer');
	}
	public function index(){
		$this->adminView('index');
	}
	public function articles(){
	    $this->load->model('articlesmodel');
	    $data['articles'] = $this->articlesmodel->getArticles();
		$this->adminView('articles', $data);
	}	
	public function ajoutArticles(){
        $this->load->model('rubrique_model');
        $data['rubrique'] = $this->rubrique_model->getrubrique();
		$this->adminView('ajoutArticles',$data);
	}
	public function rubrique(){
        $this->load->model('rubrique_model');
        $data['rubrique'] = $this->rubrique_model->getrubrique();
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
        $this->adminView('abonne');
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
        $data['infos'] = $this->infoutilemodel->get();
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
        $data['filactualite'] = $this->filactu_model->getFilActu();
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
    /*Feuille journal*/

}
