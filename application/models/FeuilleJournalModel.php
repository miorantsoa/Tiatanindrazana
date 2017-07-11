<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 29/03/2017
 * Time: 02:16
 */
class FeuilleJournalModel extends CI_Model {
    public function insert($dateparution){
        $data = array();
        $data['dateparution'] = $dateparution;
        $this->db->insert('feuille_journal',$data);
        return $this->db->insert_id();
    }

    public function insertAssoc($idjournal,$idmedia){
        $data = array(
            'idfeuille_journal' => $idjournal,
            'idmedia' => $idmedia
        );
        $this->db->insert('assoc_feuille_image',$data);
    }
    public function insertMedias($type,$nommedia,$cheminmedia,$creditmedia,$alt,$min){
        $data = array();
        $data['typemedia'] = $type;
        $data['nommedia'] = $nommedia;
        $data['cheminmedia'] = $cheminmedia;
        $data['creditmedia'] = $creditmedia;
        $data['alt'] = $alt;
        $data['min'] = $min;
        $this->db->insert('media',$data);
        return $this->db->insert_id();
    }
    public function get($idfeuille=null,$date1=null,$date2=null,$limit=null,$start=null,$order="desc"){
        $this->create_query();
        $this->db->limit($limit,$start);
        if($idfeuille!=null)
            $this->db->where('feuille_journal.idfeuille_journal',$idfeuille);
        if($date1!=null && $date2!=null)
            $this->db->where('dateparution BETWEEN "'. date('Y-m-d', strtotime($date1)). '" and "'. date('Y-m-d', strtotime($date2)).'"');
        if($date1!=null && $date2 == null)
            $this->db->where('dateparution >= ',date('Y-m-d', strtotime($date1)));
        if($date1==null && $date2 != null)
            $this->db->where('dateparution <= ',date('Y-m-d', strtotime($date2)));
        $this->db->group_by('dateparution,assoc_feuille_image.idfeuille_journal');
        $this->db->order_by('dateparution',$order);
        $this->db->order_by('nommedia');
        $journal = $this->db->get();
        return $journal->result();
    }
    public function getDetail($id = null, $date = null){
        $this->create_query();
        if($id!=null) {
            $this->db->where('feuille_journal.idfeuille_journal', $id);
        }
        if($date != null){
            $this->db->where('dateparution',date('Y-m-d', strtotime($date)));
        }
        $this->db->order_by('nommedia','asc');
        $detail = $this->db->get();
        return $detail->result();
    }
    public function getLast(){
        $this->create_query();
        $this->db->order_by('dateparution','desc');
        $this->db->limit(1);
        $this->db->group_by('dateparution,assoc_feuille_image.idfeuille_journal');
        $this->db->order_by('nommedia');
        $last = $this->db->get();
        return $last->result();
    }

    public function getLastJournal(){
        $this->create_query();
        $this->db->where('dateparution = (select max(dateparution) from feuille_journal)');
        $this->db->order_by('dateparution','desc');
        $last = $this->db->get();
        return $last->result();
    }
    public function delete($id){
        $this->db->trans_start();
        $this->db->where('idmedia',$id);
        $this->db->delete('assoc_feuille_image');
        $this->db->where('idmedia',$id);
        $this->db->delete('media');
        $this->db->trans_complete();
    }

    public function editImage($id,$data){
        $this->db->where('idmedia',$id);
        $this->db->update('media',$data);
    }

    public function getSingleImage($idmedia){
        $this->db->where('idmedia',$idmedia);
        $rep = $this->db->get('media');
        return $rep->result();
    }

    public function create_query(){
        $this->db->select('*');
        $this->db->from('feuille_journal');
        $this->db->join('assoc_feuille_image','feuille_journal.idfeuille_journal = assoc_feuille_image.idfeuille_journal');
        $this->db->join('media','assoc_feuille_image.idmedia = media.idmedia');
    }
}