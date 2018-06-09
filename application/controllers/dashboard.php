<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level') != 1) {
				redirect('disposisi_masuk');
			} else {
				$data['main_view'] = 'dashboard_view';
				$data['count_masuk'] = $this->dashboard_model->count_surat_masuk();
				$data['count_keluar'] = $this->dashboard_model->count_surat_keluar();
				$data['count_disposisi'] = $this->dashboard_model->count_disposisi();
				$data['count_user'] = $this->dashboard_model->count_user();
				$this->load->view('index', $data);
			}
			
		} else {
			redirect('login');
		}
		

				
	}

}

/* End of file dashboard.php */
/* Location: ./application/controllers/dashboard.php */