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
        return $this->db->insert_id();
    }
    /** `idabonnement`, `idtypeabon`, `idutilisateur2`, `datedebutabonnement`, `datefinabonnement` */
    public function insertAssocitationAbonnement($idtypeabon, $idutilisateur, $datedebutabonnement, $datefinabonnement){
        $data = array(
            'idtypeabon' => $idtypeabon,
            'idutilisateur2' => $idutilisateur,
            'datedebutabonnement' => $datedebutabonnement,
            'datefinabonnement' => $datefinabonnement
        );
        $this->db->insert('abonnement',$data);
    }

    public function updateUtilisateur($idabonnee,$data){
        $this->db->where('idutilisateur2',$idabonnee);
        $this->db->update('abonnee',$data);
    }

    public function getAbonnees(){
        $abonnees = $this->db->get('abonnee');
        return $abonnees->result();
    }
    public function connectUser($usermail,$userpassword){
        $this->db->where('emailutilisateur',$usermail);
        $this->db->where('motdepasse',$userpassword);
        $result = $this->db->get('detail_abonnement');
        return $result->result();
    }
    public function connect_admin($identifiant, $password){
        $this->db->where('identifiant',$identifiant);
        $this->db->where('motdepasse',$password);
        $result = $this->db->get('admin');
        return $result->result();
    }

    public function getAbonneeById($id){
        $this->db->where('idutilisateur2',$id);
        $abonnee = $this->db->get('abonnee');
        return $abonnee->result();
    }

    public function authAbonnee($identifiant,$passsword){
        $this->db->where('identifiant',$identifiant);
        $this->db->where('motdepasse',$passsword);
        $result = $this->db->get('abonnee');
        return $result->num_rows();
    }

    public function userUpdate($data){

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
    public function getFavoris($iduser,$idarticle){
        $this->db->select('*');
        $this->db->from('favoris');
        $this->db->join('detail_article', 'favoris.idarticle = detail_article.idarticle');
        $this->db->where('idutilisateur',$iduser);
        if($idarticle!=null)
            $this->db->where('favoris.idarticle',$idarticle);
        $favoris = $this->db->get();
        return $favoris->result();
    }
    /****!Fin Utilisateur*******/



}