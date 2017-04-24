<?php
/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 27/03/2017
 * Time: 11:51
 */
class LoginController extends CI_Controller {
    public function connect(){
        $email = $this->input->post('email');
        $pass = $this->input->post('password');
        $this->load->model('abonneemodel');
        $data = $this->abonneemodel->connectUser($email,$pass);
        if(count($data)!=0){
            /** updateUtilisateur */
            $ran = rand (1,999999);
            $temp['idsession']=$ran;
            $this->session->set_userdata('user',$data);
            $id = $this->session->userdata('user')[0]->idutilisateur2;
            $this->abonneemodel->updateUtilisateur($id,$temp);

            redirect('Accueil/monCompte');
        }
        else {
            var_dump($data);
            redirect('Accueil/connection');
        }
    }

    public function connect_admin(){
        $user_name = $this->input->post('username');
        $pass = $this->input->post('password');
        $this->load->model('abonneemodel');
        $data = $this->abonneemodel->connect_admin($user_name,$pass);
        if(count($data)!=0){
            $this->session->set_userdata('admin',array(
                'username'=>$data[0]->identifiant
            ));
            redirect('admin','refresh');
        }
        else{
            $this->session->set_flashdata('erreur',array(
                'message'=>"Verifier que votre mot de passe et votre identifiant correspond",
                'identifiant'=>$user_name
                ));
            redirect('admin','refresh');
        }
    }

    public function deconnect_admin(){
        $this->session->unset_userdata('admin');
        redirect('admin');
    }

    public function connectlog($email,$pass){
        $this->load->model('abonneemodel');
        $data = $this->abonneemodel->connectUser($email,$pass);
        if(count($data)!=0){
            /** updateUtilisateur */
            $ran = rand (1,999999);
            $temp['idsession']=$ran;
            $this->session->set_userdata('user',$data);
            $id = $this->session->userdata('user')[0]->idutilisateur2;
            $this->abonneemodel->updateUtilisateur($id,$temp);

            redirect('Accueil/monCompte');
        }
        else {
            var_dump($data);
            redirect('Accueil/connection');
        }
    }


    public function deconnect(){
        $temp['idsession']=NULL;
        $this->load->model('abonneemodel');
        $id = $this->session->userdata('user')[0]->idutilisateur2;
        $this->abonneemodel->updateUtilisateur($id,$temp);
        $this->session->unset_userdata('user');
        redirect('accueil');
    }

    public function updateUser (){

}
}