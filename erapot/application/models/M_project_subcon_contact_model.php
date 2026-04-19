<?php
class M_project_subcon_contact_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('m_project_subcon_contact',$data);
    }
	
	public function delete($id) {
		$this->db->delete('m_project_subcon_contact', array('id_m_project_subcon' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('m_project_subcon_contact');
    }

	public function getbym_project_subcon($id) {
		$where = array('id_m_project_subcon'=>$id);
		$query = $this->db->where($where)->get('m_project_subcon_contact');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
