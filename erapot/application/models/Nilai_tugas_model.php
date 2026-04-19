<?php
class Nilai_tugas_model extends CI_Model {
    
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('el_nilai_tugas',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

	public function getbytugas($id_siswa, $id_tugas) {
		$query = $this->db->where('tugas_id', $id_tugas)->where('siswa_id', $id_siswa)->get('el_nilai_tugas');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

    public function record_count() {
        return $this->db->count_all('el_nilai_tugas');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('el_nilai_tugas');		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
