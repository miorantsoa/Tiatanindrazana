<?php
/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 02/03/2017
 * Time: 17:10
 */

class FilActu_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    public function insertFilActu($dataTable){

        $data = array(
            'datepublication' => $dataTable['datepublication'],
            'heurepublication' => $dataTable['heurepublication'],
            'extrait' => $dataTable['extrait'],
            'contenue' => $dataTable['contenue']
        );
        $this->db->trans_start();
        $this->db->insert("filactualite",$data);

        $this->db->trans_complete();
    }
    //public function update($id, $contenu, $)
    public function delete($id){
        $this->db->where('idfilactualite',$id);
        $this->db->delete('filactualite');
    }

    public function update($id,$data){
        $this->db->where('idfilactualite',$id);
        $this->db->update('filactualite',$data);
    }

    public function getFilActu($publie = null){
        if($publie != null){
            $this->db->where('etat',true);
        }
        $this->db->order_by('datepublication, heurepublication','desc');
        $filactualite = $this->db->get("filactualite");
        return  $filactualite->result();
    }

    public function getLastFilAdmin(){
        $fil= $this->db->query('select * from filactualite where datepublication in (select max(datepublication) as datepublication from filactualite) ORDER  BY  datepublication, heurepublication DESC ');
        //$fil = $this->db->get();
        return $fil->result();
    }

    public function getLastFil(){
        $fil= $this->db->query('select * from filactualite where datepublication in (select max(datepublication) as datepublication from filactualite WHERE etat = true) ORDER  BY  datepublication, heurepublication DESC ');
        //$fil = $this->db->get();
        return $fil->result();
    }
    public function getJ2Fil(){
        $this->db->where('etat',true);
        $this->db->where('datepublication < (select max(datepublication)-2 as datepublication from filactualite)');
        $this->db->order_by('datepublication','desc');
        $this->db->limit(1);
        $date= $this->db->get('filactualite');
        //$fil= $this->db->query('select * from filactualite where datepublication <= (select max(datepublication)-2 as datepublication from filactualite)  ORDER by datepublication DESC');
        //$sql = $this->db->get_compiled_select('filactualite');
        $date = $date->result();
        if(count($date)!=0) {
            $fil_info = $this->getByDate($date[0]->datepublication);
            return $fil_info;
        }
        else
            return null;
    }
    public function getFilActuById($id){
        $this->db->where('idfilactualite',$id);
        $filactualite = $this->db->get("filactualite");
        return  $filactualite->result();
    }
    public function get($id=null,$contenu=null,$date = null,$publie = null){
        if($publie != null){
            $this->db->where('etat',$publie);
        }
        if($id!=null){
            $this->db->where('idfilactualite',$id);
        }
        if($contenu!=null){
            $this->db->where('contenue',$contenu);
        }
        $result = $this->db->get('filactualite');
        return $result->result();
    }
    public function getByDate($date){
        $this->db->where('datepublication',$date);
        $fil = $this->db->get('filactualite');
        return $fil->result();
    }
    public function getNextDate($date,$publie = true){
        if($publie != null){
            $this->db->where('etat',$publie);
        }
        $this->db->where('datepublication >',$date);
        $this->db->group_by('datepublication');
        $this->db->order_by('datepublication','asc');
        $this->db->limit(1);
        $date = $this->db->get('filactualite');
        return $date->result();
    }
    public function getPrevDate($date,$publie = true){
        if($publie != null){
            $this->db->where('etat',$publie);
        }
        $this->db->where('datepublication <',$date);
        $this->db->group_by('datepublication');
        $this->db->order_by('datepublication','desc');
        $this->db->limit(1);
        $date = $this->db->get('filactualite');
        return $date->result();
    }

}