<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi_masuk_model extends CI_Model {

	public function get_disposisi()
	{
		return $this->db->select('* , pengirim.nama_pegawai as nama_pengirim')
						->from('disposisi')
						->where('id_pegawai_penerima', $this->session->userdata('id_pegawai'))
						->join('surat_masuk', 'surat_masuk.id_surat = disposisi.id_surat')
						->join('pegawai as pengirim', 'pengirim.id_pegawai = disposisi.id_pegawai_pengirim')
						->join('jabatan', 'jabatan.id_jabatan = pengirim.id_jabatan')
						->get()
						->result();
	}

}

/* End of file disposisi_masuk_model.php */
/* Location: ./application/models/disposisi_masuk_model.php */