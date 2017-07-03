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
        redirect('page/administration/ajoutFilActu','refresh');
    }
    public function updateFilActu(){
        $this->load->model('filactu_model');
        $data = array(
            'datepublication' => $this->input->post('datepublication'),
            'heurepublication' => $this->input->post('heurepublication'),
            'extrait' => substr($this->input->post('contenue'),0,150)."...",
            'contenue' => $this->input->post('contenue')

        );
        $this->filactu_model->update($this->input->post('idfilactu'),$data);
        redirect('page/administration/filactu','refresh');
    }
    public function delete($id){
        $this->load->model('filactu_model');
        $this->filactu_model->delete($id);
        redirect('page/administration/filactu','refresh');
    }
    public function edit_fil_actu($id){
        $this->load->model('filactu_model');
        $fil_actu = $this->filactu_model->get($id);
        if($fil_actu!=null && count($fil_actu)!=0) {
            $data['$fildactu'] =$fil_actu;
            $this->adminView('ajoutFilActu', $data);
        }
        else{
            $erreur['heading'] = "Tsy misy ny pejy notadiavinao";
            $erreur['message'] = "";
            $this->load->view('errors/html/error_404',$erreur);
        }
    }
    public function edit_etat($id){
        $this->load->model('filactu_model');
        $fil_actu = $this->filactu_model->get($id);
        if($fil_actu!=null && count($fil_actu)!=0) {
            $data['etat'] = !$fil_actu[0]->etat;
            $this->filactu_model->update($fil_actu[0]->idfilactualite,$data);
            redirect('page/administration/filactu','refresh');
        }
        else{
            $erreur['heading'] = "Tsy misy ny pejy notadiavinao";
            $erreur['message'] = "";
            $this->load->view('errors/html/error_404',$erreur);
        }
    }
}