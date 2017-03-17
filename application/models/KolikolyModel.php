<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 15/03/2017
 * Time: 21:35
 */
class KolikolyModel extends CI_Model{
    public function insert($idcategorie,$datedenonciation, $dateFait, $nomDenonciateur,$adresseDenonciateur,$telephone,$email,$sujet,$contenu,$lieu){
        $data = array(
            "idcatcorruption"=>$idcategorie,
            "datedenonciation"=>$datedenonciation,
            "datefait"=>$dateFait,
            "nomdenonciateur"=>$nomDenonciateur,
            "adressedenonciateur"=>$adresseDenonciateur,
            "telephonedenonciateur"=>$telephone,
            "emaildenonciateur"=>$email,
            "sujet"=>$sujet,
            "contenue"=>$contenu,
            "lieu"=>$lieu
        );
        $this->db->insert('corruption',$data);
    }

    public function get($id,$idcategorie,$sujet,$contenu,$lieu){
        if($id!=null)
            $this->db->where('idcorruption',$id);
        if($idcategorie!=null)
            $this->db->where('idcatcorruption',$idcategorie);
        if($sujet!=null)
            $this->db->like('sujet',$sujet);
        if($contenu!=null)
            $this->db->like('contenue',$contenu);
        if($lieu!=null)
            $this->db->where('lieu',$lieu);
        $corruption = $this->db->get('corruption');
        return $corruption->result();
    }
    public function  delete($id){
        $this->db->where('idcorruption',$id);
        $this->db->delete('corruption');
    }
}