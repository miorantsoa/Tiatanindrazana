<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 10/03/2017
 * Time: 13:13
 */
class Accueil extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("rubrique_model");
        $this->load->model("articlesmodel");
        $this->load->model("journal");
        $this->load->model("pubmodel");
        $this->load->library("pagination");
        $this->load->library("articlelibrarie");
        $this->load->model("filactu_model");
        $this->load->model("infoutilemodel");
        $this->load->model("abonnementmodel");
        $this->load->model("feuillejournalmodel");
        $this->load->model('abonneemodel');
    }

    public function getPub($position){
        $pub_en_cours = $this->pubmodel->getPubByPosition($position);
        if(count($pub_en_cours)==0){
            $pub_en_cours = $this->pubmodel->getLastPub($position);
        }
        return $pub_en_cours;
    }

    public function homeView($view,$data = null,$titre=null){
        $this->session->set_userdata('last_page', current_url());
        $this->load->view('default/templates/header.php',$titre);
        $this->load->view('default/'.$view,$data);
        $this->load->view('default/templates/sidebar.php',$data);
        $this->load->view('default/templates/footer');
    }
    public function index(){
        $data = $this->indexData();
        $data['titre'] = "Tonga soa : Tia Tanindrazana";
        $this->homeView('accueil',$data,$data);
    }
    //initialisation données ao @ accueil
    public function indexData(){
        $data['rubriques'] = $this->rubrique_model->getFirstRang();
        if(count($this->articlesmodel->getUne())!=0) {
            $data['laune'] = $this->articlesmodel->getUne()[0];
        }
        $data['articlejournal'] = $this->articlesmodel->getListArticle(null,true);
        if(count($this->articlesmodel->getLastAmpamoaka())) {
            $data['ampamoaka'] = $this->articlesmodel->getLastAmpamoaka()[0];
        }
        if(count($this->articlesmodel->getLastSarisary())!=0) {
            $data['sarisary'] = $this->articlesmodel->getLastSarisary()[0];
        }
        if(count($this->getPub(1))!=0) {
            $data['banniere'] = current($this->getPub(1));
        }
        if(count($this->getPub(2))!=0) {
            $data['pub'] = $this->getPub(2);
        }
        $data['fil_actuj2'] = $this->filactu_model->getJ2Fil();
        $data['last_fil'] = $this->filactu_model->getLastFil();
        $this->load->model('sondage_model');
        $temp = $this->sondage_model->getLastSondage();
        $data['sondage'] = $temp;
        $temp1 = null;
        if($temp!= null) {
            $temp1 = $this->resultvote($this->sondage_model->getvotebyidsondage($temp[0]->idsondage));
        }
        $data['rvote'] = $temp1;

        //var_dump($data['last_fil']);
        $data['active'] = "";
        return $data;
    }
    public function resultvote($vote){
        $totalvote = 0;
        foreach ($vote as $votet) :
            $totalvote = $totalvote + $votet->nbrvote;
        endforeach;
        $ret = array(
            '0' => 0,
            '1' => 0,
            '2' => 0
        );
     //   var_dump($vote);
        foreach ($vote as $votep) :
            if(1 == $votep->idreponse) {
                $ret['0'] = $votep->nbrvote * 100 / $totalvote;

            }
            if(2 == $votep->idreponse) {
                $ret['1'] = $votep->nbrvote * 100 / $totalvote;

            }
            if(3 == $votep->idreponse) {
                $ret['2'] = $votep->nbrvote * 100 / $totalvote;

            }
        endforeach;
            return $ret;
        }

    public function detailArticle($id){
        $this->load->model('articlesmodel');
        $this->load->model('commentairemodel');
        $data = $this->indexData();
        $niveau_user = 1;
        //verifier session utilisateur
        $articles = $this->articlesmodel->getById($id);
        $interval = date_diff(date_create(($articles[0]->datepublication)),date_create(date('Y-m-d')))->format('%a');
        if (count($articles) != 0) {
            if($this->session->userdata('user') || $interval >=2 || $articles[0]->niveau <= 1) {
                $this->session->set_userdata('last_page', current_url());
                $article = $articles[0];
                $comment = $this->commentairemodel->get(null, $id);
                $data['commentaire'] = $comment;
                $lie = $this->articlesmodel->get(null, null, $article->idcategorie);
                $data['article_lie'] = $lie;
                $data['article'] = $article;
                $data['titre'] = $article->titre . " : Tia Tanindrazana";
                $this->homeView('detail', $data, $data);
            }
            else{
                $this->session->set_flashdata('erreur', "Raha te hijery an'io pejy io ianao dia misafidiana tolotra hafa");
                redirect($this->session->userdata('last_page'));
            }
        } else {
            $erreur['heading'] = "Tsy misy ny pejy notadiavinao";
            $erreur['message'] = "";
            $this->load->view('errors/html/error_404', $erreur);
        }
        
    }

    public function detail_categorie($id,$page = 1,$limit = 0,$q=null,$date1=null,$date2=null, $annee = null, $mois = null){
        $this->session->set_userdata('last_page', current_url());
        $data = $this->indexData();
        $query = $this->input->post('recherche');
        if($q!=null){
            $query = $q;
        }
        if($q == "-"){
            $query = null;
        }
        $date_1 = $this->input->post('date1');
        $date_2 = $this->input->post('date2');
        $_annee = $this->input->post('annee');
        $_mois = $this->input->post('mois');
        if(!$_annee){
            $_annee = 'null';
        }
        if(!$_mois){
            $_mois = 'null';
        }
        if($annee != null){
            $_annee = $annee;
        }
        if($mois!=null){
            $_mois = $mois;
        }
        if($date1!=null){
            $date_1 = $date1;
        }
        if($date_1==null){
            $date_1 = "2010-01-01";
        }
        if($date2!=null){
            $date_2 = $date2;
        }
        if($date_2==null){
            $date_2 = "2030-01-01";
        }

        $articles =  $this->articlesmodel->get(null,$query,$id,null,null,$date_1,$date_2,null,null,null,$this->input->post('ordre'),false, true, $_annee, $_mois);
        $rubrique =$this->rubrique_model->getRubriqueById($id);
        if(count($rubrique)!=0) {
            $rubrique = $rubrique[0];
            $per_page = 5;
            $resultats = $this->articlesmodel->get(null, $query, $id, null, null, $date_1, $date_2, null, $per_page, $limit, $this->input->post('ordre'),false, true, $_annee, $_mois);
            $data['results'] = $resultats;
            $data['limit'] = $limit;
            //$titre,$rubrique,$contenu,$resume,$date1,$date2,$laune,$limit,$maxlimit
            $data['categorie'] = $rubrique;
            $data['per_page'] = $per_page;
            $data['article_lie'] = $articles;
            $data['active'] = $rubrique->libelle;
            $data['titre'] = $rubrique->libelle . " : Tia Tanindrazana";
            $data['nbreponse'] = $per_page;
            $data['page'] = $page;
            $data['filtre'] = array(
                "query" => $query,
                "date_1" => $date_1,
                "date_2" => $date_2,
                "annee" => $_annee,
                "mois"=> $_mois
            );
            $this->homeView('detailcategorie', $data, $data);
        }
        else{
            $erreur['heading'] = "Tsy misy ny pejy notadiavinao";
            $erreur['message'] = "";
            $this->load->view('errors/html/error_404',$erreur);
        }
    }
    public function list_sarisary($id,$q=null,$date1=null,$date2=null){
        if ($this->session->userdata('user')) {
            $data = $this->indexData();
            $query = $this->input->post('recherche');
            if ($q != null) {
                $query = $q;
            }
            if ($q == "-") {
                $query = null;
            }
            $date_1 = $this->input->post('date1');
            $date_2 = $this->input->post('date2');
            if ($date1 != null) {
                $date_1 = $date1;
            }
            if ($date2 != null) {
                $date_2 = $date2;
            }
            $sarisary = $this->articlesmodel->get(null, $query, $id, null, null, $date_1, $date_2, null, null, null, $this->input->post('ordre'), true);
            $rubrique = $this->rubrique_model->getRubriqueById($id);
            if (count($rubrique) != 0) {
                $rubrique = $rubrique[0];
                $sous_rubrique = $this->rubrique_model->getSousCategorieByIdMere(10);
                $data['categorie'] = $rubrique;
                $data['sarisary'] = $sarisary;
                $data['sous_rubrique'] = $sous_rubrique;
                $data['titre'] = $rubrique->libelle . " : Tia Tanindrazana";
                $this->load->view('default/templates/header', $data);
                $this->load->view('default/detailsarisary', $data);
                $this->load->view('default/templates/footer');
            } else {
                $erreur['heading'] = "Tsy misy ny pejy notadiavinao";
                $erreur['message'] = "";
                $this->load->view('errors/html/error_404', $erreur);
            }
        }
        else{
            $this->session->set_flashdata('erreur',"Raha te hijery an'io pejy io ianao dia misafidiana tolotra hafa");
            redirect($this->session->userdata('last_page'));
        }
    }
    public function contact(){
        $data = $this->indexData();
        $data['titre'] = "Hitafa aminay : Tia Tanindrazana";
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/contact',$data);
        $this->load->view('default/templates/footer');
    }

    /***Fueilleter journal*/
    public function feuilleter_journal($page = 1,  $start = 0,$date1=null,$date2=null){
        $this->session->set_userdata('last_page', current_url());
        $data = $this->indexData();
        $date_1 = $this->input->post('date1');
        $date_2 = $this->input->post('date2');
        if($date1!=null){
            $date_1 = $date1;
        }
        if($date2!=null){
            $date_2 = $date2;
        }
        if($date_2 != null && strtotime($date_1)> strtotime($date_2)){
            $data['error'] = "Tsy afaka kely noho ny daty nanombohana ny daty iafarana";
            $date_2 =  "";
            $date_1 = "";
        }
        $ordre = "desc";
        if(!$this->input->post('ordre')){
            $ordre = "desc";
        }
        else{
            $ordre = $this->input->post('ordre');
        }
        $per_page = 12;
        $data['titre'] = "Hamaky gazety : Tia Tanindrazana";
        $data['last'] = $this->feuillejournalmodel->getLast();
        //$idfeuille=null,$date1="",$date2="",$limit=null,$start=null,$order="desc"
        $total = $this->feuillejournalmodel->get(null,$date_1,$date_2);
        $gazety = $this->feuillejournalmodel->get(null,$date_1,$date_2,$per_page,$start,$ordre);
        $data['gazety'] = $gazety;
        $data['total'] = $total;
        $data['start'] = $start;
        $data['per_page'] = $per_page;
        $data['page'] = $page;
        $data['filtre'] = array(
            'date1' => $date1,
            'date2' => $date2
        );
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/feuilleter_journal',$data);
        $this->load->view('default/templates/footer');
    }
    public function detail_gazety($id){
        $data = $this->indexData();
        $feuille_journal = $this->feuillejournalmodel->getDetail($id);
        if ($this->session->userdata('user')) {
            if (count($feuille_journal) != 0) {
                if (count($feuille_journal) != 0) {
                    $data['detail'] = $feuille_journal;
                    $data['titre'] = "Gazety niseho ny " . $feuille_journal[0]->dateparution . " : Tia Tanindrazana";
                    $this->load->view('default/page_journal', $data);
                } else {
                    $data['message'] = "Tsy misy sary mifanaraka @io gazety io";
                    $data['titre'] = "Hamaky gazety : Tia Tanindrazana";
                    $gazety = $this->feuillejournalmodel->get();
                    $data['gazety'] = $gazety;
                    $this->load->view('default/templates/header', $data);
                    $this->load->view('default/feuilleter_journal', $data);
                    $this->load->view('default/templates/footer');
                }
            } else {
                $erreur['heading'] = "Tsy misy ny pejy notadiavinao";
                $erreur['message'] = "";
                $this->load->view('errors/html/error_404', $erreur);
            }
        }
        else{
            $this->session->set_flashdata('erreur',"Raha te hijery an'io pejy io ianao dia misafidiana tolotra hafa");
            redirect('accueil/feuilleter_journal');
        }
    }
    /***Fueilleter journal*/


    /*Info utile*/
    public function info_utile(){
        $this->session->set_userdata('last_page', current_url());
        //$id=null,$titre=null,$idcategorie=null,$contenu=null,$ordre='DESC',$date1=null,$date2=null,$date = null, $publie = null
        $data = $this->indexData();
        $data['titre'] = "Ilaiko | Info util : Tia Tanindrazana";
        $data['info_util'] = $this->infoutilemodel->get(null,null,null,null,null,null,null,null,true);
        $data['categories'] = $this->infoutilemodel->getCategorie(1);
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/info_util',$data);
        $this->load->view('default/templates/footer');
    }

    public function detail_info_utile($id){
        $data = $this->indexData();
        if ($this->session->userdata('user')) {
            $info_util = $this->infoutilemodel->get($id,null,null,null,null,null,null,null,true);
            if (count($info_util) != 0) {
                $this->session->set_userdata('last_page', current_url());
                //$id=null,$titre=null,$idcategorie=null,$contenu=null,$ordre='DESC',$date1=null,$date2=null
                $data['associe'] = $this->infoutilemodel->get(null, null, $info_util[0]->idcatbeinfo);
                $data['titre'] = $info_util[0]->titre . " : Tia Tanindrazana";
                $data['info_utile'] = $info_util[0];
                $this->homeView('detail_info_utile', $data, $data);
            } else {
                $erreur['heading'] = "Tsy misy ny pejy notadiavinao";
                $erreur['message'] = "";
                $this->load->view('errors/html/error_404', $erreur);
            }
        }
        else{
            $this->session->set_flashdata('erreur', "Raha te hijery an'io pejy io ianao dia misafidiana tolotra hafa");
            redirect($this->session->userdata('last_page'));
        }
    }
    public function filtre_info_utile(){
        $this->session->set_userdata('last_page', current_url());
        $data = $this->indexData();
        $data['titre'] = "Ilaiko | Info util : Tia Tanindrazana";
        $data['categories'] = $this->infoutilemodel->getCategorie(1);
        //$id=null,$titre=null,$idcategorie=null,$contenu=null,$ordre='DESC',$date1=null,$date2=null
        $resultat = $this->infoutilemodel->get(null,$this->input->post('recherche'),$this->input->post('categorie'),$this->input->post('recherche'),$this->input->post('ordre'),$this->input->post('date1'),$this->input->post('date2'));
        $data['info_util']=array();
        if(count($resultat)) {
            $data['info_util'] = $resultat;
        }
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/info_util',$data);
        $this->load->view('default/templates/footer');
    }


    /*Info utile*/

    /*Recherche*/
    public function recherche_simple($query = null,$page = 1,$limit = 0){
        $per_page = 10;
        if($this->input->post('search'))
            $query = $this->input->post('search');
        if($query!=null)
            $query =$query;
        $data = $this->indexData();
        //$titre,$rubrique,$contenu,$resume,$date1,$date2,$laune,$limit,$maxlimit
        $all = $this->articlesmodel->get(null,$query,null,$query,$query,null,null,null,null,null);
        $resultats = $this->articlesmodel->get(null,$query,null,$query,$query,null,null,null,$per_page,$limit);
        $data['articles'] = $all;
        $data['all'] =  $all;
        $data['recherche'] = $query;
        $data['results'] = $resultats;
        $data['limit'] = $limit;
        $data['titre'] = "Valin'ny fikarohana : ".$query." :Tiatanindrazana";
        $data['nbreponse'] = $per_page;
        $data['page'] = $page;
        $this->homeView('resultat_recherche',$data,$data);
    }
    
    public function detail_filactu($date=null){
        $data = $this->indexData();
        $this->session->set_userdata('last_page', current_url());
        if ($date != null) {
            $fil_actu = $this->filactu_model->getByDate($date);
            $data['detail_fil'] = $fil_actu;
            $data['titre'] = "Faham-baovao ny " . $date;
            $data['titre'] = "Faham-baovao : Tia Tanindrazana";
            $this->homeView('detail_fil_info', $data, $data);
        }
        else{
            $erreur['heading'] = "Tsy misy ny pejy notadiavinao";
            $erreur['message'] = "";
            $this->load->view('errors/html/error_404',$erreur);
        }
    }
    public function detailjournal($id){
        $data = $this->indexData();
        $gazety = $this->articlesmodel->getArticlesByJournal($id,false);//Tous les articles sauf la une
        $une = $this->articlesmodel->getArticlesByJournal($id,true);//La une
        if(count($gazety)!=0){
            if(count($une)!=0){
                $data['laune'] = $une[0];
            }
            $data['articlejournal'] = $gazety;
            if(count($gazety)!=0) {
                $data['titre'] = "Gazety nivoaka ny " . $gazety[0]->dateparution . "  : Tia Tanindrazana";
            }
            else{
                $data['titre'] = "Archive : Tia Tanindrazana";
            }
            $data['fil_actu'] = $this->filactu_model->getFilActu();
            $this->homeView('accueil',$data,$data);
        }
        else{
            $erreur['heading'] = "Tsy misy ny pejy notadiavinao";
            $erreur['message'] = "";
            $this->load->view('errors/html/error_404',$erreur);
        }

    }
    public function archive($q = null, $page = 1,$limit = 0,$date1=null,$date2=null){
        $data = $this->indexData();
        $per_page = 12;
        $query = $this->input->post('recherche');
        if($q!=null){
            $query = $q;
        }
        if($q == "-"){
            $query = null;
        }
        $date_1 = $this->input->post('date1');
        $date_2 = $this->input->post('date2');
        if($date1!=null){
            $date_1 = $date1;
        }
        if($date2!=null){
            $date_2 = $date2;
        }
        if($date1!=null){
            $date_1 = $date1;
        }
        if($date2!=null){
            $date_2 = $date2;
        }
        $ordre = $this->input->post('ordre');
        $data['titre'] = "Archive : Tia Tanindrazana";
        $data['total'] = $this->journal->get(null,null,$date_1,$date_2,$ordre,$query);
        $journal = $this->journal->get(null,null,$date_1,$date_2,$ordre,$query,$per_page,$limit);
        $last_journal = $this->journal->getLastJournal();
        if(count($last_journal)!=0){
            $data['last_journal'] = $last_journal[0];
        }
        $data['page'] = $page;
        $data['nbreponse'] = $per_page;
        $data['filtre'] = array(
            "query" => $query,
            "date_1" => $date_1,
            "date_2" => $date_2
        );
        $data['archive'] = $journal;
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/archive',$data);
        $this->load->view('default/templates/footer');

    }

    /*Feuilleter journal*/
    public function list_journal(){
        $data = $this->indexData();
        //$id,$numparution,$date1,$date2
        $data['titre'] = "Kiosque : Tia Tanindrazana";
        $this->homeView('feuilleter_journal',$data,$data);
    }
    public function page_journal(){
        $this->load->view('default/page_journal');
    }
    /*Feuilleter journal*/



    public function inscription(){
        $data = $this->indexData();
        $data['titre'] = "Inscription : Tia Tanindrazana";
        $data['typeabonnement'] = $this->abonnementmodel->getTypeAbonnement();
        $data['tarifabonnement'] = $this->abonnementmodel->getTarifAbonnement();
//        $this->load->view('default/templates/header',$data);
        $this->load->view('default/register',$data);
//        $this->load->view('default/templates/footer');
    }
    /*Commentaire*/
    public function addCommentaire(){
        $nomprenom = $this->input->post('nom');
        $email = $this->input->post('email');
        $commentaire = $this->input->post('commentaire');
        $idarticle = $this->input->post('article');
        $this->load->model('commentairemodel');
        $this->commentairemodel->insert($nomprenom,$email,$commentaire,$idarticle);
        $this->detailArticle($idarticle);

    }
    /*Commentaire*/
    public function addFavoris($idarticle){
        $message = "";
        $article = $this->articlesmodel->getById($idarticle)[0];
        if($this->session->userdata('user')){
            $this->session->set_userdata('last_page', current_url());
            $user = $this->session->userdata('user')[0];
            $this->load->library('globalfunction');
            if(!$this->globalfunction->isFavorisExist($user->idutilisateur2,$idarticle)){
                $this->abonneemodel->addFavoris($user->idutilisateur2, $idarticle);
                $message = "Tontosa ny fanampiana favoris nataonao";
                redirect('accueil/monCompte');
            }
            else{
                $message = "Efa anisan'ny favoris-nao io lahatsoratra io";
                $this->session->set_flashdata('message', $message);
                redirect($this->session->userdata('last_page'));
            }
        }
        else{
            $this->session->set_flashdata('erreur', "Raha te hijery an'io pejy io ianao dia misafidiana tolotra hafa");
            redirect($this->session->userdata('last_page'));
        }
    }

    public function supprimerFavs($idarticle){
        if($this->session->userdata('user')){
            $user = $this->session->userdata('user')[0];
            $this->abonneemodel->deleteFavoris($user->idutilisateur2,$idarticle);
            redirect('accueil/monCompte');
        }
        else{

        }
    }

    public function monCompte(){
        $data = $this->indexData();
        $this->session->set_userdata('last_page', current_url());
        if($this->session->userdata('user')) {
            $iduser = $this->session->userdata('user')[0]->idutilisateur2;
            $favoris = $this->abonneemodel->getFavoris($iduser);
            $data['favoris'] = $favoris;
            $data['titre'] = "Mon compte : Tia Tanindrazana";
//          $this->load->view('default/templates/header',$data);
            $this->load->view('default/profile', $data);
//          $this->load->view('default/templates/footer');
        }
        else{
            redirect('admin/connection');
        }
    }
    public function modif_Info_User(){
        $data = $this->indexData();
        $data['titre'] = "Modifier information utilisateur : Tia Tanindrazana";
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/modif_info_user',$data);
        $this->load->view('default/templates/footer');
    }

    public function modifier_mot_de_passe(){
        $data = $this->indexData();
        $data['titre'] = "Modifier information utilisateur : Tia Tanindrazana";
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/modifier_mot_de_passe',$data);
        $this->load->view('default/templates/footer');
    }

    public function connection(){
        $data['titre'] = "Connection : Tia Tanindrazana";
        $this->load->view('default/connection',$data);
    }


    public function payement(){
        $data = array();
        $this->load->model('abonnementmodel');
        $test_email = $this->abonneemodel->getUserByEmail($this->input->post('emailutilisateur'));
        $data['civilite'] = $this->input->post('civilite');
        $data['nomutilisateur'] = $this->input->post('nomutilisateur');
        $data['prenomutilisateur'] = $this->input->post('prenomutilisateur');
        $data['naissanceutilisateur'] =  $this->input->post('naissanceutilisateur');
        $data['emailutilisateur'] = $this->input->post('emailutilisateur');
        $data['identifiant'] = $this->input->post('identifiant');
        $data['motdepasse'] = sha1($this->input->post('motdepasse'));
        $data['statututilisateur'] = 0;
        if(count($test_email)!=0){
            $this->session->set_flashdata('info_abonnee',array('user'=>$data,'message'=>"Efa misy mampiasa ny adiresy mailaka nosafidinao"));
            redirect('accueil/inscription');
        }
        if(uploadImage('lienimagepdp','upload/infouser',$this->input->post('identifiant').'-'.'profile')) {
            $data['imageprofile'] = uploadImage('lienimagepdp', 'upload/infouser', $this->input->post('identifiant') . '-' . 'profile')['path'];
        }
        $abonnement = array();
        $abonnement['type']=$this->input->post('typeabonnement');
        $abonnement['debut'] = Date('Y-m-d');
        $abonnement['tarif'] = $this->input->post('idtarif');
        $moisabonnement = $this->input->post('tarifabonnement');
        $jourabonnement = $moisabonnement * 30;
        $finabonnement = new DateTime($abonnement['debut'].'+'.$jourabonnement.' day');
        $abonnement['fin'] = $finabonnement->format('Y-m-d');
        $infoabonnement = $this->abonnementmodel->getTarifAbonnementById($this->input->post('idtarif'));
        $abo = array();
        if(count($infoabonnement)!=0){
            $abo['duree'] = $infoabonnement[0]->durreeabonnement;
            $abo['montant'] = $infoabonnement[0]->prixabonnement;
        }
        $this->session->set_userdata('info_user',$data);
        $this->session->set_userdata('abonnement',$abonnement);
        $this->load->view('default/payement',$abo);
    }

    public function ajouterkolikoly(){
        $data = $this->indexData();
        $this->load->model('typecorruptionmodel');
        $data['titre'] = "Amoka kolikoly : Tia Tanindrazana";
        $data['categorieCorruption'] = $this->typecorruptionmodel->getTypeCorruption();
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/AjouterKolikoly',$data);
        $this->load->view('default/templates/footer');
    }

    public function add_url_tag(){
        add_url_tag();
        echo "Opération effectué";
    }
    public function add_url_info(){
        add_url_tag_ilaiko();
        echo "Opération effectué";
    }

    public function send_mail(){
        $message = "<p>Bonjour ,</p>";
        $message .= "<p>Votre compte vient d'être activé</p>";
        $message .="<p>Voici vos information de connexion : </p>";
        $message .="<p>Email : </p>";
        $message .="<p>Mot de passe : le mot de passe que vous avez choisis</p>";
        $message .="<p>Pour acceder a votre compte veuiller vous connecter sur:</p>";
        $message .="<p>http://www.tiatanindrazana.com/v2/accueil/connection</p>";
        $message .="<p>-------------------------------</p>";
        $message .="<p>Cordialement</p>";
        $message .="<p>siege Vidy varotra soanerana</p>";

        send("tiatanindrazanasite@gmail.com","Confirmation Abonnement",$message);
        echo "Opération effectué";
    }

    public function listekolikoly(){
        $data = $this->indexData();
        $this->load->model('coruptionmodel');
        $data['titre'] = "Ireo kolikoly nozaraina : Tia Tanindrazana";
        $data['Corruption'] = $this->coruptionmodel->getallcorruption();
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/kolikoly',$data);
        $this->load->view('default/templates/footer');
    }
    public function updateTarif(){
        $this->db->trans_start();
        $this->db->query('update typeabonnement set libelle = "Volamena" where libelle = "Gold"');
        $this->db->trans_complete();
        echo "Opération effecué";
    }

    public function update_view(){
        $this->db->trans_start();
        $this->db->query('drop view sous_categorie');
        $this->db->query('
        CREATE VIEW `sous_categorie` AS
          SELECT
            `categorie`.`idcategorie` AS `idcategorie`,
            `categorie`.`libelle`     AS `libelle`,
            `categorie`.`niveau`      AS `niveau`,
            `categorie`.`rang_cat`    AS `rang_cat`,
            `categorie_mere`.`idcategorie`            AS `idmere`,
            `categorie_mere`.`libelle`                AS `catmere`
          FROM ((`categorie`
            JOIN `assoc_sous_categorie`
              ON ((`categorie`.`idcategorie` = `assoc_sous_categorie`.`idcategorie2`))) JOIN
            `categorie_mere`
              ON ((`assoc_sous_categorie`.`idcategorie1` = `categorie_mere`.`idcategorie`)))
        ');
        $this->db->trans_complete();
        echo "Opération effecué";
    }

    public function update_media(){
        $this->db->trans_start();
        $this->db->query('ALTER TABLE `abonnee` CHANGE `cin` `cin` VARCHAR(16) CHARACTER SET utf8 COLLATE utf8_general_ci NULL');
        $this->db->query('ALTER TABLE `abonnee` CHANGE `datedelivrancecin` `datedelivrancecin` DATE NULL');
        $this->db->query('ALTER TABLE `abonnee` CHANGE `lieudelivrancecin` `lieudelivrancecin` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL');
        $this->db->query('ALTER TABLE `abonnee` CHANGE `liencin_recto` `liencin_recto` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL');
        $this->db->query('ALTER TABLE `abonnee` CHANGE `liencin_verso` `liencin_verso` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL');
        $this->db->query('ALTER TABLE `filactualite` CHANGE `extrait` `extrait` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL');
        $this->db->query('ALTER TABLE `media` ADD `min` VARCHAR(150) NULL AFTER `cheminmedia`');
        $this->db->query('ALTER TABLE `journal` ADD `min` VARCHAR(150) NULL AFTER `liencouverture`');
        $this->db->trans_complete();
        echo "Opération effecué";
    }
    public function add_column_min(){
        $this->db->query('ALTER TABLE `article` ADD `min` VARCHAR(250) NULL AFTER `lien_image_une`');
    }
}