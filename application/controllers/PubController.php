<?php
/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 02/03/2017
 * Time: 20:52
 */

class PubController extends CI_Controller{
    public function addPub(){
        $this->load->model('FilActu_model');
        $data = array(
            'datedebutdiffusion' => $this->input->get('datedebutdiffusion'),
            'datefindiffusion' => $this->input->get('datefindiffusion'),
            'alt' => $this->input->get('alt'),
            'lienredirection' => $this->input->get('lienredirection'),
            'lienimage' => $this->input->get('lienimage')

        );
        $this->rubrique_model->insertPub($data);
        redirect('admin/ajoutPub','refresh');
    }
}