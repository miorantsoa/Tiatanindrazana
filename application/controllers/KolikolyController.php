<?php
/**
 * Created by PhpStorm.
 * User: steave_pc
 * Date: 07/04/2017
 * Time: 08:42
 */
class KolikolyController extends CI_Controller {
    public function addKolikoly (){
        $this->load->model('coruptionmodel');
        $config = $this->configUpload($this->input->post('sujet'),"kolikoly");
        $this->load->library('upload', $config);
        $lienmedia = null;
        /** insertMedias($type,$nommedia,$cheminmedia,$creditmedia,$alt) */
        /** insertAssoc($idcorruption,$idmedia) */
        /** INSERT INTO `corruption`(`idcorruption`, `idcatcorruption`, `datedenonciation`, `datefait`, `nomdenonciateur`, `adressedenonciateur`, `telephonedenonciateur`, `emaildenonciateur`, `sujet`, `contenue`, `lieu`) */
        var_dump($this->input->post('datedenonciation'));
        var_dump($this->input->post('test'));
        $idcoruption = $this->coruptionmodel->insertCoruption($this->input->post('typecorruption'), $this->input->post('datedenonciation'), $this->input->post('datefait'), $this->input->post('nomdenonciateur'), $this->input->post('adressedenonciateur'), $this->input->post('telephonedenonciateur'), $this->input->post('emaildenonciateur'), $this->input->post('sujet'), $this->input->post('contenue'), $this->input->post('lieu'));

        var_dump($idcoruption);

        $idmedia = "";
        if (!$this->upload->do_upload('media')) {
            $error = array('error' => $this->upload->display_errors());
            var_dump($error);
        }

        else {
            $data = array('upload_data' => $this->upload->data());
            $lienmedia = 'upload/infouser/' . $data['upload_data']['file_name'];
            /** $type,$nommedia,$cheminmedia,$creditmedia,$alt */
            $idmedia = $this->coruptionmodel->insertMedias($data['upload_data']['file_type'],'kolikoly',$lienmedia,null,'media kolikoly');
            $this->coruptionmodel->insertAssoc($idcoruption,$idmedia);
        }
        redirect('accueil/listekolikoly','refresh');
     }
    public function configUpload($nomutilisateur,$detail)
    {
        $config['upload_path'] = './upload/Kolikoly/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 8000;
        $config['max_width'] = 2024;
        $config['max_height'] = 1768;
        $config['file_name'] = $nomutilisateur .'_'. $detail;
        return $config;
    }
}