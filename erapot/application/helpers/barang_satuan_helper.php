<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_barang_satuan_converts'))
{
    function get_barang_satuan_converts($id)
    {
		$ci=& get_instance();
		$ci->load->model('barang_satuan_model');
		$res = $ci->barang_satuan_model->getbybarang($id);
		if ($res != 0)
			return $res;
		else
			return 0;
		
    }   
}
if ( ! function_exists('get_barang_satuan_converts_order'))
{
    function get_barang_satuan_converts_order($id, $satuan)
    {
		$ci=& get_instance();
		$ci->load->model('barang_satuan_model');
		$res = $ci->barang_satuan_model->getbybarangandsatuan($id, $satuan);
		if ($res != 0)
			return $res;
		else
			return 0;
		
    }   
}