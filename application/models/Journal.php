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
    public function getJournalByDate($date){
        $this->db->where('datepublication',date('Y-m-d', strtotime($date)));
        //$sql = $this->db->get_compiled_select('journal');
        //var_dump($sql);
        $journal = $this->db->get('journal');
        return $journal->result();
    }
    public function get($id,$numparution,$date1,$date2,$ordre = 'DESC',$limit=null,$start=null){//utiliser pour recherche avancé dans le journal
        $this->db->limit($limit,$start);
        if($id!=null){
            $this->db->where('idjournal',$id);
        }
        if($numparution!=null)
            $this->db->where('numeroparution',$numparution);

        /*if($date1!=null && $date2 == null)
            $date2 = date();
            $this->db->where('datepublication < ',$date1);*/

        if($date1!=null && $date2!=null)
            $this->db->where('datepublication BETWEEN "'. date('Y-m-d', strtotime($date1)). '" and "'. date('Y-m-d', strtotime($date2)).'"');
        $this->db->order_by('datepublication',$ordre);
        $journal = $this->db->get('journal');
        return $journal->result();
    }
    public function getLastJournal(){
        $this->db->order_by('datepublication','DESC');
        $journal = $this->db->get('journal');
        return $journal->result();
    }
    //besoin d'une vue liant journal medias feuille journal -> view feuilles_journal
    //create view feuilles_journal as select * from  journal join feuille_journal on journal.idjournal = feuille_journal.idjournal join medias on feuille_journal.idmedias = medias.idmedias
    //La fonction consiste à avoir le journal du jour
    public function  getJournalDuJour(){
        $this->db->where('datepublication',currdate());
        $pages_journal = $this->db->get('feuilles_journal');
        return $pages_journal->result();
    }
}