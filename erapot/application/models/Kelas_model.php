<?php
class Kelas_model extends CI_Model {
    
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('el_kelas',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

	public function getbytugas($id_siswa, $id_tugas) {
		$query = $this->db->where('tugas_id', $id_tugas)->where('siswa_id', $id_siswa)->get('el_kelas');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getbyid($id) {
		$query = $this->db->where_in('id', $id)->get('el_kelas');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

    public function record_count() {
        return $this->db->count_all('el_kelas');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('el_kelas');		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getallaktif() {
		$query = $this->db->order_by('nama', 'asc')->where('parent_id !=', 'null')->get('el_kelas');		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get_autocomplete($id) {
		$query = $this->db			
			->group_start()
				->like('nama', $id)
			->group_end()
			->where('parent_id is NOT NULL', NULL, FALSE)
			->get('el_kelas', 8, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
