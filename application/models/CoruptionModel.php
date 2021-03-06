<?php
/**
 * Created by PhpStorm.
 * User: steave_pc
 * Date: 07/04/2017
 * Time: 10:35
 */
class CoruptionModel extends CI_Model {
    public function __construct(){
        // Call the CI_Model constructor
        parent::__construct();
    }
    public function insertCoruption($idcatcorruption,$datedenonciation,$datefait,$nomdenonciateur,$adressedenonciateur,$telephonedenonciateur,$emaildenonciateur,$sujet,$contenue,$lieu){
/** `corruption`(`idcatcorruption`, `datedenonciation`, `datefait`, `nomdenonciateur`, `adressedenonciateur`, `telephonedenonciateur`, `emaildenonciateur`, `sujet`, `contenue`, `lieu`) */
        $data = array(
            'idcatcorruption' => $idcatcorruption,
            'datedenonciation' => $datedenonciation,
            'datefait' => $datefait,
            'nomdenonciateur' => $nomdenonciateur,
            'adressedenonciateur' => $adressedenonciateur,
            'telephonedenonciateur' => $telephonedenonciateur,
            'emaildenonciateur' => $emaildenonciateur,
            'sujet' => $sujet,
            'contenue' => $contenue,
            'lieu' => $lieu
        );
        $this->db->trans_start();
        $this->db->insert("corruption",$data);
        $id = $this->db->insert_id();
        $this->db->trans_complete();
        return $id;
    }
    public function insertAssoc($idcorruption,$idmedia){
        $data = array(
            'idcorruption' => $idcorruption,
            'idmedia' => $idmedia
        );
        $this->db->insert('assoc_media_corruption',$data);
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
    public function getallcorruption(){
        $corruption = $this->db->get("corruption");
        return  $corruption->result();
    }
    public function getCorruptiondetail(){
        $detail_corruption = $this->db->get("detail_corruption");
        return  $detail_corruption->result();
    }
    public function getCorruptionById($id){
        $this->db->where('idcorruption',$id);
        $categoriecorruption = $this->db->get("detail_corruption");
        return  $categoriecorruption->result();
    }
}