<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi_keluar_model extends CI_Model {

	public function get_pegawai()
	{
		return $this->db->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan')
						->get('pegawai')
						->result();
	}

	public function get_disposisi($id)
	{
		return $this->db->select('* , penerima.nama_pegawai as penerima')
						->from('disposisi')
						->where('disposisi.id_surat', $id)
						->where('id_pegawai_pengirim' , $this->session->userdata('id_pegawai'))
						->join('surat_masuk', 'surat_masuk.id_surat = disposisi.id_surat')
						->join('pegawai as penerima', 'penerima.id_pegawai = disposisi.id_pegawai_penerima')
						->get()
						->result();
	}

	public function get_id_surat($id)
	{
		return $this->db->where('id_surat', $id)->get('surat_masuk')->row();  
	}


	
	public function tambah($id)
	{
		$data = array(
			'id_surat' => $id, 
			'id_pegawai_pengirim' => $this->session->userdata('id_pegawai'),
			'id_pegawai_penerima' => $this->input->post('id_pegawai'),
			'keterangan' => $this->input->post('keterangan')
		);

		return $this->db->insert('disposisi', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function hapus($id)
	{
		return $this->db->where('id_disposisi', $id)->delete('disposisi');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

}

/* End of file disposisi_keluar_model.php */
/* Location: ./application/models/disposisi_keluar_model.php */