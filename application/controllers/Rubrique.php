<?php
/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 28/02/2017
 * Time: 10:14
 */
class Rubrique extends  CI_Controller{
    public function addRubrique(){
        $this->load->model('rubrique_model');
        $data = array(
            'libelle' => $this->input->get('rubrique'),
            'rubrique_mere' => $this->input->get('rubrique-mere'),
            'niveau'=> $this->input->get('niveau')
        );
        $this->rubrique_model->insertRubrique($data);
        redirect('page/administration/rubrique','refresh');
    }

    public function uptdaterubrique (){
        $this->load->model('rubrique_model');
        $data = array(
            'libelle' => $this->input->get('rubrique'),
            'rubrique_mere' => $this->input->get('rubrique-mere'),
            'niveau'=> $this->input->get('niveau')
        );
        $this->rubrique_model->update($this->input->get('idrub'),$data);
        redirect('admin/rubrique','refresh');
    }
    public function delete($id){
        $this->load->model('rubrique_model');
        $this->rubrique_model->delete($id);
        redirect('page/administration/rubrique','refresh');
    }
}