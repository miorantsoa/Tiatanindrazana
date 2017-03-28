<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 02/03/2017
 * Time: 14:36
 */
class AbonneeModel extends CI_Model {
    public function __construct(){
        // Call the CI_Model constructor
        parent::__construct();
    }

    public function insertUtilisateur($civilite,$nom,$prenom,$datenaissance,$cin,$dateCin,$lieuCin,$rectoCin,$versoCin,$email,$identifiant,$password,$statuulisateur,$imageprofile){
        $data = array(
            'civilite' => $civilite,
            'nomutilisateur' => $nom,
            'prenomutilisateur' => $prenom,
            'naissanceutilisateur' => $datenaissance,
            'cin' => $cin,
            'datedelivrancecin' => $dateCin,
            'lieudelivrancecin' => $lieuCin,
            'liencin_recto' => $rectoCin,
            'liencin_verso' => $versoCin,
            'emailutilisateur' => $email,
            'identifiant' => $identifiant,
            'motdepasse' => $password,
            'statututilisateur' => $statuulisateur,
            'imageprofile' => $imageprofile,
        );
        $this->db->insert('abonnee',$data);
    }
    public function updateUtilisateur($idabonnee,$data){
        $this->db->where('idabonne',$idabonnee);
        $this->db->update('abonnee',$data);
    }

    public function getAbonnees(){
        $abonnees = $this->db->get('abonnee');
        return $abonnees->result();
    }
    public function connectUser($usermail,$userpassword){
        $abonnee = $this->db-where('emailutilisateur',$usermail);
        $abonnee = $this->db-where('motdepasse',$userpassword);
        return $abonnee->result();
    }
    public function getAbonneeById($id){
        $this->db->where('idabonnee',$id);
        $abonnee = $this->db->get('abonnee');
        return $abonnee->result();
    }

    public function authAbonnee($identifiant,$passsword){
        $this->db->where('identifiant',$identifiant);
        $this->db->where('motdepasse',$passsword);
        $result = $this->db->get('abonnee');
        return $result->num_rows();
    }
    /****Favoris*****/
    public function addFavoris($iduser, $idarticle){
        $data = array(
            "idutilisateur" => $iduser,
            "idarticle" => $idarticle
        );
        $this->db->insert('favoris',$data);
    }
    public function deleteFavoris($iduser,$idarticles){
        $this->db->where('idutilisateur',$iduser);
        $this->db->where('idarticle',$idarticles);
        $this->db->delete('favoris');
    }
    public function getFavoris($iduser,$idfavoris){
        $this->db->select('*');
        $this->db->from('favoris');
        $this->db->join('detail_article', 'favoris.idarticle = detail_article.idarticle');
        $this->db->where('idutilisateur',$iduser);
        if($idfavoris!=null)
            $this->db->where('idfavoris',$idfavoris);
        $favoris = $this->db->get('favoris');
        return $favoris->result();
    }
    /****!Fin Utilisateur*******/



}