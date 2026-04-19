<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_barang'))
{
    function get_barang($id)
    {
		$ci=& get_instance();
		$ci->load->model('barang_model');
		$res = $ci->barang_model->get($id);
		return $res[0]['nama'];
		
    }   
}

if ( ! function_exists('get_barang_satuan'))
{
    function get_barang_satuan($id)
    {
		$ci=& get_instance();
		$ci->load->model('barang_model');
		$ci->load->model('satuan_model');
		$res = $ci->barang_model->get($id);
		$res1 = $ci->satuan_model->get($res[0]['id_satuan']);
		return $res1[0]['nama'];
    }   
}

if ( ! function_exists('get_barang_satuan_convert'))
{
    function get_barang_satuan_convert($id)
    {
		$ci=& get_instance();
		$ci->load->model('barang_model');
		$ci->load->model('satuan_model');
		$res = $ci->barang_model->get($id);
		$res1 = $ci->satuan_model->get($res[0]['id_satuan_convert']);
		return $res1[0]['nama'];
    }   
}

if ( ! function_exists('get_barang_besar_convert'))
{
    function get_barang_besar_convert($id)
    {
		$ci=& get_instance();
		$ci->load->model('barang_model');
		$res = $ci->barang_model->get($id);
		return $res[0]['besar_convert'];
    }   
}