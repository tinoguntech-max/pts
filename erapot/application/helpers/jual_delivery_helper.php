<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_jual_delivery'))
{
    function get_jual_delivery($id)
    {
		$ci=& get_instance();
		$ci->load->model('jual_delivery_model');
		$res = $ci->jual_delivery_model->get($id);
		return $res[0]['do_no'];
		
    }   
}

if ( ! function_exists('get_jual_delivery_tanggal'))
{
    function get_jual_delivery_tanggal($id)
    {
		$ci=& get_instance();
		$ci->load->model('jual_delivery_model');
		$res = $ci->jual_delivery_model->get($id);
		return $res[0]['tanggal'];
		
    }   
}