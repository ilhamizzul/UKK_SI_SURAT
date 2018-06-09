<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat_masuk_model extends CI_Model {

	public function get_surat_masuk()
	{
		return $this->db->get('surat_masuk')->result();
	}

	public function hapus_surat_masuk($id)
	{
		return $this->db->where('id_surat', $id)->delete('surat_masuk');

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function search()
	{
		return $this->db->like('nomor_surat', $this->input->post('search'))
						->or_like('pengirim', $this->input->post('search'))
						->or_like('penerima', $this->input->post('search'))
						->or_like('perihal', $this->input->post('search'))
						->get('surat_masuk')
						->result();

		
	}

	public function tambah_surat_masuk($file_surat)
	{
		$data = array(
			'nomor_surat' => $this->input->post('nomor_surat'),
			'pengirim' => $this->input->post('pengirim'),
			'penerima' => $this->input->post('penerima'),
			'tgl_kirim' => $this->input->post('tgl_kirim'),
			'tgl_terima' => $this->input->post('tgl_terima'),
			'perihal' => $this->input->post('perihal'),
			'file_surat' => $file_surat['file_name'] 
		);

		return $this->db->insert('surat_masuk', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function edit_data($id)
	{
		$data = array(
			'nomor_surat' => $this->input->post('nomor_surat'),
			'pengirim' => $this->input->post('pengirim'),
			'penerima' => $this->input->post('penerima'),
			'tgl_kirim' => $this->input->post('tgl_kirim'),
			'tgl_terima' => $this->input->post('tgl_terima'),
			'perihal' => $this->input->post('perihal')
		);

		return $this->db->where('id_surat', $id)->update('surat_masuk', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function edit_pdf($id, $file_surat)
	{
		$data = array(
			'file_surat' => $file_surat['file_name'] 
		);

		return $this->db->where('id_surat', $id)->update('surat_masuk', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

	public function ubah_status($id)
	{
		$data = array('status' => 'selesai' );

		return $this->db->where('id_surat', $id)->update('surat_masuk', $data);

		if ($this->db->affected_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
		
	}

}

/* End of file surat_masuk_model.php */
/* Location: ./application/models/surat_masuk_model.php */