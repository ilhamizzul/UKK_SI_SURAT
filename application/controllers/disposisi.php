<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('disposisi_model');
	}

	public function lihat_disposisi($id, $status)
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level') == 1) {
				$data['main_view'] = 'disposisi_view';
				$data['disposisi'] = $this->disposisi_model->get_disposisi($id);
				$data['status'] = $status;
				$data['nomor_surat'] = $this->disposisi_model->get_id_surat($id);
				$data['pegawai'] = $this->disposisi_model->get_pegawai($id);
				$this->load->view('index', $data);
			} else {
				redirect('disposisi_masuk');
			}
			
		} else {
			redirect('login');
		}
		
	}

	public function search($id)
	{
		$data['main_view'] = 'disposisi_view';
				$data['disposisi'] = $this->disposisi_model->get_disposisi($id);
				$data['nomor_surat'] = $this->disposisi_model->get_id_surat($id);
				$data['pegawai'] = $this->disposisi_model->get_pegawai($id);
				$this->load->view('index', $data);
	}

	public function insert($id)
	{
		if ($this->disposisi_model->tambah($id) == TRUE) {
			$this->session->set_flashdata('success', 'Tambah Disposisi Berhasil');
			redirect('disposisi/lihat_disposisi/'.$this->uri->segment(3));
		} else {
			$this->session->set_flashdata('failed', 'Tambah Disposisi Gagal');
			redirect('disposisi/lihat_disposisi/'.$this->uri->segment(3));
		}
		
	}

	public function delete($id)
	{
		if ($this->disposisi_model->hapus($id) == TRUE) {
			$this->session->set_flashdata('success', 'Hapus Disposisi Berhasil');
			redirect('disposisi/lihat_disposisi/'.$this->uri->segment(4));
		} else {
			$this->session->set_flashdata('failed', 'Hapus Disposisi Gagal');
			redirect('disposisi/lihat_disposisi/'.$this->uri->segment(4));
		}
	}

}

/* End of file disposisi.php */
/* Location: ./application/controllers/disposisi.php */