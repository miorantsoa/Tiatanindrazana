<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 25/02/2017
 * Time: 22:29
 */
class Rubrique_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function insertRubrique($dataTable){
        $rang = 1;
        if($dataTable['rubrique_mere'] !=""){
            $rang = 2;
        }
        $data = array(
            'libelle' => $dataTable['libelle'],
            'niveau' => $dataTable['niveau'],
            'rang_cat' => $rang
        );
        $this->db->trans_start();
        $this->db->insert("categorie",$data);

        if($dataTable['rubrique_mere'] !=""){
            $id_cat2= $this->db->insert_id();
            $data_assoc = array(
                'idcategorie1'=>$dataTable['rubrique_mere'],
                'idcategorie2'=>$id_cat2
            );
            $this->db->insert("assoc_sous_categorie",$data_assoc);
        }
        $this->db->trans_complete();
    }
    public function getRubrique(){
        $rubrique = $this->db->get("categorie");
        return  $rubrique->result();
    }
    public function getRubriqueById($id){
        $this->db->where('idcategorie',$id);
        $rubrique = $this->db->get("categorie");
        return  $rubrique->result();
    }
    public function getFirstRang(){
        $this->db->where('rang_cat',1);
        $categorie = $this->db->get('categorie');
        return $categorie->result();
    }

}