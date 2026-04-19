<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_jual_motor_delivery'))
{
    function get_jual_motor_delivery($id)
    {
		$ci=& get_instance();
		$ci->load->model('jual_motor_delivery_model');
		$res = $ci->jual_motor_delivery_model->get($id);
		return $res[0]['delivery_no'];
    }   
}

if ( ! function_exists('get_jual_motor_delivery_by_order'))
{
    function get_jual_motor_delivery_by_order($id)
    {
		$ci=& get_instance();
		$ci->load->model('jual_motor_delivery_model');
		$res = $ci->jual_motor_delivery_model->getbyorder($id);
		return $res[0]['delivery_no'];
    }   
}

