<?php
/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 02/03/2017
 * Time: 20:46
 */

class PubModel extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function insertPub($dataTable){

        $data = array(
            'datedebutdiffusion' => $dataTable['datedebutdiffusion'],
            'datefindiffusion' => $dataTable['datefindiffusion'],
            'alt' => $dataTable['alt'],
            'lienredirection' => $dataTable['lienredirection'],
            'lienimage' => $dataTable['lienimage']
        );
        $this->db->trans_start();
        $this->db->insert("publicite",$data);

        $this->db->trans_complete();
    }
    public function getPub(){
        $publicite = $this->db->get("publicite");
        return  $publicite->result();
    }
    public function getPubById($id){
        $this->db->where('idpublicite',$id);
        $publicite= $this->db->get("publicite");
        return  $publicite>result();
    }

}