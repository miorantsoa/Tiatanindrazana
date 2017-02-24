<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	public function adminView($view){
		$this->load->view('admin/header');
		$this->load->view('admin/'.$view);
		$this->load->view('admin/footer');
	}
	public function index(){
		$this->adminView('index');	
	}
	public function articles(){
		$this->adminView('articles');
	}	
	public function ajoutArticles(){
		$this->adminView('ajoutArticles');
	}
	public function rubrique(){
		$this->adminView('rubrique');
	}
	public function ajoutRubrique(){
		$this->adminView('ajouterRubrique');
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
