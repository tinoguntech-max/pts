<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_produksi_delivery_sum_datang'))
{
    function get_produksi_delivery_sum_datang($id, $id1)
    {
		$ci=& get_instance();
		$ci->load->model('produksi_delivery_detil_model');
		$res = $ci->produksi_delivery_detil_model->getsumdatang($id, $id1);
		return $res[0]['toro'];
		
    }   
}