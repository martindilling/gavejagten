<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
//		$this->load->library('ion_auth');
		$this->load->library('auth');
		$this->load->model('auth_model');
		$this->load->library('session');
		$this->load->library('form_validation');
	}
	
	private function _view($view, $data) {
		$this->load->view('snippets/header', $data);
		//$this->load->view('snippets/menu');
		$this->load->view($view, $data);
		$this->load->view('snippets/footer');
	}

	public function index() {
		if (!$this->auth->logged_in()) {
			//redirect them to the login page
			redirect('admin/login', 'refresh');
		} else {
			echo "you are logged in";
//			$this->_view('pages/login_view', $this->data);
		}
	}
	
	public function login() {
		$this->data['title'] = 'Admin - Login';
		
		//validate form input
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if ($this->form_validation->run() == true)
		{ //check to see if the user is logging in

			if ($this->auth_model->login($this->input->post('username'), $this->input->post('password')))
			{ //if the login is successful
				//redirect them back to the home page
				$this->session->set_flashdata('message', 'success logging in');
				redirect(base_url(), 'refresh');
			}
			else
			{ //if the login was un-successful
				//redirect them back to the login page
				$this->session->set_flashdata('message', 'failed logging in');
				redirect('admin/login', 'refresh'); //use redirects instead of loading views for compatibility with MY_Controller libraries
			}
		}
		else
		{  //the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

			$this->data['identity'] = array('name' => 'identity',
				'id' => 'identity',
				'type' => 'text',
				'value' => $this->form_validation->set_value('identity'),
			);
			$this->data['password'] = array('name' => 'password',
				'id' => 'password',
				'type' => 'password',
			);

			$this->_view('pages/login_view', $this->data);
		}
		
		
		
	}

}