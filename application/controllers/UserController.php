<?php
/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 13/03/2017
 * Time: 11:16 test1
 */
class UserController extends CI_Controller
{
    public function addUser()
    {
      /**  var_dump($_FILES); */
        $config = $this->configUpload($this->input->post('nomutilisateur'),$this->input->post('prenomutilisateur'),"pdp");
        $this->load->library('upload', $config);
        $lienpdp = null;
        $lienrectocin =null;
        $lienversocin = null;
        if (!$this->upload->do_upload('lienimagepdp')) {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        }
        else {
            $data = array('upload_data' => $this->upload->data());
            $lienpdp = 'upload/infouser/' . $data['upload_data']['file_name'];
        }
        $config1 = $this->configUpload($this->input->post('nomutilisateur'),$this->input->post('prenomutilisateur'),"rectocin");
        $this->load->library('upload', $config1);
        if (!$this->upload->do_upload('lienimagerectocin')) {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        }
        else {
            $data = array('upload_data' => $this->upload->data());
            $lienrectocin = 'upload/infouser/' . $data['upload_data']['file_name'];
        }
        $config2 = $this->configUpload($this->input->post('nomutilisateur'),$this->input->post('prenomutilisateur'),"versocin");
        $this->load->library('upload', $config2);
        if (!$this->upload->do_upload('lienimageversocin')) {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        }
        else {
            $data = array('upload_data' => $this->upload->data());
            $lienversocin = 'upload/infouser/' . $data['upload_data']['file_name'];
        }

        /**INSERT INTO `abonnee`(`idabonnement`, `civilite`, `nomutilisateur`, `prenomutilisateur`, `naissanceutilisateur`, `cin`, `datedelivrancecin`, `lieudelivrancecin`, `liencin_recto`, `liencin_verso`, `emailutilisateur`, `identifiant`, `motdepasse`, `statututilisateur`, `imageprofile`) VALUES (**/
         /**    $civilite,$nom,$prenom,$datenaissance,$cin,$dateCin,$lieuCin,$rectoCin,$versoCin,$email,$identifiant,$password,$statuulisateur,$imageprofile **/
        if($this->input->post('motdepasse') == $this->input->post('motdepasseverif')) {
            $this->load->model('abonneemodel');
            $this->abonneemodel->insertUtilisateur($this->input->post('civilite'), $this->input->post('nomutilisateur'), $this->input->post('prenomutilisateur'), $this->input->post('naissanceutilisateur'), $this->input->post('cin'), $this->input->post('datedelivrancecin'), $this->input->post('lieudelivrancecin'), $lienrectocin, $lienversocin, $this->input->post('emailutilisateur'), $this->input->post('identifiant'), $this->input->post('motdepasse'), '0', $lienpdp);
            //$data=> array(//

  //          )//
            $this->load->loadview('default/templates/header',$data);
        }
        else{
            var_dump($this->input->post('motdepasse'));
        }
    }


    public function updateInfoUser(){

        if ($this->input->post('civilite')!=""){
            $Data['civilite']=$this->input->post('civilite');
        }
        if ($this->input->post('nomutilisateur')!=""){
            $Data['nomutilisateur']=$this->input->post('nomutilisateur');
        }
        if ($this->input->post('prenomutilisateur')!=""){
            $Data['prenomutilisateur']=$this->input->post('prenomutilisateur');
        }
        if ($this->input->post('naissanceutilisateur')!=""){
            $Data['naissanceutilisateur']=$this->input->post('naissanceutilisateur');
        }
        if ($this->input->post('cin')!=""){
            $Data['cin']=$this->input->post('cin');
        }
        if ($this->input->post('datedelivrancecin')!=""){
            $Data['datedelivrancecin']=$this->input->post('datedelivrancecin');
        }
        if ($this->input->post('lieudelivrancecin')!=""){
            $Data['lieudelivrancecin']=$this->input->post('lieudelivrancecin');
        }
            $config = $this->configUpload($this->input->post('nomutilisateur'),$this->input->post('prenomutilisateur'),"pdp");
            $this->load->library('upload', $config);
            $liencinrecto = "    ";
            if (!$this->upload->do_upload('liencin_recto')) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            }
            else {
                $data = array('upload_data' => $this->upload->data());
                $lien = 'upload/infouser/' . $data['upload_data']['file_name'];
            }
            if ($liencinrecto!="") {
                $Data['liencin_recto'] = $liencinrecto;
            }

            $config = $this->configUpload($this->input->post('nomutilisateur'),$this->input->post('prenomutilisateur'),"pdp");
            $this->load->library('upload', $config);
            $lienverso = "";
            if (!$this->upload->do_upload('liencin_verso')) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            }
            else {
                $data = array('upload_data' => $this->upload->data());
                $lien = 'upload/infouser/' . $data['upload_data']['file_name'];
            }
            if($lienverso!=""){
            $Data['liencin_verso']=$lien;
        }
        if ($this->input->post('emailutilisateur')!=""){
            $Data['emailutilisateur']=$this->input->post('emailutilisateur');
        }
        if ($this->input->post('identifiant')!=""){
            $Data['identifiant']=$this->input->post('identifiant');
        }

            $config = $this->configUpload($this->input->post('nomutilisateur'),$this->input->post('prenomutilisateur'),"pdp");
            $this->load->library('upload', $config);
            $lienprofile = "";
            if (!$this->upload->do_upload('imageprofile')) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            }
            else {
                $data = array('upload_data' => $this->upload->data());
                $lien = 'upload/infouser/' . $data['upload_data']['file_name'];
            }
            if($lienprofile!=""){
            $Data['imageprofile']=$lien;
        }
        $this->load->model('abonneemodel');
        $id = $this->session->userdata('user')[0]->idutilisateur2;
        $this->abonneemodel->updateUtilisateur($id,$Data);
        $temp = $this->abonneemodel->getAbonneeById($id);
        $this->session->set_userdata('user',$temp);
        redirect('Accueil/monCompte');

    }

    public function configUpload($nomutilisateur,$prenomutilisateur,$detail)
    {
        $config['upload_path'] = './upload/infouser/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 8000;
        $config['max_width'] = 2024;
        $config['max_height'] = 1768;
        $config['file_name'] = $nomutilisateur .'-'. $prenomutilisateur .'-'. $detail;
        return $config;
    }
}