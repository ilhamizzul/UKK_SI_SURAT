<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi_keluar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('disposisi_keluar_model');
	}

	public function lihat_disposisi($id, $status)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level') == 1) {
				redirect('dashboard');
			} else {
				$data['main_view'] = 'disposisi_keluar_view';
				$data['disposisi'] = $this->disposisi_keluar_model->get_disposisi($id);
				$data['pegawai'] = $this->disposisi_keluar_model->get_pegawai();
				$data['nomor_surat'] = $this->disposisi_keluar_model->get_id_surat($id);
				$data['status'] = $status;
				$this->load->view('index', $data);
			}
			
		} else {
			redirect('login');
		}
		
				
	}

	public function insert($id)
	{
		if ($this->disposisi_keluar_model->tambah($id) == TRUE) {
			$this->session->set_flashdata('success', 'Tambah Disposisi Berhasil');
			redirect('disposisi_keluar/lihat_disposisi/'.$this->uri->segment(3));
		} else {
			$this->session->set_flashdata('failed', 'Tambah Disposisi Gagal');
			redirect('disposisi_keluar/lihat_disposisi/'.$this->uri->segment(3));
		}
		
	}

	public function delete($id)
	{
		if ($this->disposisi_keluar_model->hapus($id) == TRUE) {
			$this->session->set_flashdata('success', 'Hapus Disposisi Berhasil');
			redirect('disposisi_keluar/lihat_disposisi/'.$this->uri->segment(4));
		} else {
			$this->session->set_flashdata('failed', 'Hapus Disposisi Gagal');
			redirect('disposisi_keluar/lihat_disposisi/'.$this->uri->segment(4));
		}
		
	}

}

/* End of file disposisi_keluar.php */
/* Location: ./application/controllers/disposisi_keluar.php */