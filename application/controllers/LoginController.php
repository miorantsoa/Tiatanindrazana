<?php
/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 27/03/2017
 * Time: 11:51
 */
class LoginController extends CI_Controller {
    public function connect(){
        $username = $this->input->post('email');
        $pass = $this->input->post('password');
        $this->load->model('abonneemodel');
        $data = $this->abonneemodel->connectUser($username,$pass);
        var_dump($data);
        if(count($data)!=0){
            /** updateUtilisateur */
            $temp = rand (1,999999);
            $this->session->set_userdata('user',$data);
            redirect('Accueil/monCompte');
        }
        else {
            var_dump($data);
            redirect('Accueil/connection');
        }
    }

    public function deconnect(){
        $this->session->unset_userdata('user');
        redirect('accueil');
    }

    public function updateUser (){

}
}