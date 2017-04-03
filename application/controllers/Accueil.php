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
    }

    public function homeView($view,$data = null,$titre=null){
        $this->load->view('default/templates/header.php',$titre);
        $this->load->view('default/'.$view,$data);
        $this->load->view('default/templates/sidebar.php',$data);
        $this->load->view('default/templates/footer');
    }
    public function index(){
        $this->session->set_userdata('last_page', current_url());
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
        $data['articlejournal'] = $this->articlesmodel->getListArticle();
        if(count($this->articlesmodel->getLastAmpamoaka())) {
            $data['ampamoaka'] = $this->articlesmodel->getLastAmpamoaka()[0];
        }
        if(count($this->articlesmodel->getLastSarisary())!=0) {
            $data['sarisary'] = $this->articlesmodel->getLastSarisary()[0];
        }
        if(count($this->pubmodel->getPubByPosition(1))!=0) {
            $data['banniere'] = $this->pubmodel->getPubByPosition(1)[0];
        }
        $data['pub'] = $this->pubmodel->getPubByPosition(2);
        $data['fil_actuj2'] = $this->filactu_model->getJ2Fil();
        $data['last_fil'] = $this->filactu_model->getLastFil();
        //var_dump($data['last_fil']);
        $data['active'] = "";
        return $data;
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
            if(($this->session->userdata('user') &&  $this->session->userdata('user')->niveau >=1) || $interval >=2 || $articles[0]->niveau <= 1) {
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

    public function detail_categorie($id,$page = 1,$limit = 0,$q=null,$date1=null,$date2=null){
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
        if($date1!=null){
            $date_1 = $date1;
        }
        if($date2!=null){
            $date_2 = $date2;
        }

        $articles =  $this->articlesmodel->get(null,$query,$id,null,null,$date_1,$date_2,null,null,null,$this->input->post('ordre'));
        $rubrique =$this->rubrique_model->getRubriqueById($id);
        if(count($rubrique)!=0) {
            $rubrique = $rubrique[0];
            $per_page = 10;
            //$titre,$rubrique,$contenu,$resume,$date1,$date2,$laune,$limit,$start,$ordre='DESC',$idjournal=null
            $resultats = $this->articlesmodel->get(null, $query, $id, null, null, $date_1, $date_2, null, $per_page, $limit, $this->input->post('ordre'));
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
                "date_2" => $date_2
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
        if($date1!=null){
            $date_1 = $date1;
        }
        if($date2!=null){
            $date_2 = $date2;
        }
        $sarisary =  $this->articlesmodel->get(null,$query,$id,null,null,$date_1,$date_2,null,null,null,$this->input->post('ordre'),true);
        $rubrique =$this->rubrique_model->getRubriqueById($id);
        if(count($rubrique)!=0) {
            $rubrique = $rubrique[0];
            $sous_rubrique = $this->rubrique_model->getSousCategorieByIdMere(10);
            $data['categorie'] = $rubrique;
            $data['sarisary'] = $sarisary;
            $data['sous_rubrique'] = $sous_rubrique;
            $data['titre'] = $rubrique->libelle . " : Tia Tanindrazana";
            $this->load->view('default/templates/header', $data);
            $this->load->view('default/detailsarisary', $data);
            $this->load->view('default/templates/footer');
        }
        else{
            $erreur['heading'] = "Tsy misy ny pejy notadiavinao";
            $erreur['message'] = "";
            $this->load->view('errors/html/error_404',$erreur);
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
    public function feuilleter_journal($q=null,$date1=null,$date2=null){
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
        if($date1!=null){
            $date_1 = $date1;
        }
        if($date2!=null){
            $date_2 = $date2;
        }
        if(strtotime($date_1)> strtotime($date_2)){
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
        //$sarisary =  $this->articlesmodel->get(null,$query,$id,null,null,$date_1,$date_2,null,null,null,$this->input->post('ordre'),true);
        $data['titre'] = "Hamaky gazety : Tia Tanindrazana";
        $data['last'] = $this->feuillejournalmodel->getLast();
        //$idfeuille=null,$date1="",$date2="",$limit=null,$start=null,$order="desc"
        $gazety = $this->feuillejournalmodel->get(null,$date_1,$date2,null,null,$ordre);
        $data['gazety'] = $gazety;
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/feuilleter_journal',$data);
        $this->load->view('default/templates/footer');
    }
    public function detail_gazety($id){
        $data = $this->indexData();
        $feuille_journal = $this->feuillejournalmodel->getDetail($id);
        if ($this->session->userdata('user') && $this->session->userdata('user')->niveau >= 2) {
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
        $data = $this->indexData();
        $data['titre'] = "Ilaiko | Info util : Tia Tanindrazana";
        $data['info_util'] = $this->infoutilemodel->get();
        $data['categories'] = $this->infoutilemodel->getCategorie(1);
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/info_util',$data);
        $this->load->view('default/templates/footer');
    }

    public function detail_info_utile($id){
        $data = $this->indexData();
        $info_util = $this->infoutilemodel->get($id);
        if ($this->session->userdata('user') && $this->session->userdata('user')->niveau >= 2) {
            if (count($info_util) != 0) {
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
        $interval = date_diff(date_create(($date)),date_create(date('Y-m-d')))->format('%a');
        if($this->session->userdata('user') || $interval >= 2) {
            if ($date != null) {
                $fil_actu = $this->filactu_model->getByDate($date);
                $data['detail_fil'] = $fil_actu;
                $data['titre'] = "Faham-baovao ny " . $date;
            }
            $data['titre'] = "Faham-baovao : Tia Tanindrazana";
            $this->homeView('detail_fil_info', $data, $data);
        }
        else{
            $this->session->set_flashdata('erreur', "Raha te hijery an'io pejy io ianao dia misafidiana tolotra hafa");
            redirect('accueil');
        }
    }

    
    public function archive($date1 = null, $date2 = null, $numparution = null){
        
        $data = $this->indexData();
        //$id,$numparution,$date1,$date2
        $data['titre'] = "Archive : Tia Tanindrazana";
        $journal = $this->journal->get(null,$numparution,$date1,$date2);
        $last_journal = $this->journal->getLastJournal();
        if(count($last_journal)!=0){
            $data['last_journal'] = $last_journal[0];
        }
        $data['archive'] = $journal;
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/archive',$data);
        $this->load->view('default/templates/footer');
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
    public function filtre_journal($page = 1,$limit = 0,$date1=null,$date2=null){
        $data = $this->indexData();
        $per_page = 10;
        $date_1 = $this->input->post('date1');
        $date_2 = $this->input->post('date2');
        if($date1!=null){
            $date_1 = $date1;
        }
        if($date2!=null){
            $date_2 = $date2;
        }
        $ordre = $this->input->post('ordre');
        $data['titre'] = "Archive : Tia Tanindrazana";
        $journal = $this->journal->get(null,null,null,null,$ordre,$per_page,$limit);
        $last_journal = $this->journal->getLastJournal();
        if(count($last_journal)!=0){
            $data['last_journal'] = $last_journal[0];
        }
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
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/inscription',$data);
        $this->load->view('default/templates/footer');
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
        if($this->$this->session->userdata('user')){
            $user = $this->session->userdata('user');
            $this->load->model('abonneemodel');
            $this->load->library('globalfunction');
            if(!$this->globalfunction->isFavorisExit($idarticle,$user->iduser)){
                $this->abonneemodel->addFavoris($user->iduser, $idarticle);
                $message = "Tontosa ny fanampiana favoris nataonao";
            }
            else{
                $message = "Efa anisan'ny favoris-nao io lahatsoratra io";
            }
        }
        $data = $this->indexData();
        $data['article_lie'] = $this->articlesmodel->getByRubrique($article->idcategorie);
        $data['article'] = $article;
        $data['titre'] =  $article->titre." : Tia Tanindrazana";
        $this->homeView('detail',$data,$data);
        $message = "Tsy afaka manao an'io operation io ianao";
        $data['message'] = $message;
        //redirection vers la page de l'article
        $this->homeView('detail',$data,$data);
    }
    public function monCompte(){
        $data = $this->indexData();
        $data['titre'] = "Mon compte : Tia Tanindrazana";
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/monCompte',$data);
        $this->load->view('default/templates/footer');
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
        $data = $this->indexData();
        $data['titre'] = "Connection : Tia TAnindrazana";
        $this->load->view('default/connection',$data);
    }

}