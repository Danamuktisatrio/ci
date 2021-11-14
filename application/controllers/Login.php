<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();

		$this->load->model('login_model');
		
	}

	public function index()	{
	$this->load->view('Login_view');

	}

	//klik button
	
	public function aksi_login()
	{
		$user = $this->input->post('username',true);
		$pass = $this->input->post('password',true);

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');

		if ($this->form_validation->run() != false) {
			$where = array (
				'username' => $user , 
				'password' => $pass
			);
			$cekLogin = $this->login_model->masuk($where)->num_rows();

			if ($cekLogin > 0) {
				$sess_data = array(
					'username' => $user,
					'login' => 'OK'
				);
				$this->session->set_userdata($sess_data);
				redirect('Home');
			} else {
				redirect('Login');
				
			}
			
		} else {
			$this->load->view('Login_view');

		}
		

	}
}
