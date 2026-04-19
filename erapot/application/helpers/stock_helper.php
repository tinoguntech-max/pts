<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('get_stock_last'))
{
    function get_stock_last($barang, $cabang)
    {
		$ci=& get_instance();
		$ci->load->model('stock_model');
		$res = $ci->stock_model->getlastbybarang($barang, $cabang);
		if ($res != 0)
			return $res[0]['qty_left'];
		else
			return 0;
    }   
}

if ( ! function_exists('get_sum_selling'))
{
    function get_sum_selling($barang, $cabang)
    {
		$ci=& get_instance();
		$ci->load->model('stock_model');
		$res = $ci->stock_model->sumnotsellingyetbranch($barang, $cabang);
		if ($res != 0)
			return $res[0]['toro'];
		else
			return 0;
    }   
}