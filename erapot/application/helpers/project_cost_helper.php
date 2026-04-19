<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_project_cost'))
{
    function get_project_cost($project, $cost)
    {
		$ci=& get_instance();
		$ci->load->model('project_cost_model');
		$res = $ci->project_cost_model->get($project, $cost);
		if ($res != 0)
			return $res[0]['harga_total'];
		else
			return 0;
    }   
}