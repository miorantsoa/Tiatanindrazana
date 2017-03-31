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
    }

    public function homeView($view,$data = null,$titre=null){
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
        $data['laune'] = $this->articlesmodel->getUne()[0];
        $data['articlejournal'] = $this->articlesmodel->getListArticle();
        $data['ampamoaka'] = $this->articlesmodel->getLastAmpamoaka()[0];
        $data['sarisary'] = $this->articlesmodel->getLastSarisary()[0];
        $data['banniere'] = $this->pubmodel->getPubByPosition(1)[0];
        $data['pub'] = $this->pubmodel->getPubByPosition(2);
        $data['fil_actu'] = $this->filactu_model->getFilActu();
        $data['active'] = "";
        return $data;
    }
    public function detailArticle($id){
        $this->load->model('articlesmodel');
        $niveau_user = 1;
        //verifier session utilisateur
        $article = $this->articlesmodel->getById($id)[0];
        if(!$this->session->userdata('user') && $article->niveau != 1){
            $data = $this->indexData();
            $data['fil_actu'] = $this->filactu_model->getFilActu();
            $data['titre'] = "Tonga soa : Tia Tanindrazana";
            $data['error'] = "erreur";
            $this->homeView('accueil',$data,$data,$data);
        }
        else{
            $data = $this->indexData();
            $data['article_lie'] = $this->articlesmodel->getByRubrique($article->idcategorie);
            $data['article'] = $article;
            $data['titre'] =  $article->titre." : Tia Tanindrazana";
            $this->homeView('detail',$data,$data);
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
        $rubrique =$this->rubrique_model->getRubriqueById($id)[0];
        $per_page = 2;
        //$titre,$rubrique,$contenu,$resume,$date1,$date2,$laune,$limit,$start,$ordre='DESC',$idjournal=null
        $resultats = $this->articlesmodel->get(null,$query,$id,null,null,$date_1,$date_2,null,$per_page,$limit,$this->input->post('ordre'));
        $data['results'] = $resultats;
        $data['limit'] = $limit;
        //$titre,$rubrique,$contenu,$resume,$date1,$date2,$laune,$limit,$maxlimit
        $data['categorie']= $rubrique;
        $data['per_page'] = $per_page;
        $data['article_lie'] = $articles;
        $data['active'] = $rubrique->libelle;
        $data['titre'] =  $rubrique->libelle." : Tia Tanindrazana";
        $data['nbreponse'] = $per_page;
        $data['page'] = $page;
        $data['filtre'] = array(
            "query" => $query,
            "date_1" => $date_1,
            "date_2"=> $date_2
        );
        $this->homeView('detailcategorie',$data,$data);
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
        $rubrique =$this->rubrique_model->getRubriqueById($id)[0];
        $sous_rubrique = $this->rubrique_model->getSousCategorieByIdMere(10);
        $data['categorie']= $rubrique;
        $data['sarisary'] = $sarisary;
        $data['sous_rubrique'] = $sous_rubrique;
        $data['titre'] =  $rubrique->libelle." : Tia Tanindrazana";
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/detailsarisary',$data);
        $this->load->view('default/templates/footer');
    }
    public function contact(){
        $data = $this->indexData();
        $data['titre'] = "Hitafa aminay : Tia Tanindrazana";
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/contact',$data);
        $this->load->view('default/templates/footer');
    }

    /***Fueilleter journal*/
    public function feuilleter_journal(){
        $data = $this->indexData();
        $data['titre'] = "Hamaky gazety : Tia Tanindrazana";
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/feuilleter_journal',$data);
        $this->load->view('default/templates/footer');
    }
    /***Fueilleter journal*/


    /*Info utile*/
    public function info_utile(){
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
        $associe = $this->infoutilemodel->get();//mitovy sokajy
        $data['associe'] = $associe;
        if(count($info_util)!=0) {
            $data['titre'] = $info_util[0]->titre . " : Tia Tanindrazana";
            $data['info_utile'] = $info_util[0];
        }
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/detail_info_utile',$data);
        $this->load->view('default/templates/footer');
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

    public function page_journal(){
        $this->load->view('default/page_journal');
    }

    public function inscription(){
        $data = $this->indexData();
        $data['titre'] = "Inscription : Tia Tanindrazana";
        $data['typeabonnement'] = $this->abonnementmodel->getTypeAbonnement();
        $data['tarifabonnement'] = $this->abonnementmodel->getTarifAbonnement();
        $this->load->view('default/templates/header',$data);
        $this->load->view('default/inscription',$data);
        $this->load->view('default/templates/footer');
    }
    public function addCommentaire(){
        $nomprenom = $this->input->post('nom');
        $email = $this->input->post('email');
        $commentaire = $this->input->post('commentaire');
        $idarticle = $this->input->post('article');
        $this->load->model('commentairemodel');
        $this->commentairemodel->insert($nomprenom,$email,$commentaire,$idarticle);
    }
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