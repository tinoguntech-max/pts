<?php
class Po_detil_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('po_detil',$data);
    }
	
	/*public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('hotline_detil', $data);
	}*/
	
	public function delete($id) {
		$this->db->delete('po_detil', array('id_po' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('po_detil');
    }

	/*public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('hotline_detil');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('hotline_detil', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}*/
	
	public function getbypo($id) {
		$query = $this->db->where('id_po', $id)->get('po_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
