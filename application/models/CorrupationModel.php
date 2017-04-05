<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 05/04/2017
 * Time: 07:41
 */
class CorrupationModel extends CI_Model{
    public function save($id, $idcorruption, $nom,$datedenonciation, $datefait,$addressedenociateur,$telephone,$email,$sujet,$contenu,$lieu){
        $data = array(
            'idcorruption' => $id,
            'idcatcorruption' => $idcorruption,
            'datefait' => $datefait,
            'datedenonciation'=>$datedenonciation,
            'nomdenonciateur'=>$nom,
            'addressedenonciateur'=>$addressedenociateur,
            'telehonedenonciateur'=>$telephone,
            'emaildenonciateur'=>$email,
            'sujet'=>$sujet,
            'contenue'=>$contenu,
            'lieu'=>$lieu
        );
        $this->db->insert('corruption',$data);
    }
    public function save_fichier_corruption($idcorrutpion,$hemeinfichier){
        $data = array('idcorruption'=>$idcorrutpion);
    }

}