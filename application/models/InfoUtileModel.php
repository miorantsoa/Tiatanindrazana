<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 03/03/2017
 * Time: 10:48
 */
//create view sous_categorie_info as SELECT categorieinfoutile.*,categorie_mere_info.idcatbeinfo as idmere, categorie_mere_info.libelle as catmere  from categorieinfoutile join assoc_cat_souscat on assoc_cat_souscat.cat_idcatbeinfo= categorieinfoutile.idcatbeinfo JOIN categorie_mere_info on categorie_mere_info.idcatbeinfo = assoc_cat_souscat.idcatbeinfo
//create view info_utile_categorie as select categorieinfoutile.*,categorie_mere_info.idcatbeinfo as idmere, categorie_mere_info.libelle as catmere from categorieinfoutile left JOIN assoc_cat_souscat ON categorieinfoutile.idcatbeinfo = assoc_cat_souscat.cat_idcatbeinfo left join categorie_mere_info on assoc_cat_souscat.idcatbeinfo = categorie_mere_info.idcatbeinfo
//create view detail_info_utile as select infoutil.*,info_utile_categorie.libelle,info_utile_categorie.catmere from infoutil join info_utile_categorie on infoutil.idcatbeinfo = info_utile_categorie.idcatbeinfo
class InfoUtileModel extends CI_Model {
    public function insert($data){
        $this->db->insert('infoutil',$data);
        return $this->db->insert_id();
    }

    public function update($id,$data){
        $this->db->where('idbeinfo',$id);
        $this->db->update('infoutil',$data);
    }

    public function get($id=null,$titre=null,$idcategorie=null,$contenu=null,$ordre='DESC',$date1=null,$date2=null,$date = null, $publie = null){
        if($id!=null)
            $this->db->where('idbeinfo',$id);
        if($titre!=null && $contenu!=null){
            $this->db->like('titre',$titre);
            $this->db->or_like('contenue',$contenu);
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
            $this->db->where('idcatbeinfo', $idcategorie);
            $this->db->or_where('idmere', $idcategorie);
        }
        if($date!=null){
            $this->db->where('dernieremaj', $date);
        }
        if($publie != null){
            $this->db->where('publie',$publie);
        }
        $this->db->order_by('dernieremaj',$ordre);
        $infoutil = $this->db->get('detail_info_utile');
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

}