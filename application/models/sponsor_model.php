<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sponsor_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		
		
	}
	
	public function get($id=null)
	{
		if (is_null($id))
		{
			//get all sponsors
			$this->db->select('id_sponsor, name, description, img_link, url');
			$this->db->from('gj_sponsors');
			
			$query = $this->db->get();
			
//			$query->result();
			
			//returns the event array
			return $query->result_array();
		}
		else
		{
			//get event with id
			$this->db->select('id_sponsor, name, description, img_link, url');
			$this->db->from('gj_sponsors');
			$this->db->join();
			$this->db->where(array('id_event' => $id));
			
			$query = $this->db->get();
			
			$row = $query->result();
			
			//return row if something is found, else return null
			if ($row) {
				return $row[0];
			} else {
				return NULL;
			}
		}
	}
	
	public function add()
	{
		//put form post data in variables
		$name			= $this->input->post('sponsor_name');
		$url			= $this->input->post('sponsor_url');
		$description	= $this->input->post('sponsor_description');
		$img_link		= $this->input->post('sponsor_logo');

		//insert the new event in db
		$this->db->insert('gj_sponsors', array(
										'name'			=> $name,
										'description'	=> $description,
										'img_link'		=> $img_link,
										'url'			=> $url
									));

	}
	
	public function update()
	{
		//put form post data in variables
		$event_id		= $this->input->post('id_event');
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
		
		//set the timezone
		date_default_timezone_set("Europe/Copenhagen");
		
		//formats the date, hour and min to the database format
		$start_time		= date('Y-m-d H:i:s' ,strtotime($startdate.' '.$start_hour.':'.$start_min.':00'));
		$end_time		= date('Y-m-d H:i:s' ,strtotime($enddate.' '.$end_hour.':'.$end_min.':00'));
		
        //make array with changes
		$event_data = array(
						'name'			=> $name,
						'place'			=> $place,
						'organizer'		=> $organizer,
						'description'	=> $description,
						'start_time'	=> $start_time,
						'end_time'		=> $end_time
					);
		
		//updates the eventdata in db
		$this->db->where('id_event', $event_id);
        $this->db->update('gj_events', $event_data);
	}
	
	public function delete($id = 0)
	{
		//deletes the event from db
		$this->db->delete('gj_events', array('id_event' => $id));
	}
	
}
