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
            $data['statututilisateur'] = 0;
            $CI->abonneemodel->updateUtilisateur($idUtilisateur,$data);
            return false;
        }
        return true;
    }
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
        var_dump($error);
    }
    else {
        $data = array('upload_data' => $CI->upload->data());
        $image['name'] = $data['upload_data']['file_name'];
        $image['path'] = substr($config['upload_path'],2).'/'. $data['upload_data']['file_name'];
    }
    return $image;
}