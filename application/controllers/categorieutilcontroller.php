<?php

/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 19/06/2017
 * Time: 14:41
 */
class categorieutilcontroller extends CI_Controller
{
    public function addcategorie(){
        $this->load->model('categorieutilmodel');
        //`idsondage`, `reponse`, `datepublication`

              var_dump($this->input->post('categorie'));
             var_dump($this->input->post('niveau'));
        $this->categorieutilmodel->insert($this->input->post('categorie'),$this->input->post('niveau'));
        redirect('page/administration/listecategorieutil','refresh');
    }
    public function update(){
        $this->load->model('categorieutilmodel');
        $data = array(
            'libelle' => $this->input->post('categorie'),
            'niveau' => $this->input->post('niveau'),
        );
        $this->categorieutilmodel->update($this->input->post('idcategorie'),$data);
        redirect('page/administration/listecategorieutil','refresh');
    }
    public function delete($id){
        $this->load->model('categorieutilmodel');
        $this->categorieutilmodel->delete($id);
        redirect('page/administration/listecategorieutil','refresh');
    }

    public function vote(){
        $this->load->model('sondage_model');
        $this->sondage_model->vote($this->input->post('idsondage'),$this->input->post('idreponse'));
        redirect('accueil','refresh');
    }
}