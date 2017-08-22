<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if ( ! function_exists('is_login')) {
    function is_login($role = NULL) {
		$CI =& get_instance();
		// We need to use $CI->session instead of $this->session
		$valid = $CI->session->userdata('fcs_validate_user');	
		if(!$valid) {
			redirect('/login');
		}
		else {
			if($role != NULL) {
				$login_user_role = $CI->session->userdata('fcs_role_id');	


				if($login_user_role != $role) {
					//show_404();
					redirect(base_url().'my404');
					exit();
				}

				// if(in_array($login_user_role,$role)){
				 //show_404();
				// 	redirect(base_url().'my404');
				// 	exit();
				// }
			}
		}
	}   
}



//  convertion of date (mm / dd / yyyy) to (yyyy - mm - dd)

// if ( ! function_exists('date_conv')) {
//     function date_conv($date) {
// 		$CI =& get_instance();
		
// 		if(!empty($date)){
// 			$date = DateTime::createFromFormat('m/d/Y',$date);
// 			return $date->format("Y-m-d");
// 		}	
		
// 		return '2017-00-00';
// 	}	
// }   




//  convertion of date (yyyy - mm - dd) to (mm / dd / yyyy) 

// if ( ! function_exists('date_deconv')) {
//     function date_deconv($date) {
// 		$CI =& get_instance();
		
// 		if(!empty($date)){
// 			$date = DateTime::createFromFormat('Y-m-d',$date);
		
// 		return $date->format("m/d/Y");
// 		}

// 		return '00/00/2017';
// 	}	
// }   









if ( ! function_exists('send_email')) {
    function send_email($fromname, $from, $to, $subject, $message , $cc = NULL, $bcc = NULL) {
      	$CI =& get_instance();
      	$CI->email->from($from, $fromname);
		$CI->email->to($to); 

		if($cc != NULL) {
			$CI->email->cc($cc);
		}

		if($bcc != NULL) {
			$CI->email->bcc($bcc); 
		}
		$CI->email->subject($subject);
		$CI->email->message($msg);	
		$CI->email->send(); 
    }   
}

/*
 *
 * Just print out for array and object
 */
if ( ! function_exists('print_out')) {
    function print_out($arr) {
       print "<pre>";
       print_r($arr);
       print "</pre>";
    }   
}
if ( ! function_exists('get_timestamp')) {
	function get_timestamp($date, $symbol) {
		$dateparts = explode($symbol, $date);
		return mktime(0,0,0,$dateparts[1],$dateparts[0],$dateparts[2]);
	}
}

if ( ! function_exists('get_earliesttimestamp')) {
	function get_earliesttimestamp($date, $symbol) {
		$dateparts = explode($symbol, $date);
		return mktime(0,0,0,$dateparts[1],$dateparts[0],$dateparts[2]);
	}
}

if ( ! function_exists('get_latesttimestamp')) {
	function get_latesttimestamp($date, $symbol) {
		$dateparts = explode($symbol, $date);
		return mktime(23,59,59,$dateparts[1],$dateparts[0],$dateparts[2]);
	}
}

/**
 *
 *	get date from timestamp
 */
if ( ! function_exists('get_date')) {
	function get_date($timestamp) {
		return date("d/m/Y", $timestamp);
	}
}

/**
 *
 *	get time from timestamp
 */
if ( ! function_exists('get_time')) {
	function get_time($timestamp) {
		return date("H:i", $timestamp);
	}
}

/**
 *
 *	get timestamp by given date and time
 */
if ( ! function_exists('get_datetimestamp')) {
	function get_datetimestamp($date, $time, $datesymbol, $timesymbol) {
		$dateparts = explode($datesymbol, $date);
		$timeparts = explode($timesymbol, $time);
		return mktime($timeparts[0],$timeparts[1],0,$dateparts[1],$dateparts[0],$dateparts[2]);
	}
}

/**
 *
 *  Prepare config for bootstrap style pagination  
 */
if(! function_exists('create_pagination_config')) {
	function create_pagination_config($base_url, $total_rows, $per_page, $uri_segment) {
		$config = array(
			'base_url' 	  	 => $base_url,
			'total_rows'  	 => $total_rows,
			'per_page'	  	 => $per_page,
			'uri_segment'	 => $uri_segment,
			'full_tag_open'	 => '<ul class="pagination pagination-sm">', 
			'full_tag_close' => '</ul>', 
			'num_tag_open' 	 => '<li>',
			'num_tag_close'  => '</li>', 
			'cur_tag_open' 	 => '<li class="active"><span>',
			'cur_tag_close'  => '<span class="sr-only">(current)</span></span></li>', 
			'prev_tag_open'  => '<li>', 
			'prev_tag_close' => '</li>', 
			'next_tag_open'  => '<li>', 
			'next_tag_close' => '</li>',
			'first_link' 	 => '&laquo;first', 
			'prev_link' 	 => '&lsaquo;', 
			'last_link' 	 => 'last&raquo;', 
			'next_link' 	 => '&rsaquo;', 
			'first_tag_open' => '<li>',
			'first_tag_close'=> '</li>', 
			'last_tag_open'  => '<li>',
			'last_tag_close' => '</li>', 
			'additional_param' => '?pcp=88'
		);
		return $config;
	}
}

if (! function_exists('create_pagination_msg')) {
	function create_pagination_msg($current_page, $per_page, $total_rows){
		$start_row = ($current_page-1) * $per_page + 1;
		$end_row = ($current_page * $per_page) < $total_rows? $current_page * $per_page : $total_rows;
		if ($total_rows==0) {
			return 'No Results Found';
		}
		return "Showing ".$start_row." to ".$end_row." record(s) of ".$total_rows." total result(s)";
	}
}


if ( ! function_exists('check_perm')) {
    function check_permission($role_id,$controller_name,$method) {
		$CI =& get_instance();
		$CI->load->model('permission_model');

		$data = $CI->permission_model->get_permission($role_id,$controller_name);

		if(!empty($data)){
			$perm_methods = json_decode($data['perm'],true);

			// $aMethods = get_class_methods($controller_name);
			if (array_key_exists($method, $perm_methods)) {
	    		$result = 1;	
			}
			else {
				$method_ary = explode('_', $method);

				// print_out($perm_methods);
				// print_out($method);
				// print_out($method_ary);
				// exit();
				if($method == '__construct' || $method == '__get'||$method_ary[0] == 'aj' || $method_ary[0] == 'check') {
					$result = 1;
				}
				else {
					$result = 0;
				}
			}
		}
		else { 
			$method_ary = explode('_', $method);
			if($method == '__construct' || $method == '__get'||$method_ary[0] == 'aj' || $method_ary[0] == 'check') {
				$result = 1;
			}
			else {
				$result = 0;
			}
		}

		return $result;
	}   
}