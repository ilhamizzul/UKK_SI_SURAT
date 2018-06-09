<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_setting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('account_setting_model');
	}

	public function setting($id)
	{
		$data['main_view'] = 'account_setting_view';
		$data['pegawai'] = $this->account_setting_model->get_pegawai($id);
		$this->load->view('index', $data);
	}

	public function update($id)
	{
		if ($this->account_setting_model->ubah($id) == TRUE) {
				$this->session->set_flashdata('success', 'Update Data Berhasil');
				redirect('account_setting/setting/'.$id);
			} else {
				$this->session->set_flashdata('failed', 'Update Data Gagal');
				redirect('account_setting/setting/'.$id);
			}
	}

}

/* End of file account_setting.php */
/* Location: ./application/controllers/account_setting.php */