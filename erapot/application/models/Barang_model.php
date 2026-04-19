<?php
class Barang_model extends CI_Model {
	
    public function add($data) {
		$this->db->trans_start();
        $this->db->insert('barang',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data, $ids) {
		$this->db->where('id', $ids)->update('barang', $data);
	}
	
	public function record_count() {
        return $this->db->count_all('barang');
    }

	public function getall() {
		$query = $this->db->order_by('id', 'asc')->get('barang');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getallbarangjadi() {
		$query = $this->db->where('tipe_barang', '1')->order_by('id', 'asc')->get('barang');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getallbarangwip() {
		$query = $this->db->where('tipe_barang', '2')->order_by('id', 'asc')->get('barang');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getallbahanbaku() {
		$query = $this->db->where('tipe_barang', '3')->order_by('id', 'asc')->get('barang');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('barang', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getnama($id) {
		$query = $this->db->where('LOWER(nama)', strtolower($id))->get('truk', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get_autocomplete($id) {
		$query = $this->db			
			->group_start()
				->like('nama', $id)
				->or_like('id', $id)
			->group_end()
			->where('status', 1)->get('barang', 8, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get_autocompletecabanglist($id, $cabang) {
		$this->db->select('*');
		$this->db->from('barang');
		$this->db->join('barang_harga_beli', 'barang_harga_beli.id_barang = barang.id');
		$this->db->group_start();
			$this->db->like('LOWER(nama)', strtolower($id));
			$this->db->like('LOWER(id)', strtolower($id));
		$this->db->group_end();
		$this->db->where('barang.status', 1);
		$this->db->where('barang_harga_beli.id_m_cabang', $cabang);
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	
	public function get_autocomplete_bahanbaku($id) {
		$q = "SELECT * FROM barang WHERE tipe_barang=3 AND (nama LIKE '%{$id}%' OR id LIKE '%{$id}%')";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get_autocomplete_bahanjadi($id) {
		$q = "SELECT * FROM barang WHERE tipe_barang=1 AND (nama LIKE '%{$id}%' OR id LIKE '%{$id}%')";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function check_double($id) {
		$query = $this->db->where('LOWER(id)', $id)->get('barang');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getposbarang($id)
	{
		$q = "SELECT * FROM barang WHERE id in ('".$id."')";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
