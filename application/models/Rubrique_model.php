<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 25/02/2017
 * Time: 22:29
 */
//create view sous_categorie as SELECT categorie.* ,categorie_mere.idcategorie as idmere, categorie_mere.libelle as catmere from categorie join assoc_sous_categorie on categorie.idcategorie = assoc_sous_categorie.idcategorie2 JOIN categorie_mere on assoc_sous_categorie.idcategorie2 = categorie_mere.idcategorie2
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
    public function getrubriquemere($id){
        $this->db->where('idcategorie2',$id);
        $rubmere = $this->db->get("assoc_sous_categorie");
        return  $rubmere->result();
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
    public function getSousCategorieByIdMere($id){
        $this->db->where('idmere',$id);
        $categories = $this->db->get('sous_categorie');
        return $categories->result();
    }
    public function delete($id){
        $this->db->where('idcategorie',$id);
        $this->db->delete('categorie');
    }

    public function update($id,$data){
        $this->db->where('idcategorie',$id);
        $this->db->update('categorie',$data);
    }
}