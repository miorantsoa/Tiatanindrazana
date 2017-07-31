<?php

/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 19/06/2017
 * Time: 14:41
 */
class SondageController extends CI_Controller
{
    public function addSondage(){
        $this->load->model('sondage_model');
        $this->sondage_model->insertSondage($this->input->post('question'),$this->input->post('dateparution'));
        redirect('page/administration/listesondage','refresh');
    }
    public function updateSondage(){
        $this->load->model('sondage_model');
        //`idsondage`, `reponse`, `datepublication`
        $datedujour = date('Y-m-d');
 //       var_dump($this->input->post('question'));
 //       var_dump($this->input->post('dateparution'));
 //       var_dump($this->input->post('idsondage'));
        $data = array(
            'question' => $this->input->post('question'),
            'dateparution'=> $this->input->post('dateparution')
        );
        $this->sondage_model->update($this->input->post('idsondage'),$data);
        redirect('page/administration/listesondage','refresh');
    }
    public function deleteSondage($id){
        $this->load->model('sondage_model');
        $this->sondage_model->delete($id);
        redirect('page/administration/listesondage','refresh');
    }

    public function vote(){
        $this->load->model('sondage_model');
        $this->sondage_model->vote($this->input->post('idsondage'),$this->input->post('idreponse'));
        redirect('accueil','refresh');
    }
    public function  voteAjax(){
        $this->load->model('sondage_model');
        $this->sondage_model->vote($this->input->post('idsondage'),$this->input->post('idreponse'));
        $temp1 = $this->resultvote($this->sondage_model->getvotebyidsondage($this->input->post('idsondage')));
        $data= array(
            "eny" => $temp1[0],
            "tsia" => $temp1[1],
            "neutre" => $temp1[2]
        );
        echo json_encode($data);
    }

    public function resultvote($vote){
        $totalvote = 0;
        foreach ($vote as $votet) :
            $totalvote = $totalvote + $votet->nbrvote;
        endforeach;
        $ret = array(
            '0' => 0,
            '1' => 0,
            '2' => 0
        );
        //   var_dump($vote);
        foreach ($vote as $votep) :
            if(1 == $votep->idreponse) {
                $ret['0'] = $votep->nbrvote * 100 / $totalvote;

            }
            if(2 == $votep->idreponse) {
                $ret['1'] = $votep->nbrvote * 100 / $totalvote;

            }
            if(3 == $votep->idreponse) {
                $ret['2'] = $votep->nbrvote * 100 / $totalvote;

            }
        endforeach;
        return $ret;
    }
}