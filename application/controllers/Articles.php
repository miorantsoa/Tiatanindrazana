<?php
/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 25/02/2017
 * Time: 23:52
 */
class Articles extends CI_Controller{
    public  function __construct(){
        parent::__construct();
        $this->load->library('articlelibrarie');
        $this->load->library('journallibrary');
        $this->load->model('journal');
        $this->load->model('articlesmodel');
        $this->load->model('rubrique_model');
    }

    public function addArticle(){
        $config = $this->configUpload();
        $this->load->library('upload', $config);
        $image = null;
        if (!$this->upload->do_upload('img-une')) {
            $error = array('error' => $this->upload->display_errors());
        }
        else {
            $data = array('upload_data' => $this->upload->data());
            $image = 'upload/'. $data['upload_data']['file_name'];
        }
        if(!$this->input->post('rubrique')){
            $message['erreur'] = "Le rubrique ne peut pas être null";
        }
        if(!$this->input->post('titre')){
            $message['erreur'] = "Veuillez ajouter un titre";
        }
        $date = $this->input->post('date');
        if(!$date){
            $date = date('Y-m-d');
        }
        $journal = $this->journal->getJournalByDate($date);
        if(count($journal)==0){
            //$this->session->set_flashdata('erreur',"Veuillez créer un journal");
            $journal = "";
        }
        else{
            $journal = $journal[0]->idjournal;
        }
        $laune = $this->input->post('laune');
        if($laune == 1){
            $une = $this->articlesmodel->getArticlesByJournal($journal,true);
            if(count($une)!=0) {
                $this->articlelibrarie->updateArticle($une[0]->idarticle, null, null, null, null, null, null, null, false, null, null, null);
            }
            $laune = true;
        }
        else{ $laune = false;}
        $id = $this->articlelibrarie->ajoutArticle($journal,$this->input->post('rubrique'), $this->input->post('titre'),$date ,$this->input->post('resume'), $this->input->post('resume'), $this->input->post('contenu'),$laune,$this->input->post('niveau'),$image,true);
        $rubrique = $this->rubrique_model->getRubriqueById($this->input->post('rubrique'));
        add_url_tag_article($rubrique[0]->libelle,$this->input->post('titre'),$date,$id);

        redirect('page/administration/articles','refresh');
    }
    public function isNewJournal($date){
        if($this->journallibrary->isnewJournal($date)){
            echo "success";
        }
        else{
            echo "false";
        }
    }
    public function configUpload(){
        $config['upload_path']   = './upload/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 8000;
        $config['max_width']     = 2024;
        $config['max_height']    = 1768;
        $config['file_name'] = date('y-m-d').'-'.time('');
        return $config;
    }

    public function updateArticle(){
        $config = $this->configUpload();
        $this->load->library('upload', $config);
        $image = null;
        if (!$this->upload->do_upload('img-une')) {
            $error = array('error' => $this->upload->display_errors());
        }
        else {
            $data = array('upload_data' => $this->upload->data());
            $image = 'upload/'. $data['upload_data']['file_name'];
        }
        //$idarticle,$idJournal, $idCategorie, $titre,$date, $extrait, $resume, $contenu, $laune, $niveau, $chemin_une,$date,$etat
        $this->articlelibrarie->updateArticle($this->input->post('article'),$this->input->post('journal'),$this->input->post('rubrique'), $this->input->post('titre'), $this->input->post('date') ,$this->input->post('resume'), $this->input->post('resume'), $this->input->post('contenu'),$this->input->post('laune'),$this->input->post('niveau'),$image,true);
        redirect('page/administration/articles');
    }
    public function deleteArticle($id){
        $this->articlesmodel->deleteArticle($id);
        redirect('page/administration/articles');
    }
    public function editEtatPublication($id){
        //$idarticle,$idJournal, $idCategorie, $titre,$date, $extrait, $resume, $contenu, $laune, $niveau, $chemin_une,$etat
        $article = $this->articlesmodel->getById($id,false);
        if(count($article)!=0) {
            $article = $article[0];
            $this->articlelibrarie->updateArticle($article->idarticle, null, null, null, null, null, null, null, null, null, null, !$article->etatpublication);
            redirect('page/administration/articles');
        }
        else{
            $erreur['heading'] = "Tsy misy ny pejy notadiavinao";
            $erreur['message'] = "";
            $this->load->view('errors/html/error_404',$erreur);
        }
    }
}