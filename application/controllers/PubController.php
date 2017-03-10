<?php
/**
 * Created by PhpStorm.
 * User: Steave_pc
 * Date: 02/03/2017
 * Time: 20:52
 */

class PubController extends CI_Controller{
 /**   public function addPub(){
        $this->load->model('pubmodel');
        $data = array(
            'datedebutdiffusion' => $this->input->post('datedebutdiffusion'),
            'datefindiffusion' => $this->input->post('datefindiffusion'),
            'alt' => $this->input->post('alt'),
            'position' => $this->input->post('position'),
            'lienredirection' => $this->input->post('lienredirection'),
            'lienimage' => $this->input->post('lienimage')

        );
        $this->pubmodel->insertPub($data);
        redirect('admin/ajoutPub','refresh');
    }
    **/
    public function addPub(){
        $config = $this->configUpload();
        $this->load->library('upload', $config);
        $image = null;
        if (!$this->upload->do_upload('lienimage')) {
            $error = array('error' => $this->upload->display_errors());
        }
        else {
            $data = array('upload_data' => $this->upload->data());
            $image = 'upload/pub/'. $data['upload_data']['file_name'];
        }

        /**$datedebutdiffusion,$datefindiffusion,$alt,$position,$lienredirection,$lienimage**/
        $this->load->model('pubmodel');
        $this->pubmodel->insertPub($this->input->post('datedebutdiffusion'),$this->input->post('datefindiffusion'), $this->input->post('alt'), $this->input->post('position') ,$this->input->post('lienredirection') ,$image,$this->input->post('commentaire'));
        redirect('admin/ajoutpub','refresh');
    }
    public function configUpload(){
        $config['upload_path']   = './upload/pub/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 8000;
        $config['max_width']     = 2024;
        $config['max_height']    = 1768;
        $config['file_name'] = date('y-m-d').'-'.time('');
        return $config;
    }
}