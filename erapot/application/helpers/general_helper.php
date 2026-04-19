<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('error_notification'))
{
    function error_notification($message)
    {
		return '<div class="alert alert-danger alert-dismissable">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			<strong>Error!</strong> '.$message.'
		</div>';
    }   
}
