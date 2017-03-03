<?php
/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 02/03/2017
 * Time: 20:17
 */

class FilActuController extends CI_Controller{
    public function addFilActu(){
        $this->load->model('FilActu_model');
        $data = array(
            'datepublication' => $this->input->get('datepublication'),
            'heurepublication' => $this->input->get('heurepublication'),
            'extrait' => $this->input->get('extrait'),
            'contenue' => $this->input->get('contenue')

        );
        $this->rubrique_model->insertFilActu($data);
        redirect('admin/ajoutFilActu','refresh');
    }
}