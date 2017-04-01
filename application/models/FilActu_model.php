<?php
/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 02/03/2017
 * Time: 17:10
 */

class FilActu_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function insertFilActu($dataTable){

        $data = array(
            'datepublication' => $dataTable['datepublication'],
            'heurepublication' => $dataTable['heurepublication'],
            'extrait' => $dataTable['extrait'],
            'contenue' => $dataTable['contenue']
        );
        $this->db->trans_start();
        $this->db->insert("filactualite",$data);

        $this->db->trans_complete();
    }
    public function getFilActu(){
        $this->db->order_by('datepublication, heurepublication','desc');
        $filactualite = $this->db->get("filactualite");
        return  $filactualite->result();
    }

    public function getLastFil(){
        $fil= $this->db->query('select * from filactualite where datepublication in (select max(datepublication) as datepublication from filactualite)');
        //$fil = $this->db->get();
        return $fil->result();
    }
    public function getJ2Fil(){
        $fil= $this->db->query('select * from filactualite where datepublication in (select max(datepublication)-2 as datepublication from filactualite)');
        //$fil = $this->db->get();
        return $fil->result();
    }
    public function getFilActuById($id){
        $this->db->where('idfilactualite',$id);
        $filactualite = $this->db->get("filactualite");
        return  $filactualite->result();
    }

}