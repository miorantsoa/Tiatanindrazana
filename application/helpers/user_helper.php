<?php
/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 26/05/2017
 * Time: 10:29
 */
function verifierAbonnement($idUtilisateur){
    $CI = & get_instance();
    $CI->load->model('abonneemodel');
    $utilisateur = $CI->abonneemodel->getAbonneeAbonnementById($idUtilisateur);
    if(count($utilisateur)!=0) {
        $fin_abonnement = $utilisateur[0]->datefinabonnement;
        $date_fin = date_create($fin_abonnement);
        $date_now = new DateTime();
        if($date_fin < $date_now){
            fin_abonnement($idUtilisateur, $CI);
            return false;
        }
        return true;
    }
}

/**
 * @param $idUtilisateur iduser
 * @param $CI
 */
function fin_abonnement($idUtilisateur, $CI){
    $CI->load->model('adminmodel');
    $data['statututilisateur'] = 0;
    $fin['idabonnee'] = $idUtilisateur;
    $CI->db->trans_start();
    $CI->adminmodel->delete_activation($idUtilisateur);
    $CI->abonneemodel->updateUtilisateur($idUtilisateur, $data);
    $CI->adminmodel->save_fin_abonnement($fin);
    $CI->db->trans_complete();
    send_fin_abonnement($idUtilisateur);
}

function desactiver_compte($id){
    $CI = & get_instance();
    $CI->load->model('abonneemodel');
    $CI->load->model('adminmodel');
    $data['statututilisateur'] = 0;
    $CI->db->trans_start();
    $CI->adminmodel->delete_activation($id);
    $CI->abonneemodel->updateUtilisateur($id, $data);
    $CI->db->trans_complete();
}

function delete_compte_vide($id){
    $CI = & get_instance();
    $CI->load->model('abonneemodel');
    $CI->load->model('abonnementmodel');
    $CI->load->model('adminmodel');
    $CI->db->trans_start();
    $CI->abonneemodel->delete_paiement($id);
    $CI->abonneemodel->delete_abonnee($id);
    $CI->db->trans_complete();
}

function get_interval($date1){
    return date_diff(date_create(($date1)),date_create(date('Y-m-d')))->format('%a');
}

function uploadImage($inputname,$destination,$name){
     $CI = & get_instance();
     $CI->load->library('upload');
    //$config = $this->configUpload($destination,$name);
    $uploadPath ='./'.$destination;
    $config = null;
    $config['upload_path'] = $uploadPath;
    $config['allowed_types'] = 'gif|jpg|png';
    $config['file_name'] = $name;
    $CI->upload->initialize($config);
    $image=array();
    if (!$CI->upload->do_upload($inputname)) {
        $error = array('error' =>$CI->upload->display_errors());
    }
    else {
        $data = array('upload_data' => $CI->upload->data());
        $image['name'] = $data['upload_data']['file_name'];
        $image['path'] = substr($config['upload_path'],2).'/'. $data['upload_data']['file_name'];
    }
    return $image;
}

function getExtrait($paragraphe){
    $split = preg_split("/[.]+/",$paragraphe);
    return $split[0];
}