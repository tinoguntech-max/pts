<?php
class Tugas_model extends CI_Model {
    
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('el_tugas',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}

	public function getbymapel($id_mapel) {
		$query = $this->db->where('mapel_id', $id_mapel)->get('el_tugas');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getbymapeldate($tgl1, $tgl2, $id_mapel) {
		$query = $this->db->where('mapel_id', $id_mapel)->where('tgl_buat >', $tgl1)->where('tgl_buat <', $tgl2)->get('el_tugas');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

    public function record_count() {
        return $this->db->count_all('el_tugas');
    }

	public function getall() {
		$query = $this->db->order_by('id', 'asc')->get('el_tugas');		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
