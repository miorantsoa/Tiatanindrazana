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

    public function verifierMail(){
        $email = $_GET['email'];
        $this->load->model('abonneemodel');
        $user = $this->abonneemodel->getUserByEmail(trim($email));
        if(count($user)!=0){
            die(header("HTTP/1.0 404 Not Found"));
        }
        echo "success";
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
    public function addUserback(){
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
            $today = Date('Y-m-d');
            $moisabonnement = $this->input->post('tarifabonnement');
            $jourabonnement = $moisabonnement * 30;
            $finabonnement = new DateTime($today .'+'.$jourabonnement.' day');
            $temp = $finabonnement->format('Y-m-d');
            $this->abonneemodel->insertAssocitationAbonnement($this->input->post('typeabonnement'), $idnewuser, $today, $temp);
            $payement['idabonnee'] = $idnewuser;
            $this->abonneemodel->insertInfoPayement($payement);
            $payement['numero'] = "local";
            $payement['trans_id'] = "local";
            //  var_dump($data, $abonnement, $operateur, $numero, $trans_id);
            $payement['idabonnee'] = $idnewuser;
            $this->abonneemodel->insertInfoPayement($payement);
            $this->db->trans_complete();
            redirect('page/administration/abonnee');
        }
        else{
            var_dump($this->input->post('motdepasse'));
        }
    }
    public function desactiver_compte($id){
        desactiver_compte($id);
        redirect('page/administration/abonnee');
    }

    public function delete_compte_vide($id){
        delete_compte_vide($id);
        redirect('page/administration/abonnee');
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
        redirect('page/administration/abonnee');
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
            redirect('page/administration','refresh');
        }

    }


    public function updateInfoUserBack(){

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

        if ($this->input->post('emailutilisateur')!=""){
            $Data['emailutilisateur']=$this->input->post('emailutilisateur');
        }
        if ($this->input->post('identifiant')!=""){
            $Data['identifiant']=$this->input->post('identifiant');
        }

        $this->load->model('abonneemodel');
        $id = $this->input->post('idabonnee');
        $this->abonneemodel->updateUtilisateur($id,$Data);
        $temp = $this->abonneemodel->getAbonneeAbonnementById($id);
        $this->session->set_userdata('user',$temp);
        redirect('admin/abonnee');
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

    public function oublie_mot_de_passe(){
        $this->load->view('default/passe_oublie');
    }
    public function send_reset_mail(){
        $email = $this->input->post('email');
        $this->load->model('abonneemodel');
        $user = $this->abonneemodel->getUserByEmail($email);
        if(count($user)==0){
            $this->session->set_flashdata('message',"Miala tsiny fa tsy mbola misy ato  aminay io kaonty io");
            redirect('usercontroller/oublie_mot_de_passe');
        }
        else{
            $uniq_id = md5(uniqid($email, true));
            $civilite = $user[0]->civilite;
            $prenom = $user[0]->prenomutilisateur;
            $url = base_url('usercontroller/reinitialiser_mot_de_passe?uniq_id='.$uniq_id.'&id='.$user[0]->idutilisateur2);
            $url_averina = base_url('usercontroller/oublie_mot_de_passe');
            $message = "<p>Midiarahaba anao $civilite $prenom,</p>";
            $message.= "</br><p>Mahavoray ity mailaka ity ianao satria nisy nangataka hanova ny teny miafina ampiasainao</p>";
            $message.= "</br><p>Raha ianao no nangataka izany dia tsindrio araho ny rohy : <a href='$url'>Hanova teny miafina</a></p>";
            $message.= "<p>Raha tsy te hanova kosa ianao dia ataovy hoatran'ny tsy misy ity mailaka ity.</p>";
            send($email,'Tia Tanindrazana : Hanova teny miafina hadino',$message);
            $this->session->set_flashdata('message',"Efa lasa ny mailaka fangatahana fanovana teny miafina nangatahanao. Raha mbola tsy nahavoaray dia <a href='$url_averina'>Averina alefa</a>");
            redirect('usercontroller/oublie_mot_de_passe');
        }
    }

    public function reinitialiser_mot_de_passe(){
        $user_id = $this->input->get('id');
        $uniq_id = $this->input->get('uniq_id');
        if(!empty($user_id) && !empty($uniq_id)) {
            $data['id'] = $user_id;
            $data['uniqId'] = $uniq_id;
            $this->load->view('default/reset', $data);
        }
        else{
            $this->session->set_flashdata('message',"Nisy olana ny fangatahana fanovana teny miafina nataonao.");
            redirect('usercontroller/oublie_mot_de_passe');
        }
    }

    public function reset(){
        $new_pass = $this->input->post('motdepasse');
        $id = $this->input->post('id');
        $user = current($this->abonneemodel->getAbonneeById($id));
        if($user!=null) {
            $this->load->model('abonnementmodel');
            $data['idutilisateur2'] = $user->idutilisateur2;
            $data['motdepasse'] = $new_pass;
            $this->abonneemodel->updateUtilisateur($id, $data);
            $message = "<p>Miarahaba,</p>";
            $message .= "</br><p>Tanteraka soa aman-tsara ny fanovana teny miafina nataonao.</p>";
            $message .= "</br><p>Misaotra anao amin'ny fahatokisanao.</p>";
            send($user->emailutilisateur, "Tia Tanindrazana : Fanovana teny miafina", $message);
            $this->session->set_flashdata('message', "Tanteraka soa aman-tsara ny fanovana teny miafina nataonao");
            redirect('accueil/connection');
        }
        else{
            $this->session->set_flashdata('message', "Miala tsiny fa tsy mbola misy ilay kaonty nampidirinao.");
            redirect('accueil/connection');
        }
    }

}