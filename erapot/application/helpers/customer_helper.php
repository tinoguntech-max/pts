<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_customer'))
{
    function get_customer($id)
    {
		$ci=& get_instance();
		$ci->load->model('customer_model');
		$res = $ci->customer_model->get($id);
		return $res[0]['nama'];	
    }
}

if ( ! function_exists('get_customer_alamat'))
{
    function get_customer_alamat($id)
    {
		$ci=& get_instance();
		$ci->load->model('customer_model');
		$res = $ci->customer_model->get($id);
		return $res[0]['alamat'];	
    }
}

if ( ! function_exists('get_customer_telp'))
{
    function get_customer_telp($id)
    {
		$ci=& get_instance();
		$ci->load->model('customer_model');
		$res = $ci->customer_model->get($id);
		return $res[0]['telp'];	
    }
}