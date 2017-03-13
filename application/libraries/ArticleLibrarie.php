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
    public function ajoutArticle($idJournal, $idCategorie, $idadministrateur, $titre, $date ,$extrait, $resume, $contenu, $laune, $niveau, $chemin_une,$etat){
        if($niveau == ""){//Si l'on ne renseigne pas le niveau, on recupère le niveau par defaut du rubrique
            $this->CI->load->model('Rubrique_model');
            $rubrique = $this->CI->rubrique_model->getRubriqueById($idCategorie);
            $niveau = $rubrique->niveau;
        }
        if($idJournal==""){
            $idJournal = null;
        }
        $this->CI->load->model('articlesmodel');
        $this->CI->articlesmodel->insertArticle($idJournal,$idCategorie, $idadministrateur, $titre, $date ,$extrait, $resume, $contenu, $laune, $niveau, $chemin_une,$etat);
    }
    public function updateArticle($idarticle,$idJournal, $idCategorie, $titre,$date, $extrait, $resume, $contenu, $laune, $niveau, $chemin_une,$etat){
        $data = null;
        //On renseigne seulement les champs qui ont été définie
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
        if($laune!="" && $laune!=null)
            $data['laune'] = $laune;
        if($niveau!="")
            $data['niveau']=$niveau;
        if($date!="")
            $data['dateparution'] = $date;
        if($chemin_une!=null && $chemin_une!="")
            $data['lien_image_une'] = $chemin_une;
        if($etat!="" && $etat!=null)
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
           if($reponseSize % $nbReponse!=0){
               $pages = ($reponseSize / $nbReponse) + 1;
               return $pages;
           }
           else{
               return $reponseSize / $nbReponse;
           }

        }
    }
}