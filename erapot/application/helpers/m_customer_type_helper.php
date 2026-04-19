<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_m_customer_type'))
{
    function get_m_customer_type($id)
    {
		
		$ci=& get_instance();
		$ci->load->model('m_customer_type_model');
		$res = $ci->m_customer_type_model->get($id);
		return $res[0]['nama'];
		
    }   
}
