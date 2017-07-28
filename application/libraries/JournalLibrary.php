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
    public function updateJournal($idjournal,$numparution,$image,$dateparution,$min){
        $data = null;
        if($numparution!="")
            $data['numeroparution'] = $numparution;
        if($image!=null && $image!="") {
            $data['liencouverture'] = $image;
            $data['min'] = $min;
        }
        if($dateparution!="")
            $data['datepublication'] = $dateparution;
        $this->CI->load->model('journal');
        $this->CI->journal->update($idjournal,$data);
    }
    public function isnewJournal($dateJournal){
        $this->CI->load->model('journal');
        $last_journal = $this->CI->journal->getJournalByDate($dateJournal);
        if(count($last_journal)!=0){
            //if(strtotime($last_journal[0]->datepublication) == strtotime($dateJournal)){
                return false;
            //}
        }
        return true;
    }

}