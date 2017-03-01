<?php
/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 26/02/2017
 * Time: 12:40
 */
class Journal extends CI_Model{
    public function insertJournal($numeroparution, $chemin_couverture,$dateparution){
        $data = array(
            'numeroparution' => $numeroparution,
            'datepublication' => $dateparution,
            'liencouverture' => $chemin_couverture
        );
        $this->db->insert('journal',$data);
    }
    public function update($idjournal,$data){
        $this->db->where('idjournal',$idjournal);
        $this->db->update('journal',$data);
    }
    public function deleteJournal($id){
        $this->db->where('idjournal',$id);
        $this->db->delete('journal');
    }
    public function getById($id){
        $this->db->where('idjournal',$id);
        $journal = $this->db->get('journal');
        return $journal->result();
    }
    public function getJournal(){
        $journal = $this->db->get('journal');
        return $journal->result();
    }
    public function getLastJournal(){
        $this->db->order_by('dateparution','DESC');
        $journal = $this->db->get('journal');
        return $journal->reslult();
    }
}