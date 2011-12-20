<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('auth');
		$this->load->model('auth_model');
		$this->load->library('form_validation');
	}
	
	private function _view($view, $data)
	{
		$this->load->view('snippets/header', $data);
		$this->load->view('snippets/menu', $data);
		$this->load->view('snippets/title_breadcrumb', $data);
		$this->load->view($view, $data);
		$this->load->view('snippets/footer');
	}
	
	private function _is_logged_in() {
		if (!$this->auth->logged_in())
		{//user is not logged in
			//redirect them to the login page
			redirect('admin/login', 'refresh');
		}
	}

	public function index()
	{
		//redirect to login if not logged in
		$this->_is_logged_in();
		
		//redirect to the adminpanel
		redirect('admin/adminpanel', 'refresh');
	}
	
	public function login()
	{
		//set page title
		$this->data['title'] = 'Admin - Login';
		
		//validate form input
		$this->form_validation->set_rules('username', 'Brugernavn', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		//sets error message when the field validation fails
		$this->form_validation->set_message('required', 'skal udfyldes');
		
		//sets tags the error will be enclosed in
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
		
		//get username and password from post
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($this->form_validation->run() == true)
		{//check to see if the user is logging in

			if ($this->auth_model->login($username, $password))
			{//if the login is successful
				//set flashdata, just in case
				$this->session->set_flashdata('message', 'Success logging in');
				//redirect them back to the home page
				redirect(base_url(), 'refresh');
			}
			else
			{//if the login was un-successful
				//set flashdata, just in case
				$this->session->set_flashdata('error', 'Error logging in');
				//redirect them back to the login page
				redirect('admin/login', 'refresh');
			}
		}
		else
		{//the user is not logging in so display the login page
			//set the flash data error message if there is one
			$this->data['error'] = $this->session->flashdata('error');

			//show the login view
			$this->load->view('snippets/header', $this->data);
			$this->load->view('pages/login_view', $this->data);
			$this->load->view('snippets/footer');
		}
	}
	
	public function logout()
	{
		//removes the session data
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('email');

		//destroys the session
		$this->session->sess_destroy();
		
		//redirect them back to the home page
		redirect(base_url(), 'refresh');
	}
	
	public function adminpanel()
	{
		//redirect to login if not logged in
		$this->_is_logged_in();
		
		//set page title, headline and subheadline
		$this->data['title'] = 'Adminpanel';
		$this->data['headline'] = 'Adminpanel';
		$this->data['subheadline'] = 'kort beskrivelse af "Adminpanel" siden';
		
		//set breadcrumbs
		$this->data['breadcrumbs'] = array('Adminpanel' => 'admin/adminpanel');

		//set activepage
		$this->data['activep'] = 'adminpanel';
		
		//Show the panel view
		$this->_view('pages/panel_view', $this->data);
	}
	
	public function new_event()
	{
		//redirect to login if not logged in
		$this->_is_logged_in();
		
		//set page title, headline and subheadline
		$this->data['title'] = 'Adminpanel - Ny event';
		$this->data['headline'] = 'Ny event';
		$this->data['subheadline'] = 'kort beskrivelse af "Ny event" siden';
		
		//set breadcrumbs
		$this->data['breadcrumbs'] = array('Adminpanel' => 'admin/adminpanel', 'Ny event' => 'admin/new_event');

		//set activepage
		$this->data['activep'] = 'new_event';
		
		//Show the panel view
		$this->_view('pages/new_event_view', $this->data);
	}
	
	public function show_sponsors()
	{
		//redirect to login if not logged in
		$this->_is_logged_in();
		
		//set page title, headline and subheadline
		$this->data['title'] = 'Adminpanel - _event - Vis sponsorer';
		$this->data['headline'] = 'Vis sponsorer';
		$this->data['subheadline'] = 'kort beskrivelse af "Vis sponsorer" siden';
		
		//set breadcrumbs
		$this->data['breadcrumbs'] = array('Adminpanel' => 'admin/adminpanel', '_event' => 'admin/adminpanel', 'Vis sponsorer' => 'admin/show_sponsors');

		//set activepage
		$this->data['activep'] = 'show_sponsors';
		
		//Show the panel view
		$this->_view('pages/show_sponsors_view', $this->data);
	}
	
	public function new_sponsor()
	{
		//redirect to login if not logged in
		$this->_is_logged_in();
		
		//set page title, headline and subheadline
		$this->data['title'] = 'Adminpanel - Ny sponsor';
		$this->data['headline'] = 'Ny sponsor';
		$this->data['subheadline'] = 'kort beskrivelse af "Ny sponsor" siden';
		
		//set breadcrumbs
		$this->data['breadcrumbs'] = array('Adminpanel' => 'admin/adminpanel', 'Ny sponsor' => 'admin/new_sponsor');

		//set activepage
		$this->data['activep'] = 'new_sponsor';
		
		//Show the panel view
		$this->_view('pages/new_sponsor_view', $this->data);
	}
	
	public function add_sponsor()
	{
		//redirect to login if not logged in
		$this->_is_logged_in();
		
		//set page title, headline and subheadline
		$this->data['title'] = 'Adminpanel - _event - Tilføj sponsor';
		$this->data['headline'] = 'Tilføj sponsor';
		$this->data['subheadline'] = 'kort beskrivelse af "Tilføj sponsor" siden';
		
		//set activepage
		$this->data['activep'] = 'add_sponsor';
		
		//set breadcrumbs
		$this->data['breadcrumbs'] = array('Adminpanel' => 'admin/adminpanel', '_event' => 'admin/adminpanel', 'Tilføj sponsor' => 'admin/add_sponsor');

		//Show the panel view
		$this->_view('pages/add_sponsor_view', $this->data);
	}
	
	

}