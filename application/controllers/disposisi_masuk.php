<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi_masuk extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('disposisi_masuk_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level') == 1) {
				redirect('dashboard');
			} else {
				$data['main_view'] = 'disposisi_masuk_view';
				$data['disposisi'] = $this->disposisi_masuk_model->get_disposisi();
				$this->load->view('index', $data);
			}
			
				
			
		} else {
			redirect('login');
		}
		
				
	}

}

/* End of file disposisi_masuk.php */
/* Location: ./application/controllers/disposisi_masuk.php */