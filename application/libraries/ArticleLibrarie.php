<?php

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
        if($niveau == ""){
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
}