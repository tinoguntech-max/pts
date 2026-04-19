<?php
class misc_model extends CI_Model {
	public function tanggal() {
		$tanggal = array();

		for ($i = 1; $i <= 31 ; $i++) {
			if ($i <= 9) $j = "0".$i;
			else $j = $i;
			$tanggal[$j] = $j;
		}

		return $tanggal;
	}

	public function bulan() {
		$bulan = array(
			"01" => "Januari",
			"02" => "Februari",
			"03" => "Maret",
			"04" => "April",
			"05" => "Mei",
			"06" => "Juni",
			"07" => "Juli",
			"08" => "Agustus",
			"09" => "September",
			"10" => "Oktober",
			"11" => "November",
			"12" => "Desember"
			);

		return $bulan;
	}

	public function tahun(){
		$start = date("Y") - 55;
		$end = date("Y") - 15;

		$tahun = array();
		for ($i = $start; $i < $end; $i++) { 
			$tahun[$i] = $i;
		}

		return $tahun;
	}
	
	public function tahunsekarang(){
		$start = date("Y") - 5;
		$end = date("Y") + 10;

		$tahun = array();
		for ($i = $start; $i < $end; $i++) { 
			$tahun[$i] = $i;
		}

		return $tahun;
	}
	
	public function semester() {
		$semester = array();

		for ($i = 1; $i <= 12 ; $i++) {
			$semester[$i] = $i;
		}

		return $semester;
	}

	public function negara() {
		$negara = array(
			"Australia" => "Australia",
			"Brazil" => "Brazil",
			"Canada" => "Canada",
			"China" => "China",
			"France" => "France",
			"Germany" => "Germany",
			"India" => "India",
			"Indonesia" => "Indonesia",
			"Israel" => "Israel",
			"Italy" => "Italy",
			"Japan" => "Japan",
			"Korea" => "Korea",
			"Malaysia" => "Malaysia",
			"Netherlands" => "Netherlands",
			"New Zealand" => "New Zealand",
			"Singapore" => "Singapore",
			"Thailand" => "Thailand",
			"United Kingdom" => "United Kingdom",
			"United States of America" => "United States of America",
			"Lainnya" => "Lainnya"
			);

		return $negara;
	}

}
