<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function count_surat_masuk()
	{
		return $this->db->count_all_results('surat_masuk');
	}

	public function count_surat_keluar()
	{
		return $this->db->count_all_results('surat_keluar');
	}

	public function count_disposisi()
	{
		return $this->db->count_all_results('disposisi');
	}

	public function count_user()
	{
		return $this->db->count_all_results('pegawai');
	}

}

/* End of file dashboard_model.php */
/* Location: ./application/models/dashboard_model.php */