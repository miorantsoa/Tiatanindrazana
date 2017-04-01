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
    public function insertMedias($type,$nommedia,$cheminmedia,$creditmedia,$alt){
        $data = array();
        $data['typemedia'] = $type;
        $data['nommedia'] = $nommedia;
        $data['cheminmedia'] = $cheminmedia;
        $data['creditmedia'] = $creditmedia;
        $data['alt'] = $alt;
        $this->db->insert('media',$data);
        return $this->db->insert_id();
    }
    public function get($idfeuille=null,$date1=null,$date2=null,$limit=null,$start=null,$order="desc"){
        $this->db->limit($limit,$start);
        if($idfeuille!=null)
            $this->db->where('idfeuille_journal',$idfeuille);
        if($date1!=null && $date2!=null)
            $this->db->where('dateparution BETWEEN "'. date('Y-m-d', strtotime($date1)). '" and "'. date('Y-m-d', strtotime($date2)).'"');
        if($date1!=null && $date2 == null)
            $this->db->where('dateparution >= ',date('Y-m-d', strtotime($date1)));
        if($date1==null && $date2 != null)
            $this->db->where('dateparution <= ',date('Y-m-d', strtotime($date2)));
        $this->db->order_by('dateparution',$order);
        $journal = $this->db->get('couverture_feuille');
        return $journal->result();
    }
    public function getDetail($id){
        $this->db->where('idfeuille_journal',$id);
        $detail = $this->db->get('detail_feuille_journal');
        return $detail->result();
    }
    public function getLast(){
        $this->db->order_by('dateparution','desc');
        $this->db->limit(1);
        $last = $this->db->get('couverture_feuille');
        return $last->result();
    }
}