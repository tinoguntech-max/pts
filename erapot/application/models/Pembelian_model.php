<?php
class Pembelian_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('pembelian',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('pembelian', $data);
	}
    
	public function record_count() {
        return $this->db->count_all('pembelian');
    }

	public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('pembelian');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getpenumpang($id) {
		$query = $this->db->where('id_pembelian', $id)->get('pembelian');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	// id pembelian dan id include semua
	public function getpenumpangall($id) {
		$query = $this->db->where('id_pembelian', $id)->or_where('id', $id)->get('pembelian');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbysupplier($id) {
		$query = $this->db->where('id_supplier', $id)->get('pembelian');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('pembelian', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan_pembelian($tgl1 = null, $tgl2 = null) {
		$query = $this->db->query("select * from pembelian where tanggal>='".$tgl1."' and tanggal<='".$tgl2."'");
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function countby_tanggal($tanggal) {
		$query = $this->db->query("select id as toro from pembelian where tanggal='".$tanggal."'");

		if ($query->num_rows() > 0)
			return $query->num_rows();
		else
			return 0;
	}
	
	public function sumby_tanggal($tanggal) {
		$query = $this->db->query("select sum(total) as toro from pembelian where tanggal='".$tanggal."'");

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function sumby_numpang($id) {
		$query = $this->db->query("select sum(total) as toro from pembelian where id_pembelian=".$id." or id=".$id);

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get_autocomplete($q) {
		// hanya berlaku untuk codeigniter 3
		/*$this->db->from('pembelian');
		$this->db->join('supplier', 'pembelian.id_supplier = supplier.id');
		$this->db->where('internasional', 1);
		$this->db->group_start();
		$this->db->like('nota_no', $q);
		$this->db->or_like('nama', $q);
		$this->db->group_end();
		$this->db->limit(7);
		$query = $this->db->get();*/
		
		$this->db->select('pembelian.id, nama, alamat, tanggal, nota_no');
		$this->db->from('pembelian');
		$this->db->join('supplier', 'pembelian.id_supplier = supplier.id');
		$this->db->where('internasional', 1);
		$this->db->where("(nota_no like '%{$q}%' or nama like '%{$q}%')", NULL, false);
		$this->db->limit(7);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
