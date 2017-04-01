<?php
/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 13/03/2017
 * Time: 11:16 wawa
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
    public function user_uptdate(){
        $config = $this->configUpload();
        $config = $this->configUpload();
        $this->load->library('upload', $config);
        $image = null;
        $this->load->modele('abonneemodele');
        $iduser = $this->input->post('iduser');
        $data = array(
            'civilte' => $this->input->get('civilite'),
            'nom' => $this->input->get('nomutilisateur'),
            'prenom' => $this->input->get('prenomutilisateur'),
            'ddn' => $this->input->get('naissanceutilisateur'),
            'numcin' => $this->input->get('cin'),
            'datedelivrance' => $this->input->get('datedelivrancecin'),
            'lieudelivrance' => $this->input->get('lieudelivrancecin'),
            'lienrecto' => $this->input->get('lienimagerectocin'),
            'lienverso' => $this->input->get('lienimageversocin'),
            'email' => $this->input->get('emailutilisateur'),
            'identifiant' => $this->input->get('identifiant'),
            'pdp' => $this->input->get('lienimagepdp')
        );
        $this->db->where('user_id', $iduser);

    }
/**    public function update(){
        $config = $this->configUpload();
        $config = $this->configUpload();
        $this->load->library('upload', $config);
        $image = null;
        if (!$this->upload->do_upload('couverture')) {
            $error = array('error' => $this->upload->display_errors());
        }
        else {
            $data = array('upload_data' => $this->upload->data());
            $image = 'upload/couverture/'. $data['upload_data']['file_name'];
        }
        $this->load->library('journallibrary');
        $this->journallibrary->updateJournal($this->input->post('idjournal'),$this->input->post('numjournal'),$image,$this->input->post('dateParution'));
        redirect('admin/journal');
    }
**/
    public function updatepassword(){
        $iduser = $this->input->get('iduser');
        $password = $this->input->get('newmdp');
        $this->load->model('abonneemodel');
        $this->abonneemodel->updatepassword($iduser,$password);
    }
}