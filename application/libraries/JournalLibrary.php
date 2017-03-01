<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 01/03/2017
 * Time: 15:28
 */
class JournalLibrary{
    public function __construct()    {
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
    }
    public function updateJournal($idjournal,$numparution,$image,$dateparution){
        $data = null;
        if($numparution!="")
            $data['numeroparution'] = $numparution;
        if($image!=null && $image!="")
            $data['liencouverture'] = $image;
        if($dateparution!="")
            $data['datepublication'] = $dateparution;
        $this->CI->load->model('journal');
        $this->CI->journal->update($idjournal,$data);
    }

}