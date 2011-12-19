<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth
{
	
	public function __construct()
	{
		$this->ci =& get_instance();
		$this->ci->load->model('auth_model');

	}

	public function login()
	{
//		$this->ci->auth_model->trigger_events('logout');

		$this->ci->session->unset_userdata('username');
		$this->ci->session->unset_userdata('id');
		$this->ci->session->unset_userdata('user_id');


		$this->ci->session->sess_destroy();

		$this->set_message('logout_successful');
		return TRUE;
	}
	
	public function logout()
	{
		$this->ci->auth_model->trigger_events('logout');

		$this->ci->session->unset_userdata('username');
		$this->ci->session->unset_userdata('id');
		$this->ci->session->unset_userdata('user_id');


		$this->ci->session->sess_destroy();

		$this->set_message('logout_successful');
		return TRUE;
	}
	
	public function logged_in()
	{
//		$this->ci->ion_auth_model->trigger_events('logged_in');

		
		return (bool) $this->ci->session->userdata('username');
		
	}


}
