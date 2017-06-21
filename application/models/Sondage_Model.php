<?php

/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 19/06/2017
 * Time: 11:45
 */
class Sondage_Model extends CI_Model
{
    // `idsondage`, `reponse`, `datepublication`
    public function vote($idsondage,$idreponse){
        $data = array(
            'idsondage' => $idsondage,
            'idreponse' => $idreponse
        );
        $this->db->trans_start();
        $this->db->insert("reponse_sondage",$data);

        $this->db->trans_complete();
    }

    public function insertSondage($question,$dateparution){

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

    public function get($id){
        $this->db->where('idsondage',$id);
        $res = $this->db->get('sondage');
        return $res->result();
    }
    public function update($id,$data){
        $this->db->where('idsondage',$id);
        $this->db->update('sondage',$data);
    }

    public function getsondagesimple (){
        $detail_corruption = $this->db->get("sondage");
        return  $detail_corruption->result();
    }

/**    public function get($id,$idcategorie,$sujet,$contenu,$lieu){
        if($id!=null)
            $this->db->where('idcorruption',$id);
        if($idcategorie!=null)
            $this->db->where('idcatcorruption',$idcategorie);
        if($sujet!=null)
            $this->db->like('sujet',$sujet);
        if($contenu!=null)
            $this->db->like('contenue',$contenu);
        if($lieu!=null)
            $this->db->where('lieu',$lieu);
        $corruption = $this->db->get('corruption');
        return $corruption->result();
    }
 **/
    public function get2($publie = null){
        if($publie != null){
            $this->db->where('etat',true);
        }
        $this->db->order_by('datepublication, heurepublication','desc');
        $filactualite = $this->db->get("filactualite");
        return  $filactualite->result();
    }
    public function getLastSondage(){
        $fil= $this->db->query('select * from sondage where dateparution in (select max(dateparution) as dateparution from sondage) ORDER  BY  dateparution DESC ');
        //$fil = $this->db->get();
        return $fil->result();
    }

    public function getvotebyidsondage($idsondage){
        $requet = "SELECT idreponse,COUNT(idreponse) as nbrvote FROM `reponse_sondage` WHERE idsondage= ".$idsondage." GROUP BY idreponse";
        $vote= $this->db->query($requet);
        return $vote->result();
    }

    public function gettypereponse(){
        $filactualite = $this->db->get("reponse");
        return  $filactualite->result();
    }
    public function getresultatsondage(){
        $fil= $this->db->query('select * from reponse_sondage ORDER  BY  reponse');
        //$fil = $this->db->get();
        return $fil->result();
    }

}