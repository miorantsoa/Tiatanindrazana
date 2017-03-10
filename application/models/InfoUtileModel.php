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
    }

    public function update($id,$data){
        $this->db->where('idbeinfo',$id);
        $this->db->update('infoutil',$data);
    }

    public function getInfoUtile($id,$titre,$idcategorie,$contenu,$date1,$date2){
        if($id!=null)
            $this->db->where('idbeinfo',$id);
        if($titre!=null)
            $this->db->where('titre',$titre);
        if($contenu!=null)
            $this->db->like('contenu',$contenu);
        if($date1!=null && $date2!=null)
            $this->db->where('derniermaj BETWEEN "'. date('Y-m-d', strtotime($date1)). '" and "'. date('Y-m-d', strtotime($date2)).'"');
        if($date1!=null && $date2==null){
            $this->db->where('dernieremaj',$date1);
        }
        if($idcategorie!=null)
            $this->db->where('idcatbeinfo');
        $infoutil = $this->db->get('infoutil');
        return $infoutil->result();
    }

    public function getCategorie(){
        $categories = $this->db->get('categorieinfoutile');
        return $categories->result();
    }

}