<?php

/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 18/07/2017
 * Time: 14:39
 */
class RedirectionController extends CI_Controller{
    public function redirection ($URL){
        $this->load->model('articlesmodel');
        $ret = $this->ariclesmodel->getbyURL($URL);
        return $ret;
    }

}