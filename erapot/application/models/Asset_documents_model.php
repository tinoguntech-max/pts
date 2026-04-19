<?php
class Asset_documents_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('asset_documents',$data);
    }
	
	public function delete($id) {
		$this->db->delete('asset_documents', array('id_m_asset' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('asset_documents');
    }

	public function getbyasset($id) {
		$where = array('id_m_asset'=>$id);
		$query = $this->db->where($where)->get('asset_documents');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
