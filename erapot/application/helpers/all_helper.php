<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_data'))
{
    function get_data($table, $where='id', $id, $return)
    {
		$ci=& get_instance();
		$ci->load->model('all_model');
		$res = $ci->all_model->get($table, $where, $id);
		return $res[0][$return];
    }
}

if ( ! function_exists('valid_id'))
{
    function valid_id($table, $where='id', $id)
    {
		$ci=& get_instance();
		$ci->load->model('all_model');
		$res = $ci->all_model->get($table, $where, $id);
		if ($res != 0)
			return true;
		else
			return false;
    }
}

if ( ! function_exists('validateDate'))
{
	function validateDate($date, $format = 'Y-m-d H:i:s')
	{
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}
}

if ( ! function_exists('romanicNumber'))
{
	function romanicNumber($integer, $upcase = true) 
	{
		$table = array('M'=>1000, 'CM'=>900, 'D'=>500, 'CD'=>400, 'C'=>100, 'XC'=>90, 'L'=>50, 'XL'=>40, 'X'=>10, 'IX'=>9, 'V'=>5, 'IV'=>4, 'I'=>1);
		$return = '';
		while($integer > 0) {
			foreach($table as $rom=>$arb) {
				if($integer >= $arb) {
					$integer -= $arb;
					$return .= $rom;
					break;
				}
			}
		}
		return $return;
	}
}

if ( ! function_exists('noGenerator'))
{
	function noGenerator($transaksi, $date, $type, $branch = NULL)
	{
		// check template availability
		$ci=& get_instance();
		$ci->load->model('general_template_model');
		$ci->load->model('no_generator_model');
		$general = $ci->general_template_model->getnama($transaksi);
		if ($general != 0)
			$template = $general[0]['no_generator'];
		else
			$template = $transaksi.'/{{MONTH}}/{{YEAR}}/{{VALUE}}';
		$cabang = get_data('m_cabang','id',$branch,'kode');
		
		$dates = $date;
		$date = explode('-',$dates);
		$bulan = $date[1];
		$tahun = $date[0];
		
		$cBulan = (strpos($template, '{{MONTH}}') === false && strpos($template, '{{MONTH_ROME}}') === false) ? NULL : $bulan;
		$cTahun = (strpos($template, '{{YEAR}}') === false && strpos($template, '{{YEAR_ROME}}') === false) ? NULL : $tahun;
		$cBranch = (strpos($template, '{{BRANCH}}') === false) ? NULL : $branch;
		
		//check apakah ada generator
		$res = $ci->no_generator_model->get($cBulan, $cTahun, $type, $cBranch);
		if ($res != 0) {
			$template = str_replace('{{MONTH}}', $bulan, $template);
			$template = str_replace('{{MONTH_ROME}}', romanicNumber($bulan), $template);
			$template = str_replace('{{YEAR}}', $tahun, $template);
			$template = str_replace('{{YEAR_ROME}}', romanicNumber($tahun), $template);
			$template = str_replace('{{BRANCH}}', $cabang, $template);
			$template = str_replace('{{VALUE}}', $res[0]['nilai'], $template);
			$toros_insert = array(
				"bulan" => $cBulan,
				"tahun" => $cTahun,
				"id_m_cabang" => $cBranch,
				"nilai" => ($res[0]['nilai'] + 1),
				"jenis" => $type
			);
			$ci->no_generator_model->updatebyperiode($toros_insert);
		}
		else {
			$template = str_replace('{{MONTH}}', $bulan, $template);
			$template = str_replace('{{MONTH_ROME}}', romanicNumber($bulan), $template);
			$template = str_replace('{{YEAR}}', $tahun, $template);
			$template = str_replace('{{YEAR_ROME}}', romanicNumber($tahun), $template);
			$template = str_replace('{{BRANCH}}', $cabang, $template);
			$template = str_replace('{{VALUE}}', '1', $template);
			$toros_insert = array(
				"bulan" => $cBulan,
				"tahun" => $cTahun,
				"id_m_cabang" => $cBranch,
				"nilai" => 2,
				"jenis" => $type
			);
			$ci->no_generator_model->add($toros_insert);
		}
		return $template;
	}
	
}

if (! function_exists('terbilang'))
{
    function terbilang($x = 0)
    {
        if($x!=0){
      $abil = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
      if ($x < 12)
        return " " . $abil[$x];
      elseif ($x < 20)
        return Terbilang($x - 10) . " belas";
      elseif ($x < 100)
        return Terbilang($x / 10) . " puluh" . Terbilang($x % 10);
      elseif ($x < 200)
        return " seratus" . Terbilang($x - 100);
      elseif ($x < 1000)
        return Terbilang($x / 100) . " ratus" . Terbilang($x % 100);
      elseif ($x < 2000)
        return " seribu" . Terbilang($x - 1000);
      elseif ($x < 1000000)
        return Terbilang($x / 1000) . " ribu" . Terbilang($x % 1000);
      elseif ($x < 1000000000)
        return Terbilang($x / 1000000) . " juta" . Terbilang($x % 1000000);
        }
    }
}