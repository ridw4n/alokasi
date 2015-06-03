<?php
class Auth{
	var $CI;
	public function __construct() {
		$this->CI =& get_instance();
	}
	public function is_login() {
		if ($this->CI->session->userdata('logged_in') == TRUE) {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function is_admin(){
		if ($this->CI->session->userdata('lvl') == '1') {
			return TRUE;
		}else{
			return FALSE;
		}
	}

	public function is_user(){
		if ($this->CI->session->userdata('lvl') == '2') {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
?>