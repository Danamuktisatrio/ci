<?php
class Home extends CI_Controller{
    public function index(){
    $this->load->view('template/header');
    $this->load->view('template/sidebar');
    $this->load->view('template/topbar');
    $this->load->view('template/footer');
    $this->load->view('home/index');
    }
}