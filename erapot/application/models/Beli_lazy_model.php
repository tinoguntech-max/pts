<?php
class Beli_lazy_model extends CI_Model {
	
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('beli_lazy',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
    }
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('beli_lazy', $data);
	}
    
	public function record_count() {
        return $this->db->count_all('beli_lazy');
    }

	public function getall() {
		$query = $this->db->lazy_by('tanggal', 'desc')->get('beli_lazy');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('beli_lazy', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybelilazy($id) {
		$query = $this->db->where(array('id_beli_lazy'=>$id, 'status'=>0))->order_by('tanggal', 'asc')->get('beli_lazy');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbybeliinvoice($id) {
		$query = $this->db->where(array('id_beli_invoice'=>$id))->get('beli_lazy', 1, 0);
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	
	public function laporan($tgl1 = null, $tgl2 = null) {
		$query = $this->db->query("select *, id as id_lazy from beli_lazy where date(tanggal)>='".$tgl1."' and date(tanggal)<='".$tgl2."'");
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function countby_tanggal($tanggal) {
		$this->db->select('id')
			->where('tanggal', $tanggal)
			->where('status !=', 4);
		$query = $this->db->get('beli_lazy');
		
		return is_numeric($query->num_rows()) ? $query->num_rows() : 0;
	}
	
	public function sumby_tanggal($tanggal) {
		$this->db->select_sum('total')
			->where('tanggal', $tanggal)
			->where('status !=', 4);
		$query = $this->db->get('beli_lazy');
		
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
		$query = $this->db->get('beli_lazy');
		
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			return is_numeric($result[0]['total']) ? $result[0]['total'] : 0;
		}
		else
			return 0;
	}

	public function getbelilazy($id)
	{
		$q = "SELECT * FROM beli_lazy WHERE id in ('".$id."')";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function getbeliinvoice($id)
	{
		$q = "SELECT * FROM beli_lazy WHERE id in ('".$id."')";
		$query = $this->db->query($q);
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
		
		$this->db->select('*');
		$this->db->from('beli_lazy');
		$this->db->where('(status = 0 or status = 2)', NULL, false);
		//$this->db->or_where('status', 2);
		$this->db->where("(so_no like '%{$q}%')", NULL, false);
		$this->db->limit(7);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get_autocomplete_invoice($q) {
		$this->db->select('*');
		$this->db->from('beli_lazy');
		$this->db->where('status !=', 0);
		$this->db->where('closed', 0);
		$this->db->where("(so_no like '%{$q}%')", NULL, false);
		$this->db->limit(7);
		$query = $this->db->get();

		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
