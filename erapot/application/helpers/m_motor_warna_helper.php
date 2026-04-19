<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_m_motor_warna'))
{
    function get_m_motor_warna($id)
    {
		
		$ci=& get_instance();
		$ci->load->model('m_motor_warna_model');
		$res = $ci->m_motor_warna_model->get($id);
		return $res[0]['nama'];
		
    }   
}
