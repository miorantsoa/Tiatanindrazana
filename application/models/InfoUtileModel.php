<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 03/03/2017
 * Time: 10:48
 */
class InfoUtileModel extends CI_Model {
    public function insert($data){
        $this->db->insert('infoutil',$data);
        return $this->db->insert_id();
    }

    public function update($id,$data){
        $this->db->where('idbeinfo',$id);
        $this->db->update('infoutil',$data);
    }

    public function get($id=null,$titre=null,$idcategorie=null,$contenu=null,$ordre='DESC',$date1=null,$date2=null,$date = null, $publie = true){
        $this->create_query();
        if($publie == true){
            $this->db->where('publie',$publie);
        }
        if($id!=null)
            $this->db->where('idbeinfo',$id);
        if($titre!=null && $contenu!=null){
            $this->db->where("(titre LIKE '%$titre%' OR contenue LIKE '%$contenu%')");
        }
        if($titre!=null && $contenu==null )
            $this->db->like('titre',$titre);
        if($contenu!=null && $titre==null)
            $this->db->like('contenue',$contenu);
        if($date1!=null && $date2!=null)
            $this->db->where('dernieremaj BETWEEN "'. date('Y-m-d', strtotime($date1)). '" and "'. date('Y-m-d', strtotime($date2)).'"');
        if($date1!=null && $date2==null){
            $this->db->where('dernieremaj',$date1);
        }
        if($idcategorie!=null) {
            $this->db->where("(infoutil.idcatbeinfo = $idcategorie or assoc_cat_souscat.idcatbeinfo = $idcategorie");
        }
        if($date!=null){
            $this->db->where('dernieremaj', $date);
        }
        $this->db->order_by('dernieremaj',$ordre);
        $infoutil = $this->db->get();
        return $infoutil->result();
    }

    public function delete($id){
        $this->db->where('idbeinfo',$id);
        $this->db->delete('infoutil');
    }

    public function getCategorie($id=null,$niveau = null){//Selection de tout les rubriques mères
        if($id!=null){
            $this->db->where('idcatbeinfo',$id);
        }
        if($niveau!=null){
            $this->db->where('niveau',$niveau);
        }
        $categories = $this->db->get('info_utile_categorie');
        return $categories->result();
    }
    public function getSousCategorieByIdMere($id){
        $this->db->where('idmere',$id);
        $categorie = $this->db->get('info_utile_categorie');
        return $categorie->result();
    }
    public function create_query(){
       $this->db->select('infoutil.*,categorieinfoutile.libelle, categorieinfoutile.idcatbeinfo, assoc_cat_souscat.idcatbeinfo as catmere');
       $this->db->from('infoutil');
       $this->db->join('categorieinfoutile','infoutil.idcatbeinfo = categorieinfoutile.idcatbeinfo');
       $this->db->join('assoc_cat_souscat','categorieinfoutile.idcatbeinfo = assoc_cat_souscat.cat_idcatbeinfo','left');
    }

}