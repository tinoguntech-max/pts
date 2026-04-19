<?php
class Pos_bengkel_ksg_service_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('pos_bengkel_ksg_service',$data);
    }
	
	/*public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('hotline_detil', $data);
	}*/
	
	public function delete($id) {
		$this->db->delete('pos_bengkel_ksg_service', array('id_pos_bengkel_ksg' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('pos_bengkel_ksg_service');
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
	
	public function getbyposbengkel($id) {
		$where = array('id_pos_bengkel'=>$id);
		$query = $this->db->where($where)->get('pos_bengkel_ksg_service');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumsub($id) {
		$query = $this->db->query("select sum(sub) as toro from pos_bengkel_ksg_service where id_pos_bengkel_ksg=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
