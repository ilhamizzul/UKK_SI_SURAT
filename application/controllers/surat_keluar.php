<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_keluar extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('surat_keluar_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level') == 1) {
				$data['main_view'] = 'surat_keluar_view';
				$data['surat_keluar'] = $this->surat_keluar_model->get_surat_keluar();
				$this->load->view('index', $data);	
			} else {
				redirect('disposisi_masuk');
			}
			
				
		} else {
			redirect('login');
		}
		
		
	}

	public function search()
	{
		if ($this->surat_keluar_model->search() == TRUE) {
			$data['main_view'] = 'surat_masuk_view';
			$data['surat_keluar'] = $this->surat_keluar_model->search();
			$this->load->view('index', $data);	
		} else {
			$this->load->view('404_view');
		}
	}

	public function insert()
	{
		 $config['upload_path'] = './uploads/';
		 $config['allowed_types'] = 'pdf';
		 $config['max_size']  = '6100';
		
		 $this->load->library('upload', $config);
		
		 if (! $this->upload->do_upload('file_surat')){
			  $this->session->set_flashdata('failed', 'Mohon Upload Data Dengan  File Berekstensi PDF');
			  redirect('surat_keluar');
			
		
		 }	else{
			
		 	if ($this->surat_keluar_model->tambah_surat_keluar($this->upload->data()) == TRUE) {
				$this->session->set_flashdata('success', 'Tambah Surat Berhasil');
				redirect('surat_keluar');
			} else {
				$this->session->set_flashdata('failed', 'Tambah Surat Berhasil');
				redirect('surat_keluar');
			}
		 }
		


	}

	public function delete($id)
	{
		if ($this->surat_keluar_model->hapus_surat_keluar($id) == TRUE) {
			$this->session->set_flashdata('success', 'Hapus Data Berhasil');
			redirect('surat_keluar');
		} else {
			$this->session->set_flashdata('failed', 'Hapus Data Gagal');
			redirect('surat_keluar');
		}
		
	}

	public function update_data($id)
	{
		if ($this->surat_keluar_model->edit_data($id) == TRUE) {
			$this->session->set_flashdata('success', 'Edit Data Berhasil');
			redirect('surat_keluar');
		} else {
			$this->session->set_flashdata('failed', 'Edit Data Gagal');
			redirect('surat_keluar');
		}
	}

	public function update_pdf($id)
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'pdf';
		$config['max_size']  = '5100';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('file_surat')){
			echo  $this->upload->display_errors();
		}
		else{
			if ($this->surat_keluar_model->edit_pdf($id, $this->upload->data()) == TRUE) {
				$this->session->set_flashdata('success', 'Ubah File Berhasil');
				redirect('surat_keluar');
			} else {
				$this->session->set_flashdata('failed', 'Ubah File Gagal');
				redirect('surat_keluar');
			}
			
		}
	}


}

/* End of file surat_masuk.php */
/* Location: ./application/controllers/surat_masuk.php */