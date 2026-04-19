<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_pembelian'))
{
    function get_pembelian($id)
    {
		$ci=& get_instance();
		$ci->load->model('pembelian_model');
		$res = $ci->pembelian_model->get($id);
		if ($res)
			return $res[0]['tanggal'].' / '.$res[0]['nota_no'];
		else
			return '';
    }
}

if ( ! function_exists('get_pembelian_supplier'))
{
    function get_pembelian_supplier($id)
    {
		$ci=& get_instance();
		$ci->load->model('pembelian_model');
		$res = $ci->pembelian_model->get($id);
		$toro = $res[0]['id_supplier'];
		$ci->load->model('supplier_model');
		$res = $ci->supplier_model->get($toro);
		return $res[0]['nama'];	
    }
}