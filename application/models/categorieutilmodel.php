<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 25/02/2017
 * Time: 22:29
 */
//create view sous_categorie as SELECT categorie.* ,categorie_mere.idcategorie as idmere, categorie_mere.libelle as catmere from categorie join assoc_sous_categorie on categorie.idcategorie = assoc_sous_categorie.idcategorie2 JOIN categorie_mere on assoc_sous_categorie.idcategorie2 = categorie_mere.idcategorie2
class categorieutilmodel extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function insert( $libelle, $niveau){
        $data = array(
            'libelle' => $libelle,
            'niveau' => $niveau
        );
        $this->db->trans_start();
        $this->db->insert("categorieinfoutile",$data);

        $this->db->trans_complete();
    }
    public function update($id,$data){
        $this->db->where('idcatbeinfo',$id);
        $this->db->update('categorieinfoutile',$data);
    }
    public function get(){
        $categorieinfoutile = $this->db->get("categorieinfoutile");
        return  $categorieinfoutile->result();
    }
    public function getcategorieinfoutileById($id){
        $this->db->where('idcatbeinfo',$id);
        $rubrique = $this->db->get("categorieinfoutile");
        return  $rubrique->result();
    }
    public function getFirstRang(){
        $this->db->where('rang_cat',1);
        $categorie = $this->db->get('categorie');
        return $categorie->result();
    }
    public function delete($id){
        $this->db->where('idcatbeinfo',$id);
        $this->db->delete('categorieinfoutile');
    }

}