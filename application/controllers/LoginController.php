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
            $ran = rand (1,999999);
            $temp['idsession']=$ran;
            $id = $this->session->userdata('user')[0]->idutilisateur2;
            $this->abonneemodel->updateUtilisateur($id,$temp);
            /**  $this->load->model('abonneemodel');
            $id = $this->session->userdata('user')[0]->idutilisateur2;
            $this->abonneemodel->updateUtilisateur($id,$Data);
             */
            $this->session->set_userdata('user',$data);
            redirect('Accueil/monCompte');
        }
        else {
            var_dump($data);
            redirect('Accueil/connection');
        }
    }

    public function deconnect(){
        $temp['idsession']=null;
        $id = $this->session->userdata('user')[0]->idutilisateur2;
        $this->abonneemodel->updateUtilisateur($id,$temp);
        $this->session->unset_userdata('user');
        redirect('accueil');
    }

    public function updateUser (){

}
}