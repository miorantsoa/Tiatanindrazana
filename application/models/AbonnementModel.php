<?php

/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 20/03/2017
 * Time: 16:46
 */
class AbonnementModel extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function insertTypeAbonnement($dataTable){

        $data = array(
            'datepublication' => $dataTable['datepublication'],
            'heurepublication' => $dataTable['heurepublication'],
            'extrait' => $dataTable['extrait'],
            'contenue' => $dataTable['contenue']
        );
        $this->db->trans_start();
        $this->db->insert("typeabonnement",$data);

        $this->db->trans_complete();
    }
    public function delete_abonnement($id){
        $this->db->where('idutilisateur2',$id);
        $this->db->delete('abonnement');
    }
    public function update($id, $data){
        $this->db->where('idabonnement',$id);
        $this->db->update('abonnement',$data);
    }
    public function getTypeAbonnement(){
        $typeabonnement = $this->db->get("typeabonnement");
        return  $typeabonnement->result();
    }
    public function getTypeAbonnementById($id){
        $this->db->where('idtypeabon',$id);
        $typeabonnement = $this->db->get("typeabonnement");
        return  $typeabonnement->result();
    }
    public function getTarifAbonnement(){
        $tarifabonnement = $this->db->get("tarifabonnement");
        return  $tarifabonnement->result();
    }
    public function getTarifAbonnementById($id){
        $this->db->where('idtarif',$id);
        $tarifabonnement = $this->db->get("tarifabonnement");
        return  $tarifabonnement->result();
    }

}