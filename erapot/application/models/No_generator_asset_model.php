<?php
class No_generator_asset_model extends CI_Model {
	
    public function add($data) {
        $this->db->insert('no_generator_asset',$data);
    }
	
	public function updatebyperiode($data) {
		$array = array('bulan'=>$data['bulan'], 'tahun'=>$data['tahun'], 'jenis'=>$data['jenis']);
		$this->db->where($array)->update('no_generator_asset', $data);
	}
	
	public function record_count() {
        return $this->db->count_all('no_generator_asset');
    }

	public function getall() {
		$query = $this->db->order_by('tahun', 'desc')->get('no_generator_asset');
		
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}

	public function get($bulan, $tahun, $jenis) {
		$query = $this->db->where(array('bulan'=>$bulan, 'tahun'=>$tahun, 'jenis'=>$jenis))->get('no_generator_asset', 1, 0);
		if ($query->num_rows() > 0)
			return $query->result_array();
		else
			return 0;
	}
}
