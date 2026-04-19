<?php
class Mapel_kelas_model extends CI_Model {
    
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('el_mapel_kelas',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

	public function getbykelas($id_kelas) {
		$query = $this->db->where('kelas_id', $id_kelas)->where('aktif', 1)->get('el_mapel_kelas');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getbyid($id) {
		$query = $this->db->where_in('id', $id)->get('el_mapel_kelas');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

    public function record_count() {
        return $this->db->count_all('el_mapel_kelas');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('el_mapel_kelas');		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
