<?php defined('BASEPATH') or exit ('No direct script access allowed'); 

class DDADD_history extends CI_Controller{
   

    public function index(){
        //$data ['Wilyah'] = $this->Kecamatan_model->getDataWilayah();
        $data['ddadd'] = $this->Kecamatan_model->tampil_data()->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('perangkatdesa/add_desa',$data);
        $this->load->view('template/footer');
        
    }
    public function Hapus($id){
        $where = array ('id' => $id);
        $this->Kecamatan_model->hapus_data($where, 'ddadd');
        redirect('DDADD_history');
    }
    public function Edit($id)
    {
        $where = array ('id' => $id);
        $data['ddadd'] = $this->Kecamatan_model->edit_data($where, 'ddadd')->result();
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('perangkatdesa/edit',$data);  
        $this->load->view('template/footer');

    }
    public function update()
    {
        $id = $this->input->post('id');
        $gambar_dekat = $this->input->post('gambar_dekat');
        $gambar_jauh = $this->input->post('gambar_jauh');


        $data = array (
            'gambar_dekat' => $gambar_dekat ,
            'gambar_jauh' => $gambar_jauh
            
        );
        $where = array(
            'id' => $id
        );

        $this->Kecamatan_model->update_data($where,$data,'ddadd');
        redirect('DDADD_history');


    }
  
}
