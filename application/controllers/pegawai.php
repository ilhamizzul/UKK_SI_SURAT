<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pegawai_model');
	}

	public function index()
	{
		if ($this->session->userdata('logged_in') == TRUE) {
			if ($this->session->userdata('level') == 1) {
				$data['main_view'] = 'pegawai_view';
				$data['pegawai'] = $this->pegawai_model->get_pegawai();
				$data['jabatan'] = $this->pegawai_model->get_jabatan();
				$this->load->view('index', $data);
			} else {
				redirect('disposisi_masuk');
			}
			
		} else {
			redirect('login');
		}
		
		
	}

	public function insert()
	{
		$config['upload_path'] = './uploads/img/';
		$config['allowed_types'] = 'jpg|png';
		$config['max_size']  = '2100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto')){
			$this->session->set_flashdata('failed', $this->upload->display_errors());
			redirect('pegawai');
		}
		else{
			if ($this->pegawai_model->check_data_1() == FALSE) {
				$this->session->set_flashdata('failed', 'Terdeteksi Nama Pegawai Sudah Terpakai Oleh User Lain');
				redirect('pegawai');
			} elseif ($this->pegawai_model->check_data_2() == FALSE) {
				$this->session->set_flashdata('failed', 'Terdeteksi Username Sudah Terpakai Oleh User Lain');
				redirect('pegawai');
			} elseif ($this->pegawai_model->check_data_3() == FALSE) {
				$this->session->set_flashdata('failed', 'Terdeteksi Password Sudah Terpakai Oleh User Lain');
				redirect('pegawai');
			} else {
				if ($this->pegawai_model->tambah($this->upload->data()) == TRUE) {
						$this->session->set_flashdata('success', 'Tambah Pegawai Berhasil');
						redirect('pegawai');
				} else {
					$this->session->set_flashdata('failed', 'Tambah Pegawai Gagal');
					redirect('pegawai');
				}
			}
				
				

		}
	}

	public function update($id)
	{
		if ($this->pegawai_model->check_data_2() == TRUE) {
			if ($this->pegawai_model->ubah($id) == TRUE) {
					$this->session->set_flashdata('success', 'Update Pegawai Berhasil');
					redirect('pegawai');
				} else {
					$this->session->set_flashdata('failed', 'Update Pegawai Gagal');
					redirect('pegawai');
				}
		} else {
			$this->session->set_flashdata('failed', 'Terdeteksi Username Telah Dipakai Oleh User Lain');
			redirect('pegawai');
		}
		

			
	}

	public function delete($id)
	{
		if ($this->pegawai_model->hapus($id) == TRUE) {
				$this->session->set_flashdata('success', 'Hapus Pegawai Berhasil');
				redirect('pegawai');
			} else {
				$this->session->set_flashdata('failed', 'Hapus Pegawai Gagal');
				redirect('pegawai');
			}
	}

}

/* End of file pegawai.php */
/* Location: ./application/controllers/pegawai.php */