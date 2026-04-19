<?php
class Kelas_siswa_model extends CI_Model {
    
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('el_kelas_siswa',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

	public function getkelas($id) {
		$query = $this->db->where('siswa_id', $id)->where('aktif', 1)->get('el_kelas_siswa');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getbykelas($id) {
		$query = $this->db->where('kelas_id', $id)->where('aktif', 1)->get('el_kelas_siswa');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

    public function record_count() {
        return $this->db->count_all('el_kelas_siswa');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('el_kelas_siswa');		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
