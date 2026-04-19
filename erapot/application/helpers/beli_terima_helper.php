<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_beli_terima'))
{
    function get_beli_terima($id)
    {
		$ci=& get_instance();
		$ci->load->model('beli_terima_model');
		$res = $ci->beli_terima_model->get($id);
		return $res[0]['bpb_no'];
		
    }   
}

if ( ! function_exists('get_beli_terima_tanggal'))
{
    function get_beli_terima_tanggal($id)
    {
		$ci=& get_instance();
		$ci->load->model('beli_terima_model');
		$res = $ci->beli_terima_model->get($id);
		return $res[0]['tanggal'];
		
    }   
}