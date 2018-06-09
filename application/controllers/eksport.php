<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Eksport extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('surat_masuk_model');
		$this->load->model('surat_keluar_model');
		$this->load->model('pegawai_model');
		$this->load->model('disposisi_model');
	}

	public function surat_masuk()
	{
		$data['surat_masuk'] = $this->surat_masuk_model->get_surat_masuk();
		$this->load->view('eksport/eksport_surat_masuk_view', $data);
	}

	public function surat_keluar()
	{
		$data['surat_keluar'] = $this->surat_keluar_model->get_surat_keluar();
		$this->load->view('eksport/wksport_surat_keluar_view', $data);
	}
	public function pegawai()
	{
		$data['pegawai'] = $this->pegawai_model->get_pegawai();
		$this->load->view('eksport/eksport_pegawai_view', $data);
	}

	public function disposisi($id)
	{
		$data['disposisi'] = $this->disposisi_model->get_disposisi($id);
		$data['nomor_surat'] = $this->disposisi_model->get_id_surat($id);
		$this->load->view('eksport/eksport_disposisi_view', $data);
	}

}

/* End of file eksport.php */
/* Location: ./application/controllers/eksport.php */