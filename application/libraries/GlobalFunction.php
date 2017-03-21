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
    }

    public function isFavorisExist($id,$idfavoris){
        $this->CI->load->model('abonneemodel');
        $res = $this->CI->abonneemodel->getFavoris($id,$idfavoris);
        if($res->num_rows()>0){
            return true;
        }
        return false;
    }
}