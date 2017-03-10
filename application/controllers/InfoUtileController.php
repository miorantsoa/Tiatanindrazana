<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 06/03/2017
 * Time: 21:25
 */
class InfoUtileController extends CI_Controller {
    public function configUpload(){
        $config['upload_path']   = './upload/info_utile';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 8000;
        $config['max_width']     = 2024;
        $config['max_height']    = 1768;
        $config['file_name'] = date('y-m-d').'-'.time('');
        return $config;
    }
    public function addInfoUtile(){
        $config = $this->configUpload();
        $this->load->library('upload',$config);
        $photo = null;
        var_dump($_POST);
        if (!$this->upload->do_upload('photo')) {
            $error = array('error' => $this->upload->display_errors());
        }
        else {
            $data = array('upload_data' => $this->upload->data());
            $photo = 'upload/info_utile/'. $data['upload_data']['file_name'];
        }
        $this->load->model('infoutilemodel');
        $data = null;
        if(trim($this->input->post('titre')) ==="")
            $error = array('error' => "Entrer un titre valide");

        if($this->input->post('categorie') ==="")
            $error = array('error' => "Veuillez choisie une catégorie");
        if(trim($this->input->post('contenu'))==="")
            $error = array('error' => "Entrer un contenu valide");

        $data['titre'] = $this->input->post('titre');
        $data['contenu'] = $this->input->post('contenu');
        $data['idcatbeinfo'] = $this->input->post('categorie');
        $data['lienphoto'] = $photo;
        $data['copyrightphoto'] = $this->input->post('copyrightphoto');
        $data['lien'] = $this->input->post('lien');
        $this->infoutilemodel->insert($data);
        redirect('admin/ajoutInfoUtile');
    }
    public function updateInfoUtile(){

    }
}