<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_stock_avg_last_qty'))
{
    function get_stock_avg_last_qty($barang, $cabang)
    {
		$ci=& get_instance();
		$ci->load->model('stock_avg_model');
		$res = $ci->stock_avg_model->getlastbybarang($barang, $cabang);
		if ($res != 0)
			return $res[0]['qty_left'];
		else
			return 0;
    }   
}

if ( ! function_exists('get_stock_avg_last_price'))
{
    function get_stock_avg_last_price($barang, $cabang)
    {
		$ci=& get_instance();
		$ci->load->model('stock_avg_model');
		$res = $ci->stock_avg_model->getlastbybarang($barang, $cabang);
		if ($res != 0)
			return $res[0]['price_left'];
		else
			return 0;
    }   
}