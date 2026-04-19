<?php
class Ajax_model extends CI_Model {
	public function calon_mahasiswa($keyword){
		//prepare master db
		$data['table'] = "cl_mhs";
		$data['field'] = array("nama_depan", "nama_belakang", "kota");
		$data['keyword'] = $keyword;
		$data['except'] = array();
		
		//execute
		if (!empty($keyword))
			return($this->__result($data));
	}

	public function mahasiswa($keyword){
		//prepare master db
		$data['table'] = "mhs";
		$data['field'] = array("nik", "nama_depan", "nama_belakang", "kota");
		$data['keyword'] = $keyword;
		$data['except'] = array();
		
		//execute
		if (!empty($keyword))
			return($this->__result($data));
	}

	public function institusi($keyword){
		//prepare master db
		$data['table'] = "institusi";
		$data['field'] = array("nama", "alamat", "kota");
		$data['keyword'] = $keyword;
		$data['except'] = array("id >" => 1);
		
		//execute
		if (!empty($keyword))
			return($this->__result($data));
	}

	public function ict($keyword){
		//prepare master db
		$data['table'] = "ict_center";
		$data['field'] = array("nama_ict", "alamat", "geo_region", "kota");
		$data['keyword'] = $keyword;
		$data['except'] = array("kd_ict >" => 1);
		
		//execute
		if (!empty($keyword))
			return($this->__result($data));
	}

	public function universitas($keyword){
		//prepare master db
		$data['table'] = "universitas_center";
		$data['field'] = array("nama_universitas", "alamat", "kota");
		$data['keyword'] = $keyword;
		$data['except'] = array("kode >" => 1);
		
		//execute
		if (!empty($keyword))
			return($this->__result($data));
	}

	public function program($keyword){
		//prepare master db
		$data['table'] = "program";
		$data['field'] = array("nama_program", "deskripsi_program");
		$data['keyword'] = $keyword;
		$data['except'] = array();
		
		//execute
		if (!empty($keyword))
			return($this->__result($data));
	}
	
	public function sponsor($keyword){
		//prepare master db
		$data['table'] = "sponsor";
		$data['field'] = array("nama_sponsor", "alamat", "email", "contact_person");
		$data['keyword'] = $keyword;
		$data['except'] = array();
		
		//execute
		if (!empty($keyword))
			return($this->__result($data));
	}

	public function beasiswa($keyword){
		//prepare master db
		$data['table'] = "beasiswa";
		$data['field'] = array("nama_beasiswa", "deskripsi");
		$data['keyword'] = $keyword;
		$data['except'] = array();
		
		//execute
		if (!empty($keyword))
			return($this->__result($data));
	}

	private function __result($data = array()){
		foreach ($data['field'] as $key => $value)
			$xfield[$value] = $data['keyword'];

		$query = $this->db->or_like($xfield)->where($data['except'])->get($data['table'], 5, 0);

		if ($query->num_rows() > 0) {
			$result = $query->result_array();

			$output = array();
			foreach ($result as $key => $value)
				foreach ($data['field'] as $x => $y)
					array_push($output, $value[$y]);

			$output = array_unique($output);
		}
		else
			$output = 0;
		
		return(json_encode($output));	
	}
}
