<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auth_model extends CI_Model
{

	public function __construct()
	{
		parent::__construct();

	}
	
	public function login($username, $password)
	{

	    if (empty($username) || empty($password))
	    {
			$this->set_error('login_unsuccessful');
			return FALSE;
	    }

		
	    $query = $this->db->select('id_admin, username, password, email')
							->from('gj_admins')
							->where('username', $username)
							->get();
		
	    $user = $query->row();

		if ($query->num_rows() == 1)
	    {
			//$password = $this->hash_password_db($user->id, $password);

			if ($user->password === $password)
			{
				$session_data = array(
					'username'             => $user->username,
					'email'                => $user->email
				);

				$this->session->set_userdata($session_data);
				
				
//				$this->trigger_events(array('post_login', 'post_login_successful'));
//				$this->set_message('login_successful');

				return TRUE;
			}
	    }

//		$this->trigger_events('post_login_unsuccessful');
//		$this->set_error('login_unsuccessful');
	    return FALSE;
	}
}
