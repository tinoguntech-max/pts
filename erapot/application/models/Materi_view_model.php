<?php
class Materi_view_model extends CI_Model {
    
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('el_materi_view',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

	public function getbymateriandsiswa($id, $id1) {
		$query = $this->db->where('user_id', $id)->where('materi_id', $id1)->get('el_materi_view');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

    public function record_count() {
        return $this->db->count_all('el_materi_view');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('el_materi_view');		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
