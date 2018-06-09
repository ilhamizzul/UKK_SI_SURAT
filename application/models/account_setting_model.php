<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_setting_model extends CI_Model {

	public function get_pegawai($id)
	{
		return $this->db->select('*')
						->from('pegawai')
						->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan')
						->where('id_pegawai', $id)
						->get()
						->row();
	}

	public function ubah($id)
	{
		$data = array(
			'nama_pegawai' => $this->input->post('nama_pegawai'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password')
		);

		$this->db->where('id_pegawai', $id)->update('pegawai', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

}

/* End of file account_setting_model.php */
/* Location: ./application/models/account_setting_model.php */