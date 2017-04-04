<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 15/03/2017
 * Time: 16:27
 */
class CommentaireModel extends CI_Model{
    public function insert($nomprenom,$email,$commentaire,$idarticle){
        $data = array(
            "nomprenom" => $nomprenom,
            "email" => $email,
            "datecommentaire" => date('Y-m-d H:M'),
            "idarticle" => $idarticle,
            "commentaire" => $commentaire
        );
        $this->db->insert("commentaire",$data);
    }

    public function get($id=null,$idarticle=null,$nomprenom=null){
        $this->db->select('nomprenom,email,commentaire,datecommentaire');
        $this->db->from('commentaire');
        $this->db->join('article', 'commentaire.idarticle = article.idarticle');
        if($id!=null)
            $this->db->where('idcommentaire',$id);
        if($idarticle!=null)
            $this->db->where('article.idarticle',$idarticle);
        if($nomprenom!=null)
            $this->db->where('nomprenom',$nomprenom);
        $comment = $this->db->get();
        return $comment->result();
    }
    public function delete($id){
        $this->db->where('idcommentaire',$id);
        $this->db->delete('commentaire');
    }
}