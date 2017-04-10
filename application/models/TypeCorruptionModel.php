<?php

/**
 * Created by PhpStorm.
 * User: steave_pc
 * Date: 07/04/2017
 * Time: 10:50
 */
class TypeCorruptionModel extends CI_Model
{
    public function __construct(){
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function insertTypeCorruption($libelle){

        $data = array(
            'datepublication' => $libelle,

        );
        $this->db->trans_start();
        $this->db->insert("categoriecorruption",$data);

        $this->db->trans_complete();
    }
    public function getTypeCorruption(){
        $categoriecorruption = $this->db->get("categoriecorruption");
        return  $categoriecorruption->result();
    }
    public function getTypeCorruptionById($id){
        $this->db->where('idcatcorruption',$id);
        $categoriecorruption = $this->db->get("categoriecorruption");
        return  $categoriecorruption->result();
    }

}