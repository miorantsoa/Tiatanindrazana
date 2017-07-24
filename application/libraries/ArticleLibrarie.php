<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 01/03/2017
 * Time: 07:24
 */
class ArticleLibrarie{
    protected $CI;
    public function __construct()    {
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
    }
    public function ajoutArticle($idJournal, $idCategorie, $titre, $date ,$extrait, $resume, $contenu, $laune, $niveau, $chemin_une,$etat,$minlink){
        if($niveau == ""){//Si l'on ne renseigne pas le niveau, on recupère le niveau par defaut du rubrique
            $this->CI->load->model('Rubrique_model');
            $rubrique = $this->CI->rubrique_model->getRubriqueById($idCategorie);
            $niveau = $rubrique->niveau;
        }
        if($idJournal==""){
            $idJournal = null;
        }
        $this->CI->load->model('articlesmodel');
        return $this->CI->articlesmodel->insertArticle($idJournal,$idCategorie, $titre, $date ,$extrait, $resume, $contenu, $laune, $niveau, $chemin_une,$etat,$minlink);
    }
    public function updateArticle($idarticle,$idJournal, $idCategorie, $titre,$date, $extrait, $resume, $contenu, $laune, $niveau, $chemin_une,$etat){
        $data = null;
        //On renseigne seulement les champs qui ont été définie
        $this->CI->load->model('articlesmodel');
        $article = $this->CI->articlesmodel->getById($idarticle);
        if(count($article)!=0){
            $idJournal = $article[0]->idjournal;
        }
        if($idJournal!="")
            $data['idjournal'] = $idJournal;
        if($idCategorie!="")
            $data['idcategorie'] = $idCategorie;
        if($titre!="")
            $data['titre']=$titre;
        if($extrait!="")
            $data['extrait'] = $extrait;
        if($resume!="")
            $data['resume'] = $resume;
        if($contenu!="")
            $data['contenue'] = $contenu;
        if(isset($laune) && $idJournal != null) {
            if ($laune == 1) {
                $une = $this->CI->articlesmodel->getArticlesByJournal($idJournal, true);
                if(count($une)!=0) {
                    $this->updateArticle($une[0]->idarticle, null, null, null, null, null, null, null, false, null, null, null);
                }
                $laune = true;
            }
            $data['laune'] = $laune;
        }
        if($niveau!="")
            $data['niveau']=$niveau;
        if($date!="")
            $data['dateparution'] = $date;
        if($chemin_une!=null && $chemin_une!="")
            $data['lien_image_une'] = $chemin_une;
        if(isset($etat))
            $data['etatpublication'] = $etat;
        $this->CI->load->model('articlesmodel');
        $this->CI->articlesmodel->update($idarticle,$data);
    }
    public  function is_sarisary($id){
        $this->CI->load->model('rubrique_model');
        $sarisary = $this->CI->rubrique_model->getSousCategorieByIdMere(10);
        if($id == 10)
            return true;
        for($i = 0; $i<count($sarisary); $i++){
            if($id == $sarisary[$i]->idcategorie){
                return true;
            }
        }
        return false;
    }
    public function getNbPage($reponseSize, $nbReponse){
        $pages = "";
        if($reponseSize <= $nbReponse)
            return 1;
        else{
            $float =$reponseSize / $nbReponse;
            $pages = $float;
            if(substr($float, strpos($float, '.')+1)){
                $pages = intval($float) + 1;
            }
//            return round(($reponseSize /
            return $pages;
        }
    }
    public function getLimit($page,$per_page){
        if($page == 1){
            return $page;
        }
        $limit = 0;
        for($i = 1; $i<$page; $i++){
            $limit +=$per_page;
        }
        return $limit;
    }
    public function setUne($id){
        $this->CI->load->model('articlesmodel');
        $this->CI->load->model('journal');
        $article = $this->CI->articlesmodel->getById($id)[0];
        $journal = $this->CI->journal->getJournalByDate($article->datepublication)[0];
        $une = $this->CI->articlesmodel->getArticlesByJournal($journal->idjournal,true);
        if($article->laune==false) {
            $this->updateArticle($id, null, null, null, null, null, null, null, true, null, null, null);
            if(count($une)!=0) {
                $this->updateArticle($une[0]->idarticle, null, null, null, null, null, null, null, false, null, null, null);
            }
        }
        else{
            //$idarticle,$idJournal, $idCategorie, $titre,$date, $extrait, $resume, $contenu, $laune, $niveau, $chemin_une,$etat
            $this->updateArticle($id, null, null, null, null, null, null, null, false, null, null, null);
        }
        return $journal->idjournal;
    }
}