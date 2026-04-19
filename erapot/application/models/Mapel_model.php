<?php
class Mapel_model extends CI_Model {
    
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('el_mapel',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

	public function getbytugas($id_siswa, $id_tugas) {
		$query = $this->db->where('tugas_id', $id_tugas)->where('siswa_id', $id_siswa)->get('el_mapel');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getbyid($id) {
		$query = $this->db->where_in('id', $id)->get('el_mapel');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

    public function record_count() {
        return $this->db->count_all('el_mapel');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('el_mapel');		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
