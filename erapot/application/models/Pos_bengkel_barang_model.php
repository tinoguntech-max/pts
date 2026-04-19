<?php
class Pos_bengkel_barang_model extends CI_Model {
	
	public function add($data) {
        $this->db->insert('pos_bengkel_barang',$data);
    }
	
	/*public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('hotline_detil', $data);
	}*/
	
	public function delete($id) {
		$this->db->delete('pos_bengkel_barang', array('id_pos_bengkel' => $id));
	}
    
	public function record_count() {
        return $this->db->count_all('pos_bengkel_barang');
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
		$query = $this->db->where($where)->get('pos_bengkel_barang');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getsumsub($id) {
		$query = $this->db->query("select sum(sub) as toro from pos_bengkel_barang where id_pos_bengkel=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
