<?php
class Siswa_model extends CI_Model {
    
	public function add($data) {
		$this->db->trans_start();
        $this->db->insert('el_siswa',$data);
		$insert_id = $this->db->insert_id();
		$this->db->trans_complete();
		return $insert_id;
	}
    public function record_count() {
        return $this->db->count_all('el_siswa');
    }

	public function getall() {
		$query = $this->db->order_by('nama', 'asc')->get('el_siswa');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	public function getbykelasactive($id_kelas) {
		$query = $this->db->where('kelas_id', $id_kelas)->where('aktif', 1 )->order_by('nama', 'asc')->get('el_siswa');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($id) {
		$query = $this->db->where('id', $id)->get('el_siswa', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getmuridbycabang($id) {
		$query = $this->db->where('id_m_cabang', $id)->get('el_siswa');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function getbynik($id) {
		$query = $this->db->where('nis', $id)->get('el_siswa', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function update($data) {
		$array = array('id'=>$data['id']);
		$this->db->where($array)->update('el_siswa', $data);
	}
	
	public function get_autocomplete($id) {
		$query = $this->db->where('status', '1')->like('nama', $id)->get('el_siswa', 8, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function get_autocompletecabang($id, $cabang) {
		$query = $this->db->where('id_m_cabang', $cabang)->where('status', '1')->like('nama', $id)->get('el_siswa', 8, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	// public function get_autocomplete($id) {
		// $query = $this->db->like('nama', $id)->get('el_siswa', 8, 0);
		// if ($query->num_rows() > 0)
			// return $query->result_array();
		// else
			// return 0;
	// }

	public function check_double($id) {
		$query = $this->db->where('LOWER(nama)', $id)->get('el_siswa');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
	
	public function check_double_nik($id) {
		$query = $this->db->where('TRIM(LOWER(nik))', $id)->get('el_siswa');
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function laporan($murid = null, $kelas = null) {
		$q = "SELECT * from el_siswa WHERE status = 1";
		if ($murid != '0') $q .= " AND id IN (".$murid.")";
		if ($kelas != '0') $q .= " AND id_m_kelas IN (".$kelas.")";
		$query = $this->db->query($q);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

}
