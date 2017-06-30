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

    public function insert($data){
        $this->db->insert('abonnee',$data);
        return $this->db->insert_id();
    }

    public function delete_abonnee($id){
        $this->db->where('idutilisateur2',$id);
        $this->db->delete('abonnee');
    }

    public function insertInfoPayement($data){
        $this->db->insert('info_payement',$data);
    }

    public function delete_paiement($id){
        $this->db->where('idabonnee',$id);
        $this->db->delete('info_payement');
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

    public function updateAssocAbonnement($id,$data){
        $this->db->where('idutilisateur2',$id);
        $this->db->update('abonnee',$data);
    }
    public function updateUtilisateur($idabonnee,$data){
        $this->db->where('idutilisateur2',$idabonnee);
        $this->db->update('abonnee',$data);
    }

    public function getUserByEmail($email){
        $this->db->where('emailutilisateur',$email);
        $res = $this->db->get('abonnee');
        return $res->result();
    }

    public function getAbonnees(){
        $abonnees = $this->db->get('abonnee');
        return $abonnees->result();
    }
    public function connectUser($usermail,$userpassword){
        $this->create_query();
        $this->db->where('emailutilisateur',$usermail);
        $this->db->where('motdepasse',$userpassword);
        $this->db->where('statututilisateur',1);
        $result = $this->db->get();
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
    public function getAbonneeAbonnementById($id){
        $this->create_query();
        $this->db->where('abonnee.idutilisateur2',$id);
        $abonnee = $this->db->get();
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
    public function getFavoris($iduser,$idarticle = null){
        $this->db->select('
            article.idarticle,
            article.titre,
            article.idcategorie,
            article.contenue,
            article.niveau,
            article.resume,
            article.etatpublication,
            article.extrait,
            article.laune,
            article.lien_image_une,
            article.url_tag,
            article.titre,
            categorie.libelle,
            categorie.niveau,
            article.dateparution,
            favoris.*');
        $this->db->from('favoris');
        $this->db->join('article', 'favoris.idarticle = article.idarticle');
        $this->db->join('categorie', 'article.idcategorie = categorie.idcategorie');
        $this->db->where('idutilisateur',$iduser);
        $this->db->where('etatpublication',1);
        if($idarticle!=null)
            $this->db->where('favoris.idarticle',$idarticle);
//        var_dump($this->db->get_compiled_select());
        $favoris = $this->db->get();
        return $favoris->result();
    }
    /****!Fin Utilisateur*******/

    public function getAbonnementUtilisateur($iduser = null,$civilite = null, $nom=null, $prenom= null, $cin = null, $etat = null){
        $this->create_query();
        if($iduser!=null){
            $this->db->where('abonnee.idutilisateur2',$iduser);
        }
        if($civilite != null){
            $this->db->where('civilite',$civilite);
        }
        if($nom != null){
            $this->db->like('nomutilisateur', $nom);
        }
        if($prenom != null){
            $this->db->like('prenomutilisateur', $prenom);
        }
        if($cin != null){
            $this->db->where('cin',$cin);
        }
        if($etat!= null && $etat!=-1){
            $this->db->where('statututilisateur',$etat);
        }
        if ($etat == -1){
            $this->db->where('statututilisateur',false);
        }
//        var_dump($this->db->get_compiled_select('detail_abonnement'));die();
        $abonnee = $this->db->get();
        return $abonnee->result();
    }

    public function getInfoPayementAbonnee($iduser = null, $civilite = null, $nom = null, $prenom = null, $cin = null, $etat= null, $date1=null, $date2=null){
        $this->create_query();
        if($iduser!=null){
            $this->db->where('abonnee.idutilisateur2',$iduser);
        }
        if($civilite != null){
            $this->db->where('civilite',$civilite);
        }
        if($nom != null){
            $this->db->like('nomutilisateur', $nom);
        }
        if($prenom != null){
            $this->db->like('prenomutilisateur', $prenom);
        }
        if($cin != null){
            $this->db->where('cin',$cin);
        }
        if($etat!= null && $etat!=-1){
            $this->db->where('statututilisateur',$etat);
        }
        if($date1!=null && $date2!=null)
            $this->db->where('abonnement.datedebutabonnement BETWEEN "'. date('Y-m-d', strtotime($date1)). '" and "'. date('Y-m-d', strtotime($date2)).'"');
        if($date1!=null && $date2 == null)
            $this->db->where('abonnement.datedebutabonnement >= ',date('Y-m-d', strtotime($date1)));
        if($date1==null && $date2 != null)
            $this->db->where('abonnement.datedebutabonnement <= ',date('Y-m-d', strtotime($date2)));
        if ($etat == -1){
            $this->db->where('statututilisateur',false);
        }
//        echo ($this->db->get_compiled_select());die();
        $abonnee = $this->db->get();
        return $abonnee->result();
    }

    public function create_query()    {
        $this->db->select('numero, trans_id, abonnee.*,typeabonnement.libelle as nom_abonnement,abonnement.idabonnement, abonnement.idtypeabon,abonnement.datedebutabonnement, abonnement.datefinabonnement,typeabonnement.*,tarifabonnement.prixabonnement,tarifabonnement.durreeabonnement');
        $this->db->from('abonnee');
        $this->db->join("info_payement", "abonnee.idutilisateur2 = info_payement.idabonnee");
        $this->db->join("abonnement", "abonnee.idutilisateur2 = abonnement.idutilisateur2");
        $this->db->join("tarifabonnement", "tarifabonnement.idtarif = abonnement.idtypeabon");
        $this->db->join("typeabonnement", "typeabonnement.idtypeabon = tarifabonnement.idtypeabon");
    }

}