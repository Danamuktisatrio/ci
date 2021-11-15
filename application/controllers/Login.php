<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();


		$this->load->library('form_validation');
		$this->load->model('login_model');
		
	}

	public function index()	{

		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim');
		if ($this->form_validation->run()== false){
			$data ['title'] = 'Login';
			$this->load->view('login/login_header',$data);
			$this->load->view('login/Login_view');
			$this->load->view('login/login_footer');

		}else{
			$this->_masuk();
		}
		
		
	}

	private function _masuk()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user',['email' => $email])->row_array();

		//jika usernya ada
		if ($user) {
			
			//jika usernya aktif
			if ($user['is_active']== 1 ) {
				
				//cek password
				if (password_verify($password,$user['password'])) {
					
					$data = [
							  'email'	=>$user['email'],
							  'role_id' =>$user['role_id'] 
					];
					$this->session->set_userdata($data);
					redirect('home');

				}else {
					$this->session->set_flashdata('pesan','<div class="alert alert-danger"
					role="alert">Password Salah !</div>');
					redirect('login');
				}

			}else {
				$this->session->set_flashdata('pesan','<div class="alert alert-danger"
				role="alert">Akun Belum di Aktivasi !</div>');
				redirect('login');
			}
	
			//user Ada
		}else{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger"
			role="alert">Akun Tidak Ada, Buat Akun !</div>');
			redirect('login');

		}
	}
	public function registration(){
		$this->form_validation->set_rules('name', 'Name', 'required|trim|min_length[4]', [
			'min_length' => 'Nama Terlalu Pendek!!',
			'required' => 'Nama Harus Diisi'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'Email Sudah Terdaftar',
			'required' => 'Email Harus Diisi'
		]);
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
			'matches' => 'Password Tidak Sama!!',
			'min_length' => 'Password Terlalu Pendek!!',
			'required' => 'Password Harus Diisi'
		]);
		$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


		if ($this->form_validation->run()== false) {
			
			$data ['title'] = 'Registration';
			$this->load->view('login/login_header', $data);
			$this->load->view('login/Registration_view');
			$this->load->view('login/login_footer');
		}else{
			$data = [
				'name'  => htmlspecialchars($this->input->post('name',true)),
				'email' => htmlspecialchars($this->input->post('email',true)),
				'image' => 'default.jpg',
				'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' => 1,
				'date_created' => time()
			];
			$this->db->insert('user', $data);
			$this->session->set_flashdata('pesan','<div class="alert alert-success"
			role="alert">Akun Telah Terdaftar!<br> Silahkan Login</br></div>');
			redirect('login');
		}	
	}
			public function logout(){
				$this->session->unset_userdata('email');
				$this->session->unset_userdata('role_id');

				$this->session->set_flashdata('pesan ','<div class= "alert alert-success" role = "alert ">
				Berhasil Logout !</div>');
				redirect('login');
			}
}
