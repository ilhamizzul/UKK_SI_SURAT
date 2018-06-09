<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi_model extends CI_Model {

	public function get_disposisi($id)
	{
		return $this->db->select('* , pengirim.nama_pegawai as pengirim , penerima.nama_pegawai as penerima')
						->from('disposisi')
						->where('disposisi.id_surat', $id)
						->join('surat_masuk', 'surat_masuk.id_surat = disposisi.id_surat')
						->join('pegawai as pengirim', 'pengirim.id_pegawai = disposisi.id_pegawai_pengirim')
						->join('pegawai as penerima', 'penerima.id_pegawai = disposisi.id_pegawai_penerima')
						->join('jabatan', 'jabatan.id_jabatan = pengirim.id_jabatan')
						->get()
						->result();
	}	

	public function get_pegawai()
	{
		return $this->db->join('jabatan', 'jabatan.id_jabatan = pegawai.id_jabatan')
						->get('pegawai')
						->result();
	}

	public function search()
	{
		return $this->db->select('*')
						->from('disposisi')
						->join('surat_masuk', 'surat_masuk.id_surat = disposisi.id_surat')
						->join('pegawai as pengirim', 'pengirim.id_pegawai = disposisi.id_pegawai_pengirim')
						->join('pegawai as penerima', 'penerima.id_pegawai = disposisi.id_pegawai_penerima')
						->like('pengirim' , $this->input->post('search'))
						->or_like('penerima', $this->input->post('search'))
						->or_like('keterangan', $this->input->post('search'))
						->get()
						->result();

		// return $this->db->like('nomor_surat', $this->input->post('search'))
		// 				->or_like('pengirim', $this->input->post('search'))
		// 				->or_like('penerima', $this->input->post('search'))
		// 				->or_like('perihal', $this->input->post('search'))
		// 				->get('surat_masuk')
		// 				->result();
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

		$this->db->insert('disposisi', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function hapus($id)
	{
		$this->db->where('id_disposisi', $id)->delete('disposisi');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

}

/* End of file disposisi_model.php */
/* Location: ./application/models/disposisi_model.php */