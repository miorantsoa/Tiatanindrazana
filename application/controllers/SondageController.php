<?php

/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 19/06/2017
 * Time: 14:41
 */
class SondageController extends CI_Controller
{
    public function addSondage(){
        $this->load->model('sondage_model');
        //`idsondage`, `reponse`, `datepublication`

        var_dump($this->input->post('question'));
        var_dump($this->input->post('dateparution'));
        $this->sondage_model->insertSondage($this->input->post('question'),$this->input->post('dateparution'));
        redirect('admin/listesondage','refresh');
    }
    public function updateSondage(){
        $this->load->model('sondage_model');
        //`idsondage`, `reponse`, `datepublication`
        $datedujour = date('Y-m-d');
        var_dump($this->input->post('question'));
        var_dump($this->input->post('dateparution'));
        var_dump($this->input->post('idsondage'));
        $data = array(
            'question' => $this->input->post('question'),
            'dateparution'=> $this->input->post('dateparution')
        );
        $this->sondage_model->update($this->input->post('idsondage'),$data);
        redirect('admin/listesondage','refresh');
    }
    public function deleteSondage($id){
        $this->load->model('sondage_model');
        $this->sondage_model->delete($id);
        redirect('admin/listesondage','refresh');
    }

    public function vote(){
        $this->load->model('sondage_model');
        var_dump($this->input->post('idsondage'));
        var_dump($this->input->post('idreponse'));
        $this->sondage_model->vote($this->input->post('idsondage'),$this->input->post('idreponse'));
        redirect('accuil','refresh');
    }
}