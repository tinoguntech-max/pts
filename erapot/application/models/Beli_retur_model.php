<?php
class Beli_retur_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('beli_retur',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('beli_retur', $data);
	}
    
	public function record_count() {
        return $this->db->count_all('beli_retur');
    }

	public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('beli_retur');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('beli_retur', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbysupplier($id) {
		$where = "id_supplier ='".$id."' AND total > total_diganti";
		$query = $this->db->where($where)->get('beli_retur');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	// public function laporan($tgl1 = null, $tgl2 = null, $cabang = '0', $barang='0', $rb_no='0') {
		// $q = "select * from beli_retur where date(tanggal)>='".$tgl1."' and date(tanggal)<='".$tgl2."'";
		// if ($cabang != '0') $q .= " AND id_m_cabang IN (".$cabang.")";
		// if ($barang != '0') $q .= " AND id_barang IN (".$barang.")";
		// if ($rb_no != '0') $q .= " AND LOWER(rb_no) LIKE '%".strtolower($rb_no)."%'";
		// $query = $this->db->query($q);
		// if ($query->num_rows() > 0)
			// return $query->result_array();
		// else
			// return 0;
	// }
	
	public function laporan($tgl1 = null, $tgl2 = null, $cabang = '0', $barang='0', $rb_no='0') {
		$cabangs = explode(",", $cabang);
		$barangs = explode(",", $barang);
		$this->db->select('*');
		$this->db->from('beli_retur');
		$this->db->where('date(tanggal) >=', $tgl1);
		$this->db->where('date(tanggal) <=', $tgl2);
		if ($cabang != '0')
			$this->db->where_in('id_m_cabang', $cabangs);
		if ($barang != '0')
			$this->db->where_in('id_barang', $barangs);
		if ($rb_no != '0')
			$this->db->like('LOWER(rb_no)', strtolower($rb_no));
		$query = $this->db->get();
		
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
		
		$this->db->select('*');
		$this->db->from('beli_retur');
		$this->db->where('status', 0);
		$this->db->where("(bpb_no like '%{$q}%')", NULL, false);
		$this->db->limit(7);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
