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
       /* $cle_prive = "ac29335c23478e8c8655f0bc753c7df68147f47d831d90841b";
        $cle_public = "3e8b86fb9b5bf31aa6d7faabfeaea653a7eb617a2b11ba672f";
        $CLIEN_ID = "103_4ey89fdgnz40ckwcg0oock4ckc8wwgg0co0kogs808kg40c8kg";
        $CLIENT_SECRET = "53djd2ozp5og0oc8gk4888so444gcckkokg8wo0wssk4kw0w0g";
        $params = array("public_key"=>$cle_public, "private_key"=>$cle_prive, "client_id"=>$CLIEN_ID, "client_secret"=>$CLIENT_SECRET);
        $this->load->library('paiement',$params);*/
    }

    public function ajout(){
        try {
            $this->load->model('abonneemodel');
            $data = $this->session->userdata('info_user');
            $abonnement = $this->session->userdata('abonnement');
            $numero = $this->input->post('num');
            $operateur = $this->input->post('mobile');
            $trans_id = $this->input->post('trans_id');
            $payement['numero'] = $numero;
            $payement['trans_id'] = $trans_id;
            var_dump($data, $abonnement, $abonnement, $operateur, $numero, $trans_id);
            $this->db->trans_start();
            $iduser = $this->session->userdata('iduser');
            if ($data) {
                $iduser = $this->abonneemodel->insert($data);
                $this->abonneemodel->insertAssocitationAbonnement($abonnement['tarif'], $iduser, "", "");
            }
            $payement['idabonnee'] = $iduser;
            $this->abonneemodel->insertInfoPayement($payement);
            if (!$data) {
                $this->load->model('adminmodel');
                $abo['datedebutabonnement'] = "";
                $abo['datefinabonnement'] = "";
                $this->adminmodel->delete_from_expire($iduser);
                $this->abonneemodel->updateAssocAbonnement($iduser, $abo);
            }
            $this->db->trans_complete();
            $this->session->set_flashdata('message', 'Voaray ny fangatahanao hiditra ho mpikambana. Hahavoaray mailaka ianao rehefa voadinika sy ara-dalana tsara ny mombamomba anao.');
            redirect('accueil');
        }
        catch(Exception $exceptione){
            var_dump($exceptione);
        }
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
            $this->db->trans_start();
            $idnewuser = $this->abonneemodel->insertUtilisateur($this->input->post('civilite'), $nom, $this->input->post('prenomutilisateur'), $this->input->post('naissanceutilisateur'), $this->input->post('cin'), $this->input->post('datedelivrancecin'), $this->input->post('lieudelivrancecin'), $lienrectocin, $lienversocin, $this->input->post('emailutilisateur'), $this->input->post('identifiant'), sha1($this->input->post('motdepasse')), '0', $lienpdp);
//            var_dump($_REQUEST);die();
            $today = Date('Y-m-d');
            $moisabonnement = $this->input->post('tarifabonnement');
            $jourabonnement = $moisabonnement * 30;
            $finabonnement = new DateTime($today .'+'.$jourabonnement.' day');
            $temp = $finabonnement->format('Y-m-d');
            $this->abonneemodel->insertAssocitationAbonnement($this->input->post('typeabonnement'), $idnewuser, $today, $temp);
//            $date2['statututilisateur'] = 0;
//            $this->abonneemodel->updateUtilisateur($idnewuser,$date2);
            $this->db->trans_complete();
//            redirect('Accueil/Connection');
            $ip = $this->input->ip_address();
//            $this->paiement->initPaie(1,10,$nom,"Inscription ".$this->input->post('typeabonnement')." Titan",$ip);
            redirect('accueil/Connection');
        }
        else{
            var_dump($this->input->post('motdepasse'));
        }
    }
    public function addUserback()    {
          var_dump($_FILES);
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
            $this->db->trans_start();
            $idnewuser = $this->abonneemodel->insertUtilisateur($this->input->post('civilite'), $nom, $this->input->post('prenomutilisateur'), $this->input->post('naissanceutilisateur'), $this->input->post('cin'), $this->input->post('datedelivrancecin'), $this->input->post('lieudelivrancecin'), $lienrectocin, $lienversocin, $this->input->post('emailutilisateur'), $this->input->post('identifiant'), sha1($this->input->post('motdepasse')), '0', $lienpdp);
//            var_dump($_REQUEST);die();
            $today = Date('Y-m-d');
            $moisabonnement = $this->input->post('tarifabonnement');
            $jourabonnement = $moisabonnement * 30;
            $finabonnement = new DateTime($today .'+'.$jourabonnement.' day');
            $temp = $finabonnement->format('Y-m-d');
            $this->abonneemodel->insertAssocitationAbonnement($this->input->post('typeabonnement'), $idnewuser, $today, $temp);
//            $date2['statututilisateur'] = 0;
//            $this->abonneemodel->updateUtilisateur($idnewuser,$date2);
            $this->db->trans_complete();
//            redirect('Accueil/Connection');
            $ip = $this->input->ip_address();
//            $this->paiement->initPaie(1,10,$nom,"Inscription ".$this->input->post('typeabonnement')." Titan",$ip);
            redirect('admin/abonnee');
        }
        else{
            var_dump($this->input->post('motdepasse'));
        }
    }
    public function desactiver_compte($id){
        desactiver_compte($id);
        redirect('admin/abonnee');
    }


    public function activerCompte($idUtilisateur){
        $data['statututilisateur'] = 1;
        $this->load->model('abonneemodel');
        $this->load->model('abonnementmodel');
        $abonnee = $this->abonneemodel->getInfoPayementAbonnee($idUtilisateur);
        $today = Date('Y-m-d');
        $moisabonnement = $abonnee[0]->durreeabonnement;
        $jourabonnement = $moisabonnement * 30;
        $finabonnement = new DateTime($today .'+'.$jourabonnement.' day');
        $temp = $finabonnement->format('Y-m-d');
        $abo['datedebutabonnement'] = $today;
        $abo['datefinabonnement'] = $temp;
        $this->db->trans_start();
        $this->abonneemodel->updateUtilisateur($idUtilisateur,$data);
        $this->abonnementmodel->update($abonnee[0]->idabonnement,$abo);
        $this->insert_activation($idUtilisateur);
        $this->db->trans_complete();
        send_confirmation($idUtilisateur);
        redirect('admin/abonnee');
    }

    
    public function insert_activation($idabonnee){
        $admin = $this->session->userdata('admin');
        if($admin) {
            $this->load->model('adminmodel');
            $data['idadmin'] = $admin['admin']->idadministrateur;
            $data['dateactivation'] = date('Y-m-d');
            $data['idabonnee'] = $idabonnee;
            $this->adminmodel->save_activation($data);
        }
        else{
            $this->session->set_flashdata('erreur',array(
                'message'=>"Veuillez vous connecter d'abord",
            ));
            redirect('admin','refresh');
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
        $liencinrecto = uploadImage('lienimagerectocin','upload/infouser','recto-cin-'.$this->input->post('identifiant'));
        if ($liencinrecto!=null) {
            $Data['liencin_recto'] = $liencinrecto['path'];
        }

        $lienverso = uploadImage('lienimageversocin','upload/infouser','verso-cin-'.$this->input->post('identifiant'));

        if($lienverso!=null){
            $Data['liencin_verso']=$lienverso['path'];
        }
        if ($this->input->post('emailutilisateur')!=""){
            $Data['emailutilisateur']=$this->input->post('emailutilisateur');
        }
        if ($this->input->post('identifiant')!=""){
            $Data['identifiant']=$this->input->post('identifiant');
        }

        $lienprofile = uploadImage('lienimagepdp','upload/infouser',$this->input->post('identifiant'));

        if($lienprofile!=null){
            $Data['imageprofile']=$lienprofile['path'];
        };
        $this->load->model('abonneemodel');
        $id = $this->session->userdata('user')[0]->idutilisateur2;
        $this->abonneemodel->updateUtilisateur($id,$Data);
        $temp = $this->abonneemodel->getAbonneeAbonnementById($id);
        $this->session->set_userdata('user',$temp);
        redirect('Accueil/monCompte');
    }

    public function modifiermotdepasse(){
        $Data = array(
          'motdepasse'=>  sha1($this->input->post('motdepasse'))
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