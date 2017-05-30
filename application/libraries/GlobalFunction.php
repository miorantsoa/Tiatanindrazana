<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 15/03/2017
 * Time: 17:48
 */
class GlobalFunction{
    protected $CI;
    public function __construct(){
        $this->CI =& get_instance();
        $this->CI->load->library('upload');
    }

    public function isFavorisExist($iduser,$idarticle){
        $this->CI->load->model('abonneemodel');
        $res = $this->CI->abonneemodel->getFavoris($iduser,$idarticle);
        if(count($res)>0){
            return true;
        }
        else{
            return false;
        }
    }
    public function uploadImage($inputname,$destination,$name){
        //$config = $this->configUpload($destination,$name);
        $uploadPath ='./'.$destination;
        $config = null;
        $config['upload_path'] = $uploadPath;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_name'] = $name;
        $this->CI->upload->initialize($config);
        $image=array();
        if (!$this->CI->upload->do_upload($inputname)) {
            $error = array('error' => $this->CI->upload->display_errors());
            var_dump($error);
        }
        else {
            $data = array('upload_data' => $this->CI->upload->data());
            $image['name'] = $data['upload_data']['file_name'];
            $image['path'] = substr($config['upload_path'],2).'/'. $data['upload_data']['file_name'];
        }
        return $image;
    }
    public function configUpload($destination,$name){
        $config['upload_path']   = './'.$destination;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 8000;
        $config['max_width']     = 2024;
        $config['max_height']    = 1768;
        $config['file_name'] = $name;
        return $config;
    }
}