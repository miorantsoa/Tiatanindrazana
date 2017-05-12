<?php
/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 13/03/2017
 * Time: 11:16 test1
 */
class UserController extends CI_Controller
{
    public function __construct(){
//        __construct($public_key, $private_key, $client_id, $client_secret)
        parent::__construct();
        $cle_prive = "ac29335c23478e8c8655f0bc753c7df68147f47d831d90841b";
        $cle_public = "3e8b86fb9b5bf31aa6d7faabfeaea653a7eb617a2b11ba672f";
        $CLIEN_ID = "103_4ey89fdgnz40ckwcg0oock4ckc8wwgg0co0kogs808kg40c8kg";
        $CLIENT_SECRET = "53djd2ozp5og0oc8gk4888so444gcckkokg8wo0wssk4kw0w0g";
        $params = array("public_key"=>$cle_public, "private_key"=>$cle_prive, "client_id"=>$CLIEN_ID, "client_secret"=>$CLIENT_SECRET);
        $this->load->library('paiement',$params);
    }

    public function addUser()    {
      /**  var_dump($_FILES); */
        $config = $this->configUpload($this->input->post('nomutilisateur'),$this->input->post('prenomutilisateur'),"pdp");
        $this->load->library('upload', $config);
        $lienpdp = null;
        $lienrectocin =null;
        $lienversocin = null;
        $nom = $this->input->post('nomutilisateur');
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

        $idnewuser = "0";
        /**INSERT INTO `abonnee`(`idabonnement`, `civilite`, `nomutilisateur`, `prenomutilisateur`, `naissanceutilisateur`, `cin`, `datedelivrancecin`, `lieudelivrancecin`, `liencin_recto`, `liencin_verso`, `emailutilisateur`, `identifiant`, `motdepasse`, `statututilisateur`, `imageprofile`) VALUES (**/
         /**    $civilite,$nom,$prenom,$datenaissance,$cin,$dateCin,$lieuCin,$rectoCin,$versoCin,$email,$identifiant,$password,$statuulisateur,$imageprofile **/
        if($this->input->post('motdepasse') == $this->input->post('motdepasseverif')) {
            $this->load->model('abonneemodel');
            $idnewuser = $this->abonneemodel->insertUtilisateur($this->input->post('civilite'), $nom, $this->input->post('prenomutilisateur'), $this->input->post('naissanceutilisateur'), $this->input->post('cin'), $this->input->post('datedelivrancecin'), $this->input->post('lieudelivrancecin'), $lienrectocin, $lienversocin, $this->input->post('emailutilisateur'), $this->input->post('identifiant'), $this->input->post('motdepasse'), '0', $lienpdp);

            $today = Date('Y-m-d');
            $moisabonnement = $this->input->post('tarifabonnement');
            $jourabonnement = $moisabonnement * 30;
            $finabonnement = new DateTime($today .'+'.$jourabonnement.' day');
            $temp = $finabonnement->format('Y-m-d');
            $this->abonneemodel->insertAssocitationAbonnement($this->input->post('typeabonnement'), $idnewuser, $today, $temp);
            $date2['statututilisateur'] = 1;
            $this->abonneemodel->updateUtilisateur($idnewuser,$date2);
//            redirect('Accueil/Connection');
            $ip = $this->input->ip_address();
//            $this->paiement->initPaie(1,10,$nom,"Inscription ".$this->input->post('typeabonnement')." Titan",$ip);
            redirect('accueil/Connection');
        }
        else{
            var_dump($this->input->post('motdepasse'));
        }
    }


    public function activerCompte($idUtilisateur){
        $data['statututilisateur'] = 1;
        $this->abonneemodel->updateUtilisateur($idUtilisateur,$data);
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
            $liencinrecto = null;
            if (!$this->upload->do_upload('liencin_recto')) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            }
            else {
                $data = array('upload_data' => $this->upload->data());
                $liencinrecto = 'upload/infouser/' . $data['upload_data']['file_name'];
            }
            if ($liencinrecto!=null) {
                $Data['liencin_recto'] = $liencinrecto;
            }

            $config = $this->configUpload($this->input->post('nomutilisateur'),$this->input->post('prenomutilisateur'),"pdp");
            $this->load->library('upload', $config);
            $lienverso = null;
            if (!$this->upload->do_upload('liencin_verso')) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            }
            else {
                $data = array('upload_data' => $this->upload->data());
                $lienverso = 'upload/infouser/' . $data['upload_data']['file_name'];
            }
            if($lienverso!=null){
            $Data['liencin_verso']=$lienverso;
        }
        if ($this->input->post('emailutilisateur')!=""){
            $Data['emailutilisateur']=$this->input->post('emailutilisateur');
        }
        if ($this->input->post('identifiant')!=""){
            $Data['identifiant']=$this->input->post('identifiant');
        }

            $config = $this->configUpload($this->input->post('nomutilisateur'),$this->input->post('prenomutilisateur'),"pdp");
            $this->load->library('upload', $config);
            $lienprofile = null;
            if (!$this->upload->do_upload('imageprofile')) {
                $error = array('error' => $this->upload->display_errors());
                var_dump($error);
            }
            else {
                $data = array('upload_data' => $this->upload->data());
                $lienprofile = 'upload/infouser/' . $data['upload_data']['file_name'];
            }
            if($lienprofile!=null){
            $Data['imageprofile']=$lienprofile;
        }
        $this->load->model('abonneemodel');
        $id = $this->session->userdata('user')[0]->idutilisateur2;
        $this->abonneemodel->updateUtilisateur($id,$Data);
        $temp = $this->abonneemodel->getAbonneeAbonnementById($id);
        $this->session->set_userdata('user',$temp);
        redirect('Accueil/monCompte');

    }

    public function modifiermotdepasse(){
        $Data = array(
          'motdepasse'=>  $this->input->post('motdepasse')
        );
        $id = $this->session->userdata('user')[0]->idutilisateur2;
        $this->load->model('abonneemodel');
        $this->abonneemodel->updateUtilisateur($id,$Data);
        redirect('accueil/monCompte');
    }

    public function configUpload($nomutilisateur,$prenomutilisateur,$detail)    {
        $config['upload_path'] = './upload/infouser/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 8000;
        $config['max_width'] = 2024;
        $config['max_height'] = 1768;
        $config['file_name'] = $nomutilisateur .'-'. $prenomutilisateur .'-'. $detail;
        return $config;
    }

    /*public function addfavoris($idarticle){
        if($this->session->userdata('user')) {
            $iduser = $this->session->userdata('user')[0]->idutilisateur2;
            $this->load->model('abonneemodel');
            $this->abonneemodel->addFavoris($iduser,$idarticle);
            redirect('accueil/monCompte');
        }
    }*/
}