<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_sum_jumlah_jual_order_detil'))
{
    function get_sum_jumlah_jual_order_detil($id)
    {
		$ci=& get_instance();
		$ci->load->model('jual_order_detil_model');
		$res = $ci->jual_order_detil_model->getsumjumlah($id);
		return $res[0]['toro'];
		
    }   
}

if ( ! function_exists('get_jual_order_detil_sisa'))
{
    function get_jual_order_detil_sisa($id, $barang)
    {
		$ci=& get_instance();
		$ci->load->model('jual_order_detil_model');
		$res = $ci->jual_order_detil_model->getbyjualorderandbarang($id, $barang);
		return $res[0]['jumlah_sisa'];
		
    }   
}