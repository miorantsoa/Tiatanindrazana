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
        $datedujour = date('Y-m-d');
        $this->sondage_model->insertFilActu($this->input->post('idsondage'),$this->input->post('reponse'),$datedujour);
        redirect('admin/listesondage','refresh');
    }
    public function updateSondage(){
        $this->load->model('sondage_model');
        //`idsondage`, `reponse`, `datepublication`
        $datedujour = date('Y-m-d');
        $data = array(
            'idsondage' => $this->input->post('idsondage'),
            'reponse' => $this->input->post('reponse'),
            'datepublication'=> $this->input->post('datepublication')
        );
        $this->sondage_model->update($this->input->post('idsondage'),$data);
        redirect('admin/listesondage','refresh');
    }
    public function deleteSondage(){
        $this->load->model('sondage_model');
        $this->sondage_model->delete($this->input->post('idsondage'));
        redirect('admin/listesondage','refresh');
    }

    public function vote(){
        $this->load->model('sondage_model');
        var_dump($this->input->post('idsondage'));
        var_dump($this->input->post('idreponse'));
        $this->sondage_model->vote($this->input->post('idsondage'),$this->input->post('idreponse'));
      //  redirect();
    }
}