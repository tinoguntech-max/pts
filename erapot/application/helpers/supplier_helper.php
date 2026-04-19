<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_supplier'))
{
    function get_supplier($id)
    {
		$ci=& get_instance();
		$ci->load->model('supplier_model');
		$res = $ci->supplier_model->get($id);
		return $res[0]['nama'];	
    }
}

if ( ! function_exists('get_supplier_alamat'))
{
    function get_supplier_alamat($id)
    {
		$ci=& get_instance();
		$ci->load->model('supplier_model');
		$res = $ci->supplier_model->get($id);
		return $res[0]['alamat'];	
    }
}

if ( ! function_exists('get_supplier_telp'))
{
    function get_supplier_telp($id)
    {
		$ci=& get_instance();
		$ci->load->model('supplier_model');
		$res = $ci->supplier_model->get($id);
		return $res[0]['telp'];	
    }
}