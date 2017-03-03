<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 03/03/2017
 * Time: 10:48
 */
class InfoUtileModel extends CI_Model {
    public function insert($titre,$idcategorie,$contenu,$lienImage,$copyrightphoto,$lienutile){
        $data = array(
            'titre' => $titre,
            'contenu' => $contenu,
            'idcatbeinfo'=>$idcategorie,
            'lien' => $lienImage,
            'copyrightphoto' => $copyrightphoto,
            'lien' => $lienutile
        );
        $this->db->insert('infoutil',$data);
    }
    public function getInfoUtile($id,$titre,$idcategorie,$contenu){
        if($id!=null)
            $this->db->where('idbeinfo',$id);
        if($titre!=null)
            $this->db->where('titre',$titre);
        if($contenu!=null)
            $this->db->like('contenu',$contenu);
        if($idcategorie!=null)
            $this->db->where('idcatbeinfo');
        $ingoutil = $this->db->get('infoutil');
        return $ingoutil->result();
    }
}