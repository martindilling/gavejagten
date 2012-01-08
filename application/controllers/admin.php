<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('auth');
		$this->load->library('form_validation');
		
		$this->load->model('auth_model');
		$this->load->model('event_model');
		$this->load->model('sponsor_model');
	}
	
	private function _view($view, $data)
	{
		//load the nessesary views and the view from attr
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
				$this->session->set_flashdata('message', 'Logget ind');
				//redirect them back to the home page
				redirect(base_url(), 'refresh');
			}
			else
			{//if the login was un-successful
				//set flashdata, just in case
				$this->session->set_flashdata('error', 'Fejl under login');
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
	
	
////////////////////////////////////////////////////////////////////////////////
// Event
//
	public function adminpanel()
	{
		//redirect to login if not logged in
		$this->_is_logged_in();
		
		//set page title, headline and subheadline
		$this->data['title'] = 'Adminpanel - Event Oversigt';
		$this->data['headline'] = 'Events';
		$this->data['subheadline'] = 'oversigt over events';
		
		//set breadcrumbs
		$this->data['breadcrumbs'] = array('Adminpanel' => 'admin/adminpanel');

		//set activepage
		$this->data['activep'] = 'adminpanel';
		
		//get all events from db
		$this->data['events'] = $this->event_model->get();
		
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
		$this->data['subheadline'] = 'opret en ny event';

		//set the form action
		$this->data['action']     = 'admin/new_event';

		//set text on submit btn
		$this->data['btn_action'] = 'Opret event';

		//set breadcrumbs
		$this->data['breadcrumbs'] = array('Adminpanel' => 'admin/adminpanel', 'Ny event' => 'admin/new_event');

		//set activepage
		$this->data['activep'] = 'new_event';

		//put form post data in variables
		$name			= $this->input->post('event_name');
		$startdate		= $this->input->post('event_startdate');
		$start_hour		= $this->input->post('event_start_hour');
		$start_min		= $this->input->post('event_start_min');
		$enddate		= $this->input->post('event_enddate');
		$end_hour		= $this->input->post('event_end_hour');
		$end_min		= $this->input->post('event_end_min');
		$place			= $this->input->post('event_place');
		$organizer		= $this->input->post('event_organizer');
		$description	= $this->input->post('event_description');

		//validate form input
		$this->form_validation->set_rules('event_name',			'Navn', 'required');
		$this->form_validation->set_rules('event_startdate',	'Start dato', 'required');
		$this->form_validation->set_rules('event_start_hour',	'Start time', 'required');
		$this->form_validation->set_rules('event_start_min',	'Start min', 'required');
		$this->form_validation->set_rules('event_enddate',		'Slut dato', 'required');
		$this->form_validation->set_rules('event_end_hour',		'Slut time', 'required');
		$this->form_validation->set_rules('event_end_min',		'Slut min', 'required');
		$this->form_validation->set_rules('event_place',		'Sted', 'required');
		$this->form_validation->set_rules('event_organizer',	'Arrangør', 'required');
		$this->form_validation->set_rules('event_description',	'Beskrivelse', 'required');

		//sets error message when the field validation fails
		$this->form_validation->set_message('required', 'skal udfyldes');

		//sets tags the error will be enclosed in
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
		
		if ($this->form_validation->run() == true)
		{//check to see if creating event
			//adds the event to the db
			$this->event_model->add();
			
			//set flashdata, just in case
			$this->session->set_flashdata('message', 'Nyt event oprettet');
			
			//redirect them back to the home page
			redirect('admin/adminpanel', 'refresh');
		}
		else
		{//is not creating event
			//creates event object array, and fill with null, so we don't get errors in view
			$this->data['event'] = (object)array(
						'id_event'		=> NULL,
						'name'			=> NULL,
						'place'			=> NULL,
						'organizer'		=> NULL,
						'description'	=> NULL,
						'start_time'	=> NULL,
						'end_time'		=> NULL,
						'startdate'		=> NULL,
						'start_hour'	=> NULL,
						'start_min'		=> NULL,
						'enddate'		=> NULL,
						'end_hour'		=> NULL,
						'end_min'		=> NULL
			);
			
			//Show the new event view
			$this->_view('pages/new_event_view', $this->data);
		}
	}
	
	public function edit_event($id_event = 0)
	{
		//redirect to login if not logged in
		$this->_is_logged_in();
		
		//set page title, headline and subheadline
		$this->data['title'] = 'Adminpanel - Rediger event';
		$this->data['headline'] = 'Rediger event';
		$this->data['subheadline'] = 'rediger et event';

		//set the form action
		$this->data['action']     = 'admin/edit_event/' . $id_event;

		//set text on submit btn
		$this->data['btn_action'] = 'Rediger event';

		//set breadcrumbs
		$this->data['breadcrumbs'] = array('Adminpanel' => 'admin/adminpanel', 'Rediger event' => 'admin/new_event');

		//set activepage
		$this->data['activep'] = 'new_event';

		//put form post data in variables
		$name			= $this->input->post('event_name');
		$startdate		= $this->input->post('event_startdate');
		$start_hour		= $this->input->post('event_start_hour');
		$start_min		= $this->input->post('event_start_min');
		$enddate		= $this->input->post('event_enddate');
		$end_hour		= $this->input->post('event_end_hour');
		$end_min		= $this->input->post('event_end_min');
		$place			= $this->input->post('event_place');
		$organizer		= $this->input->post('event_organizer');
		$description	= $this->input->post('event_description');

		//validate form input
		$this->form_validation->set_rules('event_name',			'Navn', 'required');
		$this->form_validation->set_rules('event_startdate',	'Start dato', 'required');
		$this->form_validation->set_rules('event_start_hour',	'Start time', 'required');
		$this->form_validation->set_rules('event_start_min',	'Start min', 'required');
		$this->form_validation->set_rules('event_enddate',		'Slut dato', 'required');
		$this->form_validation->set_rules('event_end_hour',		'Slut time', 'required');
		$this->form_validation->set_rules('event_end_min',		'Slut min', 'required');
		$this->form_validation->set_rules('event_place',		'Sted', 'required');
		$this->form_validation->set_rules('event_organizer',	'Arrangør', 'required');
		$this->form_validation->set_rules('event_description',	'Beskrivelse', 'required');

		//sets error message when the field validation fails
		$this->form_validation->set_message('required', 'skal udfyldes');

		//sets tags the error will be enclosed in
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
		
		
		if ($this->form_validation->run() == true)
		{//check to see if editing event
			//adds the event to the db
			$this->event_model->update();
			
			//set flashdata, just in case
			$this->session->set_flashdata('message', 'Event rettet');
			
			//redirect them back to the home page
			redirect('admin/adminpanel', 'refresh');
		}
		else
		{//is not editing event
			//get event data from id
			$this->data['event'] = $this->event_model->get($id_event);

			//adds the date, hours and mins in seperate entries in the object array
			$this->data['event']->startdate		= date_format(date_create($this->data['event']->start_time), 'd-m-Y');
			$this->data['event']->start_hour	= date_format(date_create($this->data['event']->start_time), 'H');
			$this->data['event']->start_min		= date_format(date_create($this->data['event']->start_time), 'i');
			$this->data['event']->enddate		= date_format(date_create($this->data['event']->end_time), 'd-m-Y');
			$this->data['event']->end_hour		= date_format(date_create($this->data['event']->end_time), 'H');
			$this->data['event']->end_min		= date_format(date_create($this->data['event']->end_time), 'i');
			
			//Show the new event view
			$this->_view('pages/new_event_view', $this->data);
		}

	}
	
	public function delete_event($id_event = 0)
	{
		//redirect to login if not logged in
		$this->_is_logged_in();
		
		//delete event from db
		$this->event_model->delete($id_event);
		
		//set flashdata, just in case
		$this->session->set_flashdata('message', 'Event slettet');

		//redirect them back to the home page
		redirect('admin/adminpanel', 'refresh');
	}
	
	
////////////////////////////////////////////////////////////////////////////////
// Sponsor
//	
	public function show_sponsors($event_id = null)
	{
		//redirect to login if not logged in
		$this->_is_logged_in();
		
		if (is_null($event_id))
		{//no event_id provided, show all sponsors
			//set page title, headline and subheadline
			$this->data['title']			= 'Adminpanel - Vis alle sponsorer';
			$this->data['headline']			= 'Vis alle sponsorer';
			$this->data['subheadline']		= 'oversigt over alle sponsorer for event';

			//set the form action
			$this->data['addnew_action']	= 'admin/new_sponsor';

			//set text on submit btn
			$this->data['addnew_text']		= 'Opret sponsor';
			
			//set breadcrumbs
			$this->data['breadcrumbs']		= array('Adminpanel' => 'admin/adminpanel', 'Vis alle sponsorer' => 'admin/show_sponsors');

			//set activepage
			$this->data['activep']			= 'show_sponsors';

			//get all sponsors from db
			$this->data['sponsors']			= $this->sponsor_model->get();
			
			if ($this->data['sponsors'] == null)
			{
				$this->data['sponsors']		= array();
			}
//			vd::dumpd($this->data['sponsors']);
			
			//Show the show sponsors view
			$this->_view('pages/show_sponsors_view', $this->data);
		}
		else
		{//event_id provided, show sponsors for event with id
			//put info about event in the event var
			$event							= $this->event_model->get($event_id);
			
			//set page title, headline and subheadline
			$this->data['title']			= 'Adminpanel - _event - Vis sponsorer';
			$this->data['headline']			= 'Vis sponsorer';
			$this->data['subheadline']		= 'oversigt over sponsorer for ' . $event->name;

			//set the form action
			$this->data['addnew_action']	= 'admin/add_sponsor/' . $event_id;

			//set text on submit btn
			$this->data['addnew_text']		= 'Tilføj sponsor';
			
			//set breadcrumbs
			$this->data['breadcrumbs']		= array('Adminpanel' => 'admin/adminpanel', $event->name => 'admin/show_sponsors/' . $event_id, 'Vis sponsorer' => 'admin/show_sponsors');

			//set activepage
			$this->data['activep']			= 'show_sponsors';
			
			//get all sponsors from event from db
			$this->data['sponsors']			= $this->sponsor_model->get(null, $event_id);
			
			if ($this->data['sponsors'] == null)
			{
				$this->data['sponsors']		= array();
			}
//			vd::dumpd($this->data['sponsors']);
			
			//Show the show sponsors view
			$this->_view('pages/show_sponsors_view', $this->data);
		}
	}
	
	public function new_sponsor()
	{
		//redirect to login if not logged in
		$this->_is_logged_in();
		
		//set page title, headline and subheadline
		$this->data['title']				= 'Adminpanel - Ny sponsor';
		$this->data['headline']				= 'Ny sponsor';
		$this->data['subheadline']			= 'opret en ny sponsor';

		//set the form action
		$this->data['action']				= 'admin/new_sponsor';

		//set text on submit btn
		$this->data['btn_action']			= 'Opret sponsor';
		
		//set breadcrumbs
		$this->data['breadcrumbs']			= array('Adminpanel' => 'admin/adminpanel', 'Ny sponsor' => 'admin/new_sponsor');

		//set activepage
		$this->data['activep']				= 'new_sponsor';
		
		//put form post data in variables
		$name			= $this->input->post('sponsor_name');
		$url			= $this->input->post('sponsor_url');
		$description	= $this->input->post('sponsor_description');
		$img_link		= $this->input->post('sponsor_logo');

		//validate form input
		$this->form_validation->set_rules('sponsor_name',			'Navn', 'required');
		$this->form_validation->set_rules('sponsor_url',			'Hjemmeside', 'required');
		$this->form_validation->set_rules('sponsor_description',	'Beskrivelse', 'required');
		$this->form_validation->set_rules('sponsor_logo',			'Logo', 'required');

		//sets error message when the field validation fails
		$this->form_validation->set_message('required', 'skal udfyldes');

		//sets tags the error will be enclosed in
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
		
		if ($this->form_validation->run() == true)
		{//check to see if creating event
			//adds the event to the db
			$this->sponsor_model->add();
			
			//set flashdata, just in case
			$this->session->set_flashdata('message', 'Ny sponsor oprettet');
			
			//redirect them back to the show_sponsors page
			redirect('admin/show_sponsors', 'refresh');
		}
		else
		{//is not creating event
			//creates event object array, and fill with null, so we don't get errors in view
			$this->data['sponsor'] = (object)array(
						'id_sponsor'	=> NULL,
						'name'			=> NULL,
						'url'			=> NULL,
						'description'	=> NULL,
						'logo'			=> NULL
			);
			
			//Show the new event view
			$this->_view('pages/new_sponsor_view', $this->data);
		}
	}
	
	public function edit_sponsor($id_sponsor = 0)
	{
		//redirect to login if not logged in
		$this->_is_logged_in();
		
		//set page title, headline and subheadline
		$this->data['title']				= 'Adminpanel - Rediger sponsor';
		$this->data['headline']				= 'Rediger sponsor';
		$this->data['subheadline']			= 'rediger en sponsor';

		//set the form action
		$this->data['action']				= 'admin/edit_sponsor/' . $id_sponsor;

		//set text on submit btn
		$this->data['btn_action']			= 'Rediger sponsor';

		//set breadcrumbs
		$this->data['breadcrumbs']			= array('Adminpanel' => 'admin/adminpanel', 'Rediger sponsor' => 'admin/new_sponsor');

		//set activepage
		$this->data['activep']				= 'new_sponsor';

		//put form post data in variables
		$name			= $this->input->post('sponsor_name');
		$url			= $this->input->post('sponsor_url');
		$description	= $this->input->post('sponsor_description');
		$img_link		= $this->input->post('sponsor_logo');

		//validate form input
		$this->form_validation->set_rules('sponsor_name',			'Navn', 'required');
		$this->form_validation->set_rules('sponsor_url',			'Hjemmeside', 'required');
		$this->form_validation->set_rules('sponsor_description',	'Beskrivelse', 'required');
		$this->form_validation->set_rules('sponsor_logo',			'Logo', 'required');
		
		//sets error message when the field validation fails
		$this->form_validation->set_message('required', 'skal udfyldes');

		//sets tags the error will be enclosed in
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
		
		
		if ($this->form_validation->run() == true)
		{//check to see if editing event
			//adds the event to the db
			$this->sponsor_model->update();
			
			//set flashdata, just in case
			$this->session->set_flashdata('message', 'Sponsor rettet');
			
			//redirect them back to the home page
			redirect('admin/show_sponsors', 'refresh');
		}
		else
		{//is not editing event
			//get event data from id
			$this->data['sponsor'] = $this->sponsor_model->get($id_sponsor);
			
			//Show the new event view
			$this->_view('pages/new_sponsor_view', $this->data);
		}

	}
	
	public function delete_sponsor($id_sponsor = 0)
	{
		//redirect to login if not logged in
		$this->_is_logged_in();
		
		//delete event from db
		$this->sponsor_model->delete($id_sponsor);
		
		//set flashdata, just in case
		$this->session->set_flashdata('message', 'Sponsor slettet');

		//redirect them back to the home page
		redirect('admin/show_sponsors', 'refresh');
	}
	
	public function add_sponsor($event_id = null)
	{
		//redirect to login if not logged in
		$this->_is_logged_in();
		
		//put info about event in the event var
		$event							= $this->event_model->get($event_id);
				
		//get all sponsors from event
		$this->data['sponsors']			= $this->sponsor_model->get();
//		vd::dumpd($sponsors);
		
		//set page title, headline and subheadline
		$this->data['title']			= 'Adminpanel - _event - Tilføj sponsor';
		$this->data['headline']			= 'Tilføj sponsor';
		$this->data['subheadline']		= 'tilføj en sponsor til ' . $event->name;
		
		//set the form action
		$this->data['action']			= 'admin/add_sponsor/' . $event_id;

		//set text on submit btn
		$this->data['btn_action']		= 'Tilføj til "' . $event->name . '"';
		
		//set activepage
		$this->data['activep']			= 'add_sponsor';
		
		//set breadcrumbs
		$this->data['breadcrumbs']		= array('Adminpanel' => 'admin/adminpanel', $event->name => 'admin/show_sponsors/' . $event_id, 'Tilføj sponsor' => 'admin/add_sponsor');
		
		//put form post data in variables
		$sponsor		= $this->input->post('sponsor');
		$donation_piece	= $this->input->post('donation_piece');
		$donation_max	= $this->input->post('donation_max');

		//validate form input
		$this->form_validation->set_rules('sponsor',		'Sponsor', 'required');
		$this->form_validation->set_rules('donation_piece',	'Donation pr. scanning', 'required');
		$this->form_validation->set_rules('donation_max',	'Donations loft', 'required');

		//sets error message when the field validation fails
		$this->form_validation->set_message('required', 'skal udfyldes');

		//sets tags the error will be enclosed in
		$this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
		
		if ($this->form_validation->run() == true)
		{//check to see if creating event
			//vd::dumpd($_POST);
			//adds the event to the db
			$this->sponsor_model->addtoevent($event_id);
			
			//set flashdata, just in case
			$this->session->set_flashdata('message', 'Ny sponsor tilføjet');
			
			//redirect them back to the show_sponsors page
			redirect('admin/show_sponsors/'.$event_id, 'refresh');
		}
		else
		{//is not creating event
			//creates sponsor object array, and fill with null, so we don't get errors in view
			$this->data['sponsor'] = (object)array(
						'id_sponsor'	=> NULL,
						'donation_piece'=> NULL,
						'donation_max'	=> NULL
			);
			
			$this->data['event_id'] = $event_id;
			
			//Show the add sponsor view
			$this->_view('pages/add_sponsor_view', $this->data);
		}
	}
	
	

}