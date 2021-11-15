<?php defined('BASEPATH') or exit ('No direct script access allowed'); 

class PerangkatDesa extends CI_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->model('Kecamatan_model','mselect');
        //  $this->load->model('Desa_model','mselect2');

    }

    public function index(){
        $this->load->model('Kecamatan_model','mselect');
        // $data ['Nama_Kec1'] = $this->mselect->getNamakec();
        $getdata = $this->mselect->getdatakec();
        $data['datakec'] = $getdata;
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('template/footer');
        $this->load->view('perangkatdesa/desa',($data));
    }

        public function getDesa(){
            $idkecamatan = $this->input->post('id');
            $data = $this->mselect->getDataDesa($idkecamatan);
            $output = '<option value">Pilih Desa</ouput>';
            foreach ($data as $row) {
                $output .= '<option value="'.$row->Nama_Desa.'">'.$row->Nama_Desa.'</option>';
            }
            $this->output->set_content_type('application/json')->set_output(json_encode($output));
        }
        public function Tambah(){
            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                $data = $this->input->post();
                $this->db->insert('ddadd',$data);
                redirect('DDADD_history');
         
                } else {

            }
        $data['gambar_dekat']='';
        $gambar = $_FILES['gambar_dekat']['name'];

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png';

        $this->load->library('upload',$config);

        if(!$this->upload->do_upload('gambar_dekat')){
            echo 'gambar gagal di upload';
        }else{
            $gambar = $this->upload->data('file_name');
            $data['gambar_dekat'] = $gambar;
        }
        $this->db->insert('ddadd',$data);
          redirect('PerangkatDesa');


          //gambar jauh
        $data2['gambar_jauh']='';
        $gambar2 = $_FILES['gambar_jauh']['name'];

        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'jpg|jpeg|png';

        $this->load->library('upload',$config);

        if(!$this->upload->do_upload('gambar_jauh')){
            echo 'gambar gagal di upload';
        }else{
            $gambar2 = $this->upload->data('file_name');
            $data['gambar_jauh'] = $gambar2;
        }
        $this->db->insert('ddadd',$data2);
          redirect('PerangkatDesa');
        
    }
       
}
 