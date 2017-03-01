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
		$this->adminView('journal');
	}	
	public function detailJournal(){
		$this->adminView('detailJournal');
	}	
	public function ajoutFilActu(){
		$this->adminView('ajoutFilActu');
	}		
}
