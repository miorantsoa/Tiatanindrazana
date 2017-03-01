<?php
/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 25/02/2017
 * Time: 23:52
 */
class Articles extends CI_Controller{
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
        $this->load->library('articlelibrarie');
        $this->articlelibrarie->ajoutArticle($this->input->post('journal'),$this->input->post('rubrique'),null, $this->input->post('titre'), $this->input->post('date') ,$this->input->post('resume'), $this->input->post('resume'), $this->input->post('contenu'),false,$this->input->post('niveau'),$image,true);
        redirect('admin/articles','refresh');
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
        $this->load->library('articlelibrarie');
        //$idarticle,$idJournal, $idCategorie, $titre,$date, $extrait, $resume, $contenu, $laune, $niveau, $chemin_une,$date,$etat
        $this->articlelibrarie->updateArticle($this->input->post('article'),$this->input->post('journal'),$this->input->post('rubrique'), $this->input->post('titre'), $this->input->post('date') ,$this->input->post('resume'), $this->input->post('resume'), $this->input->post('contenu'),false,$this->input->post('niveau'),$image,true);
        redirect('admin/articles');
    }
    public function deleteArticle($id){
        $this->load->model('articlesmodel');
        $this->articlesmodel->deleteArticle($id);
        redirect('admin/articles');
    }
}