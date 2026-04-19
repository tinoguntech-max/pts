<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_beli_minta_detil_sisa'))
{
    function get_beli_minta_detil_sisa($id, $id1)
    {
		$ci=& get_instance();
		$ci->load->model('beli_minta_detil_model');
		$res = $ci->beli_minta_detil_model->getbybarang($id, $id1);
		return $res[0]['jumlah_sisa'];
		
    }   
}