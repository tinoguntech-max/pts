<?php
class Stock_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('stock',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('stock', $data);
	}
    
	public function record_count() {
        return $this->db->count_all('stock');
    }

	public function getall() {
		$query = $this->db->order_by('tanggal', 'desc')->get('stock');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getallpenerimaan() {
		$query = $this->db->where('keterangan','PENERIMAAN')->order_by('tanggal', 'desc')->get('stock');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('stock', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getlastbybarang($id, $cabang=0) {
		$where = "id_barang = '{$id}'";
		if ($cabang != 0)
			$where .= " AND id_m_cabang = {$cabang}";
		$query = $this->db->where($where)->order_by('tanggal desc, id desc')->get('stock', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	// public function getlastbybarangnotif($cabang=0) {
		// if ($cabang != 0)
			// $where .= " AND id_m_cabang = {$cabang}";
		// $query = $this->db->where($where)->order_by('tanggal desc, id desc')->get('stock');
		// if ($query->num_rows() > 0)
			// return $query->result_array();
		// else
			// return 0;
	// }
	
	// khusus untuk update untuk mengetahui harga dan stock sebelum id yang dimaksud
	public function getlastbybarangbefore($id, $id1, $cabang=0) {
		$query = $this->db->where('id', $id1)->get('stock', 1, 0);
		$b = $query->result_array();
		$tanggal = $b[0]['tanggal'];
		
		$where = "id_barang = '{$id}' AND date(tanggal) = '{$tanggal}' AND id < {$id1}";
		if ($cabang != 0)
			$where .= " AND id_m_cabang = {$cabang}";
		$query = $this->db->where($where)->order_by('tanggal desc, id desc')->get('stock', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else {
			// select distinct tanggal sebelumnya
			$query = $this->db->distinct()->select('tanggal')->where(array('date(tanggal) <'=>$tanggal, 'id_m_cabang'=>$cabang))->order_by('tanggal desc')->get('stock',1,0);
			if ($query->num_rows() > 0) {
				$a = $query->result_array();
				$tanggal1 = $a[0]['tanggal'];
				$where1 = "id_barang = '{$id}' AND date(tanggal) = '{$tanggal1}'";
				if ($cabang != 0)
					$where1 .= " AND id_m_cabang = {$cabang}";
				$query = $this->db->where($where1)->order_by('tanggal desc, id desc')->get('stock',1,0);
				if ($query->num_rows() > 0)
					return $query->result_array();
				else
					return 0;
			}
			else
				return 0;
		}
	}
	
	public function getlastbybarangbeforetanggal($id, $id1, $tanggal, $cabang=0) {
		$query = $this->db->where(array('id_barang'=>$id, 'date(tanggal)'=>$tanggal, 'id <'=>$id1, 'id_m_cabang'=>$cabang))->order_by('tanggal desc, id desc')->get('stock', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else {
			// select distinct tanggal sebelumnya
			$query = $this->db->distinct()->select('tanggal')->where(array('date(tanggal) <'=>$tanggal))->order_by('tanggal desc')->get('stock',1,0);
			if ($query->num_rows() > 0) {
				$a = $query->result_array();
				$tanggal1 = $a[0]['tanggal'];
				$query = $this->db->where(array('id_barang'=>$id,'date(tanggal)'=>$tanggal1))->order_by('tanggal desc, id desc')->get('stock',1,0);
				if ($query->num_rows() > 0)
					return $query->result_array();
				else
					return 0;
			}
			else
				return 0;
		}
	}
	
	public function getstockawal($id, $tanggal, $cabang='0') {
		$q = "SELECT max(id) as toro FROM stock WHERE id_barang = '{$id}' AND date(tanggal) < '{$tanggal}'";
		if ($cabang != '0')
			$q .= " AND id_m_cabang = {$cabang}";
		$query1 = $this->db->query($q);
		$a = $query1->result_array();
		
		$query = $this->db->where('id', $a[0]['toro'])->get('stock', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbyidrujukan($id, $id1, $id2) {
		$query = $this->db->where(array('id_trans'=>$id, 'keterangan'=>$id1, 'id_barang'=>$id2))->get('stock', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbyidrujukan1($id, $id1) {
		$query = $this->db->where(array('id_trans'=>$id, 'keterangan'=>$id1))->get('stock', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	// untuk menjalankan hitung ulang backdate atau update
	public function getneedupdate() {
		$where = "status = 1";
		$query = $this->db->where($where)->order_by('tanggal asc, id asc')->get('stock');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getrowsaffected($id_row, $id_barang, $tanggal, $cabang = 0) {
		$where = "(date(tanggal) > '{$tanggal}' OR (date(tanggal) = '{$tanggal}' AND id >= {$id_row})) AND id_barang = '{$id_barang}' 
			AND id_m_cabang = {$cabang}";
		$query = $this->db->where($where)->order_by('tanggal asc, id asc')->get('stock');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getrowsaffectedpenjualan($id_row, $id_barang, $tanggal, $cabang = 0) {
		$where = "(date(tanggal) > '{$tanggal}' OR (date(tanggal) = '{$tanggal}' AND id > {$id_row})) AND id_barang = '{$id_barang}' AND keterangan = 'PENJUALAN' 
			AND id_m_cabang = {$cabang}";
		$query = $this->db->where($where)->order_by('tanggal asc, id asc')->get('stock');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	// untuk FIFO
	public function getnotsellingyet($id_barang, $cabang=0) {
		$where = "id_barang = '{$id_barang}' AND id_m_cabang={$cabang} AND sell_left > 0";
		$query = $this->db->where($where)->order_by('tanggal asc, id asc')->get('stock', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function sumnotsellingyet($id_barang) {
		$query = $this->db->query("select sum(sell_left) as toro from stock where id_barang='".$id_barang."'");
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function sumnotsellingyetbranch($id_barang, $branch) {
		$query = $this->db->query("select sum(sell_left) as toro from stock where id_barang='".$id_barang."' and id_m_cabang='".$branch."'");
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function laporan($tgl1 = null, $tgl2 = null, $barang='0', $cabang='0') {
		$q = "select * from stock where date(tanggal)>='".$tgl1."' and date(tanggal)<='".$tgl2."'";
		if ($barang != '0')
			$q .= " AND id_barang = '{$barang}'";
		if ($cabang != '0')
			$q .= " AND id_m_cabang = {$cabang}";
		$q .= " order by tanggal asc, id asc";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function stockopname($cabang='0') {
		$q = "SELECT id_barang FROM stock WHERE id_m_cabang = {$cabang} GROUP BY id_barang";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
