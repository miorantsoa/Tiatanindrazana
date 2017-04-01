<?php
/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 27/03/2017
 * Time: 11:51
 */
class LoginController extends CI_Controller {
    public function connect(){
        $username = $this->input->get('email');
        $pass = $this->input->get('password');
        $this->load->model('abonneemodel');
        $data = $this->abonneemodel->connectUser($username,$pass);
        if($data){
            $this->session->set_userdata('user',$data);
            if($_POST['url']){
                echo $_POST['url'];
            }
            else
                echo $this->session->userdata['last_page'];
        }
        else{
            echo "Tsizy";
        }
    }
    function isIdInReact($idSujet){
        $sess_user = $this->session->userdata('user');
        $dballreact = $this->post->getAllUserReaction($sess_user['user_id']->IDUTILISATEUR);
        for($i = 0; $i<count($dballreact);$i++){
            if($idSujet == $dballreact[$i]->IDSUJET){
                return true;
            }
        }
        return false;
    }
    public function deconnect(){
        $this->session->unset_userdata('user');
        redirect($_GET['url']);
    }
}