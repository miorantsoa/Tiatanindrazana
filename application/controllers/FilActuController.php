<?php
/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 02/03/2017
 * Time: 20:17
 */

class FilActuController extends CI_Controller{
    public function addFilActu(){
        $this->load->model('filactu_model');
        $data = array(
            'datepublication' => $this->input->post('datepublication'),
            'heurepublication' => $this->input->post('heurepublication'),
            'extrait' => substr($this->input->post('contenue'),0,150)."...",
            'contenue' => $this->input->post('contenue')

        );
        $this->filactu_model->insertFilActu($data);
        redirect('admin/ajoutFilActu','refresh');
    }
}