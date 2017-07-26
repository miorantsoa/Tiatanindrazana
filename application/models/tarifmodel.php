<?php

/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 19/06/2017
 * Time: 11:45
 */
class tarifmodel extends CI_Model
{
    public function insert($libelle,$niveau){

        $data = array(
            'libelle' => $libelle,
            'niveau_abonnement' => $niveau
        );
        $this->db->trans_start();
        $this->db->insert("typeabonnement",$data);

        $this->db->trans_complete();
    }
    public function inserttype($idtype,$dateapp,$durreeabonnement,$prixabonnement){

        $data = array(
            'idtypeabon' => $idtype,
            'dateapplication' => $dateapp,
            'durreeabonnement' => $durreeabonnement,
            'prixabonnement' => $prixabonnement

        );
        $this->db->trans_start();
        $this->db->insert("tarifabonnement",$data);

        $this->db->trans_complete();
    }
    public function update($id,$data){
        $this->db->where('idsondage',$id);
        $this->db->update('sondage',$data);
    }
    public function updatetype($id,$data){
        $this->db->where('idtarif',$id);
        $this->db->update('sondage',$data);
    }
    //public function update($id, $contenu, $)
    public function delete($id){
        $this->db->where('idsondage',$id);
        $this->db->delete('sondage');
    }

    public function getbyid($id){
        $this->db->where('idsondage',$id);
        $res = $this->db->get('sondage');
        return $res->result();
    }


    public function getall (){
        $detail_corruption = $this->db->get("sondage");
        return  $detail_corruption->result();
    }
}