<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level') == 1) {
				redirect('disposisi_masuk');
			} else {
				redirect('dashboard');
			}
			
		} else {
			$this->load->view('login_view');
		}
	}

	public function login()
	{
		if ($this->login_model->auth() == TRUE) {
			 if ($this->session->userdata('level') == 1) {
			 	$this->session->set_flashdata('success', 'Selamat Datang '.$this->session->userdata('nama_pegawai'));
			 	redirect('dashboard');
			 } else {
			 	$this->session->set_flashdata('success', 'Selamat Datang '.$this->session->userdata('nama_pegawai'));
			 	redirect('disposisi_masuk'); 	
			 }
			
			
		} else {
			$this->session->set_flashdata('failed', 'Username atau Password Salah');
			redirect('login');
		}
		
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}

}

/* End of file login.php */
/* Location: ./application/controllers/login.php */