<?php
class Access_group_detil_model extends CI_Model {

	public function getbyid($id1, $id2) {
		$query = $this->db->where(array('id_access_group'=>$id1, 'id_access_master'=>$id2))->get('access_group_detil', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbyaccessgroup($id) {
		$query = $this->db->where(array('id_access_group'=>$id))->get('access_group_detil');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbynama($id1, $id2) {
		$this->db->select('*');
		$this->db->from('access_group_detil');
		$this->db->join('access_master', 'access_group_detil.id_access_master = access_master.id');
		$this->db->where(array('access_group_detil.id_access_group'=>$id1, 'access_master.nama'=>$id2));
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
