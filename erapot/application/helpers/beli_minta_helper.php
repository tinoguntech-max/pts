<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_beli_minta'))
{
    function get_beli_minta($id)
    {
		$ci=& get_instance();
		$ci->load->model('beli_minta_model');
		$res = $ci->beli_minta_model->get($id);
		return $res[0]['no_faktur'];
		
    }   
}

if ( ! function_exists('get_beli_minta_tanggal'))
{
    function get_beli_minta_tanggal($id)
    {
		$ci=& get_instance();
		$ci->load->model('beli_minta_model');
		$res = $ci->beli_minta_model->get($id);
		return $res[0]['tanggal_buat'];
		
    }   
}