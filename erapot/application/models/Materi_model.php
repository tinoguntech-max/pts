<?php
class Materi_model extends CI_Model {
    
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('el_materi',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

	public function getbymapel($id_mapel) {
		$query = $this->db->where('mapel_id', $id_mapel)->get('el_materi');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getbydateandid($tgl1, $tgl2, $id) {
		$query = $this->db->where('id', $id)->where('tgl_posting >', $tgl1)->where('tgl_posting <', $tgl2)->get('el_materi');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

    public function record_count() {
        return $this->db->count_all('el_materi');
    }

	public function getall() {
		$query = $this->db->order_by('id', 'asc')->get('el_materi');		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
