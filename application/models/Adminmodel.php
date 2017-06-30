<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 01/06/2017
 * Time: 19:55
 */
class Adminmodel extends CI_Model{
    public function save_activation($data){
        $this->db->insert('activation_compte',$data);
    }

    public function save_fin_abonnement($data){
        $this->db->insert('abonnement_expire',$data);
    }

    public function delete_from_expire($id){
        $this->db->where('idabonnee',$id);
        $this->db->delete('abonnement_expire');
    }

    public function delete_activation($id){
        $this->db->where('idabonnee',$id);
        $this->db->delete('activation_compte');
    }

    public function save_admin($data){
        $this->db->insert('admin',$data);
    }

    public function getListExpire($iduser = null,$civilite = null, $nom=null, $prenom= null, $cin = null,$date1 = null, $date2 = null){
        $this->db->select('abonnee.*,abonnement.datedebutabonnement, abonnement.datefinabonnement','abonnement_expire.*');
        $this->db->from('abonnement_expire');
        $this->db->join('abonnee','abonnee.idutilisateur2 = abonnement_expire.idabonnee');
        $this->db->join('abonnement','abonnement.idutilisateur2 = abonnee.idutilisateur2');
        if($iduser!=null){
            $this->db->where('idutilisateur2',$iduser);
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
        if($date1!=null && $date2!=null)
            $this->db->where('abonnement.datefinabonnement BETWEEN "'. date('Y-m-d', strtotime($date1)). '" and "'. date('Y-m-d', strtotime($date2)).'"');
        if($date1!=null && $date2 == null)
            $this->db->where('abonnement.datefinabonnement >= ',date('Y-m-d', strtotime($date1)));
        if($date1==null && $date2 != null)
            $this->db->where('abonnement.datefinabonnement <= ',date('Y-m-d', strtotime($date2)));
        $this->db->order_by('datefinabonnement','desc');
        $reponses = $this->db->get();
        return $reponses->result();
    }

    public function getListActivation($idadmin = null,$iduser = null,$civilite = null, $nom=null, $prenom= null, $cin = null, $date1 = null, $date2 = null){
        $this->db->select('admin.*,activation_compte.*,abonnee.*,abonnement.datedebutabonnement, abonnement.datefinabonnement');
        $this->db->from('admin');
        $this->db->join('activation_compte','admin.idadministrateur = activation_compte.idadmin');
        $this->db->join('abonnee','abonnee.idutilisateur2 = activation_compte.idabonnee');
        $this->db->join('abonnement','abonnement.idutilisateur2 = abonnee.idutilisateur2');
        if($idadmin){
            $this->db->where('idadmin',$idadmin);
        }
        if($iduser!=null){
            $this->db->where('idutilisateur2',$iduser);
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
        if($date1!=null && $date2!=null)
            $this->db->where('activation_compte.dateactivation BETWEEN "'. date('Y-m-d', strtotime($date1)). '" and "'. date('Y-m-d', strtotime($date2)).'"');
        if($date1!=null && $date2 == null)
            $this->db->where('activation_compte.dateactivation >= ',date('Y-m-d', strtotime($date1)));
        if($date1==null && $date2 != null)
            $this->db->where('activation_compte.dateactivation <= ',date('Y-m-d', strtotime($date2)));
        $this->db->where('statututilisateur',true);
        $this->db->order_by('dateactivation','desc');
//        die($this->db->get_compiled_select());
        $reponses = $this->db->get();
        return $reponses->result();
    }
}