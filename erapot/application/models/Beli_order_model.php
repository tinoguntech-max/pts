<?php
class Beli_order_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('beli_order',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('beli_order', $data);
	}
    
	public function record_count() {
        return $this->db->count_all('beli_order');
    }

	public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('beli_order');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getbybeliminta($id) {
		$query = $this->db->where('id_beli_minta', $id)->order_by('tanggal', 'desc')->get('beli_order');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('beli_order', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan($tgl1 = null, $tgl2 = null, $supplier = '0', $cabang = '0', $no_faktur = '0', $tgl3 = '0', $tgl4 = '0', $status = '5') {
		$suppliers = explode(",", $supplier);
		$cabangs = explode(",", $cabang);
		$statuses = explode(",", $status);
		$this->db->select('*, COUNT(beli_order_detil.id_barang) AS count_barang, SUM(beli_order_detil.jumlah) AS total_barang, 
			SUM(beli_order_detil.sub) AS total_sub');
		$this->db->from('beli_order');
		$this->db->join('beli_order_detil', 'beli_order.id = beli_order_detil.id_beli_order', 'left outer');
		$this->db->where('date(tanggal) >=', $tgl1);
		$this->db->where('date(tanggal) <=', $tgl2);
		if ($supplier != '0')
			$this->db->where_in('beli_order.id_supplier', $suppliers);
		if ($cabang != '0')
			$this->db->where_in('beli_order.id_m_cabang', $cabangs);
		if ($status != '5')
			$this->db->where_in('beli_order.status', $statuses);
		if ($no_faktur != '0')
			$this->db->like('LOWER(beli_order.po_no)', strtolower($no_faktur));
		if ($tgl3 != '0' && $tgl4 != '0') {
			$this->db->where('date(beli_order.tanggal_kirim) >=', $tgl3);
			$this->db->where('date(beli_order.tanggal_kirim) <=', $tgl4);
		}
		$this->db->group_by('beli_order.id');
		$query = $this->db->get();
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function countby_tanggal($tanggal) {
		$this->db->select('id')
			->where('tanggal', $tanggal)
			->where('status !=', 4);
		$query = $this->db->get('beli_order');
		
		return is_numeric($query->num_rows()) ? $query->num_rows() : 0;
	}
	
	public function sumby_tanggal($tanggal) {
		$this->db->select_sum('total')
			->where('tanggal', $tanggal)
			->where('status !=', 4);
		$query = $this->db->get('beli_order');
		
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			return is_numeric($result[0]['total']) ? $result[0]['total'] : 0;
		}
		else
			return 0;
	}
	
	public function sumby_month($month, $year) {
		$this->db->select_sum('total')
			->where('month(tanggal)', $month)
			->where('year(tanggal)', $year)
			->where('status !=', 4);
		$query = $this->db->get('beli_order');
		
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			return is_numeric($result[0]['total']) ? $result[0]['total'] : 0;
		}
		else
			return 0;
	}

	public function get_autocomplete($q, $cabang=0) {
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
		$this->db->from('beli_order');
		$this->db->where('(status = 0 or status = 2)', NULL, false);
		//$this->db->or_where('status', 2);
		if ($cabang != 0)
			$this->db->where('id_m_cabang', $cabang);
		$this->db->where("(po_no like '%{$q}%')", NULL, false);
		$this->db->limit(7);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get_autocomplete_invoice($q, $cabang=0) {
		$this->db->select('*');
		$this->db->from('beli_order');
		$this->db->where('status !=', 0);
		$this->db->where('closed', 0);
		if ($cabang != 0)
			$this->db->where('id_m_cabang', $cabang);
		$this->db->where("(po_no like '%{$q}%')", NULL, false);
		$this->db->limit(7);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
