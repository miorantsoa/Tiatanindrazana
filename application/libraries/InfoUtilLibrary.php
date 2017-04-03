<?php

/**
 * Created by PhpStorm.
 * User: Miorantsoa
 * Date: 05/03/2017
 * Time: 22:26
 */
class InfoUtilLibrary{
    protected $CI;
    public  function __construct(){
        $this->CI = & get_instance();
    }

    //Mise à jour selon les champs renseigné
    public function update($id,$idcategorie,$contenu,$lienImage,$copyrightphoto,$lienutile){
        $this->CI->load->model('infoutilemodel');
        $data = [];
        if($idcategorie!=null)
            $data['idcatbeinfo'] = $idcategorie;
        if($contenu!=null){
            $data['contenue'] = $contenu;
        }
        if($lienImage!=null)
            $data['lienphoto'] = $lienImage;
        if($copyrightphoto!=null)
            $data['copyrightphoto'] = $copyrightphoto;
        if($lienutile!=null)
            $data['lien'] = $lienutile;
        $data['dernieremaj'] = date('Y-m-d H:i');
        $this->CI->infoutilemodel->update($id,$data);
    }

}