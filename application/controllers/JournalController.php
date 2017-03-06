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
    public function delete($id){
        $this->load->model('journal');
        $this->journal->deleteJournal($id);
    }
    public function update(){
        $config = $this->configUpload();
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
}