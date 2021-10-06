<?php if (! defined('BASEPATH')) exit ('No direct script access allowed'); 

class PerangkatDesa extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->model('Kecamatan_model','mselect');
        $this->load->model('Desa_model','mselect2');

    }

        public function index(){
            $getdata = $this->mselect->getdatakec();
            $data['datakab'] = $getdata;
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('template/footer');
            $this->load->view('perangkatdesa/desa',($data));
        }

        public function get_desa(){
            $id = $this->input->post('id');
            $data = $this->mselect->get_desa($id);
            echo json_encode($data);  
        }
        // search
        // public function search()
        // {
        //     $data = $this->input->post('keyword');
        //     $data ['desa'] = $this->Kecamatan_model->get_keyword($keyword);
        //     $this->load->view('template/header');
        //     $this->load->view('template/sidebar');
        //     $this->load->view('template/footer');
        // }

}