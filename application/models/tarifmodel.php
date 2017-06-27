<?php

/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 19/06/2017
 * Time: 11:45
 */
class tarifmodel extends CI_Model
{
    public function insert($question,$dateparution){

        $data = array(
            'question' => $question,
            'dateparution' => $dateparution
        );
        $this->db->trans_start();
        $this->db->insert("sondage",$data);

        $this->db->trans_complete();
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
    public function update($id,$data){
        $this->db->where('idsondage',$id);
        $this->db->update('sondage',$data);
    }

    public function getall (){
        $detail_corruption = $this->db->get("sondage");
        return  $detail_corruption->result();
    }
}