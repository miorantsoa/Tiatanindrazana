<?php

/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 15/03/2017
 * Time: 10:18
 */
class CantactModel extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function insertCantact($idJournal, $idCategorie, $idadministrateur, $titre, $date ,$extrait, $resume, $contenu, $laune=false, $niveau, $chemin_une,$etat = true){
        $data = array(
            'idjournal'=>  $idJournal,
            'idcategorie'=> $idCategorie,
            'idadministrateur'=> $idadministrateur,
            'dateparution'=> $date,
            'titre'=> $titre,
            'extrait'=> $extrait,
            'resume'=> $resume,
            'contenue'=> $contenu,
            'laune'=> $laune,
            'etatpublication'=> $etat,
            'niveau'=> $niveau,
            'lien_image_une'=> $chemin_une
        );
        $this->db->insert("article",$data);
    }
}