<?php
/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 13/03/2017
 * Time: 11:16
 */
class UserController extends CI_Controller
{
    public function addUser()
    {
        var_dump($_FILES);
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
        $this->load->model('abonneemodel');
        $this->abonneemodel->insertUtilisateur($this->input->post('civilite'), $this->input->post('nomutilisateur'), $this->input->post('prenomutilisateur'), $this->input->post('naissanceutilisateur'),$this->input->post('cin'),$this->input->post('datedelivrancecin'),$this->input->post('lieudelivrancecin'),$lienrectocin,$lienversocin, $this->input->post('emailutilisateur'),$this->input->post('identifiant'),$this->input->post('motdepasse'),'0',$lienpdp);
     //   redirect('/', 'refresh');
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