<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{
	
	public function __construct()
	{
		$this->ci =& get_instance();
	}
	
	public function logged_in()
	{
		//return true, if 'username' exist in session. Else return false
		return (bool) $this->ci->session->userdata('username');
	}


}
