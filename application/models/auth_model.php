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
		{//username or password is empty
			//failed logging in, return false
			return FALSE;
	    }

		//get the data from the admins table, where username match the provided
	    $query = $this->db->select('id_admin, username, password, email')
							->from('gj_admins')
							->where('username', $username)
							->get();
		
		//set the datarow in the user variable
	    $user = $query->row();

		if ($query->num_rows() == 1)
		{//only got one entry from the db query
			//encrypt the provided password with SHA1 before comparing to db
			$password = SHA1($password);

			if ($user->password === $password)
			{//password is correct
				//set username and email in a userdata session
				$session_data = array(
										'username'	=> $user->username,
										'email'		=> $user->email
									);

				$this->session->set_userdata($session_data);
				
				//succesfully logged in, return true
				return TRUE;
			}
	    }

		//failed logging in, return false
	    return FALSE;
	}
}
