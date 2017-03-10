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
	    $detail_journal = $this->articlesmodel->getArticlesByJournal($id);
	    $data['articles'] = $detail_journal;
		$this->adminView('detailJournal',$data);
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
	    $data['article'] = $this->articlesmodel->getSingleArticle($id);
	    $this->adminView('ajoutArticles',$data);
    }
    public function editJournal($id){
	    $this->load->model('journal');
	    $data['journal'] = $this->journal->getById($id);
        $this->adminView('ajoutJournal',$data);
    }
    public function  ajoutPub(){
        $this->adminView('ajoutPub');
    }
    public function ajoutInfoUtile(){
        $this->load->model('infoutilemodel');
        $data['categorie'] = $this->infoutilemodel->getCategorie();
        $this->adminView('ajoutInfoUtile',$data);
    }

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

}
