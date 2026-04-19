<?php
class Supplier_contact_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('supplier_contact',$data);
    }
	
	public function delete($id) {
		$this->db->delete('supplier_contact', array('id_supplier' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('supplier_contact');
    }

	public function getbysupplier($id) {
		$where = array('id_supplier'=>$id);
		$query = $this->db->where($where)->get('supplier_contact');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
