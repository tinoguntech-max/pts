<?php
class Tugas_kelas_model extends CI_Model {
    
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('el_tugas_kelas',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

	public function getbykelas($id) {
		$query = $this->db->where('kelas_id', $id)->get('el_tugas_kelas');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

    public function record_count() {
        return $this->db->count_all('el_tugas_kelas');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('el_tugas_kelas');		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
