<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pegawai_model extends CI_Model {

	public function get_pegawai()
	{
		return $this->db->select('*')
						->from('pegawai')
						->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan')
						->get()
						->result();
	}

	public function get_jabatan()
	{
		return $this->db->get('jabatan')->result();
	}

	public function tambah($foto)
	{
		$data = array(
			'nama_pegawai' => $this->input->post('nama_pegawai'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'id_jabatan' => $this->input->post('id_jabatan'),
			'profil' => $foto['file_name'] 
		);

		$this->db->insert('pegawai', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function check_data_1()
	{
		$nama_pegawai = $this->input->post('nama_pegawai');


		$this->db->where('nama_pegawai', $nama_pegawai)
						->get('pegawai');

		if ($this->db->affected_rows() > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
		
	}

	public function check_data_2()
	{
		$username = $this->input->post('username');

		$this->db->where('username', $username)
						// ->where('password', md5($password))
						->get('pegawai');

		if ($this->db->affected_rows() > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
		
	}
	public function check_data_3()
	{
		$password = $this->input->post('password');

		$this->db->where('password', $password)
						->get('pegawai');

		if ($this->db->affected_rows() > 0) {
			return FALSE;
		} else {
			return TRUE;
		}
		
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

	public function hapus($id)
	{
		$this->db->where('id_pegawai', $id)->delete('pegawai');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

}

/* End of file pegawai_model.php */
/* Location: ./application/models/pegawai_model.php */