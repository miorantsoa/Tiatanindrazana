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
    public function insertPub($datedebutdiffusion,$datefindiffusion,$alt,$position,$lienredirection,$lienimage,$commentaire){

        $data = array(
            'datedebutdiffusion' => $datedebutdiffusion,
            'datefindiffusion' => $datefindiffusion,
            'alt' => $alt,
            'position' => $position,
            'lienredirection' => $lienredirection,
            'lienimage' => $lienimage,
            'commentaire' => $commentaire
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
        return  $publicite->result();
    }
    public function getPubByPosition($position){
        $this->db->where('position',$position);
        $this->db->where('curdate() BETWEEN datedebutdiffusion and datefindiffusion');
        $pub = $this->db->get('publicite');
        return $pub->result();
    }

    public function delete($id){
        $this->db->where('idpublicite',$id);
        $this->db->delete('publicite');
    }
    public function getLastPub($position){
        $this->db->where('position',$position);
        $this->db->where("datefindiffusion in (select max(datefindiffusion) as datediffusion from publicite where position = $position)");
        $pub = $this->db->get('publicite');
        return $pub->result();
    }

}