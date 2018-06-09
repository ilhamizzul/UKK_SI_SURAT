<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function auth()
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$query = $this->db->where('username', $username)->where('password', $password)->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan')->get('pegawai');

			if ($this->db->affected_rows() > 0) {
				$data = $query->row_array();

				$session = array(
					'logged_in' => TRUE,
					'id_pegawai' => $data['id_pegawai'],
					'nama_pegawai' => $data['nama_pegawai'],
					'username' => $data['username'],
					'id_jabatan' => $data['id_jabatan'],
					'nama_jabatan' => $data['nama_jabatan'],
					'level' => $data['level'],
					'profil' => $data['profil']
				);
				
				$this->session->set_userdata( $session );

				return TRUE;
			} else {
				return FALSE;
			}
			
		}	

}

/* End of file login_model.php */
/* Location: ./application/models/login_model.php */