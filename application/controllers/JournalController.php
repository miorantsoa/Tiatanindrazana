<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 01/03/2017
 * Time: 14:51
 */
class JournalController extends CI_Controller {
    public function ajoutJournal(){
        $config = $this->configUpload();
        $this->load->library('upload', $config);
        $image = null;
        if (!$this->upload->do_upload('couverture')) {
            $error = array('error' => $this->upload->display_errors());
        }
        else {
            $data = array('upload_data' => $this->upload->data());
            $image = 'upload/couverture/'. $data['upload_data']['file_name'];
        }
        $this->load->model('journal');
        $this->journal->insertJournal($this->input->post('numjournal'),$image,$this->input->post('dateParution'));
        redirect('admin/journal');
    }
    public function ajoutAjax(){
        $config = $this->configUpload();
        $this->load->library('upload', $config);
        $image = null;
        if (!$this->upload->do_upload('couverture')) {
            $error = array('error' => $this->upload->display_errors());
        }
        else {
            $data = array('upload_data' => $this->upload->data());
            $image = 'upload/couverture/'. $data['upload_data']['file_name'];
        }
        $this->load->model('journal');
        $this->journal->insertJournal($this->input->post('numjournal'),$image,$this->input->post('dateParution'));
        echo "success";
    }
    public function delete($id){
        $this->load->model('journal');
        $this->journal->deleteJournal($id);
        redirect('admin/journal');
    }
    public function update(){
        $config = $this->configUpload();
        $this->load->library('upload', $config);
        $image = null;
        if (!$this->upload->do_upload('couverture')) {
            $error = array('error' => $this->upload->display_errors());
        }
        else {
            $data = array('upload_data' => $this->upload->data());
            $image = 'upload/couverture/'. $data['upload_data']['file_name'];
        }
        $this->load->library('journallibrary');
        $this->journallibrary->updateJournal($this->input->post('idjournal'),$this->input->post('numjournal'),$image,$this->input->post('dateParution'));
        redirect('admin/journal');
    }

    public function configUpload(){
        $config['upload_path']   = './upload/couverture';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 8000;
        $config['max_width']     = 2024;
        $config['max_height']    = 1768;
        $config['file_name'] = "couverture-".date('y-m-d').'-'.time('');
        return $config;
    }
    /*Feuille journal*/
    public function addFeuille(){
        $this->load->library('globalfunction');
        $this->load->model('feuillejournalmodel');
        $file_name = array();
        if(isset($_FILES['files']) && $_FILES['files']['name']!=null) {
            $idfeuille_journal = $this->feuillejournalmodel->insert($this->input->post('date_parution'));
            for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
                $_FILES['file' . $i]['name'] = $_FILES['files']['name'][$i];
                $_FILES['file' . $i]['type'] = $_FILES['files']['type'][$i];
                $_FILES['file' . $i]['tmp_name'] = $_FILES['files']['tmp_name'][$i];
                $_FILES['file' . $i]['error'] = $_FILES['files']['error'][$i];
                $_FILES['file' . $i]['size'] = $_FILES['files']['size'][$i];
                $name = $this->globalfunction->uploadImage('file' . $i, 'upload/journal', ($i + 1) . '-feuille-'.$this->input->post('date_parution'));
                $file_name[] = $name['path'];
                //$type,$nommedia,$cheminmedia,$creditmedia,$alt
                $id = $this->feuillejournalmodel->insertMedias($_FILES['file' . $i]['type'], $name['name'], $name['path'], "", "Illustration feuille journal page" . ($i + 1));
                $this->feuillejournalmodel->insertAssoc($idfeuille_journal,$id);
            }
        }
        else{
            $data['message'] = "Une erreur est survenu pendant l'upload";
        }
        redirect('admin/ajoutFeuilleJournal');
    }
    /*Feuille journal*/
}