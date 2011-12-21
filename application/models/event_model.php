<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		
		
	}
	
	public function get($id=null)
	{
		if (is_null($id))
		{
			//get all events
			$this->db->select('id_event, name, place, organizer, description, start_time, end_time');
			$this->db->from('gj_events');
			
			$query = $this->db->get();
			
			$query->result();
			
			//set the timezone
			date_default_timezone_set("Europe/Copenhagen");
			
			//set variable to current date-time
			$timestampnow = date('Y-m-d H:i:s');
			
			//set the active, old, and future arrays, so they exists, and CAN be empty
			$events['active'] = array();
			$events['old'] = array();
			$events['future'] = array();
			
			foreach ($query->result() as $row)
			{//checks one row of the result at a time
				if ($timestampnow > $row->start_time && $timestampnow < $row->end_time)
				{//if current timestamp is bigger than start_time, and smaller than end_time
					//active event
					$events['active'][] = array(
						'id_event'		=> $row->id_event,
						'name'			=> $row->name,
						'place'			=> $row->place,
						'organizer'		=> $row->organizer,
						'description'	=> $row->description,
						'start_date'	=> date_format(date_create($row->start_time), 'd-m-Y'),
						'start_time'	=> date_format(date_create($row->start_time), 'H:i'),
						'end_date'		=> date_format(date_create($row->end_time), 'd-m-Y'),
						'end_time'		=> date_format(date_create($row->end_time), 'H:i')
					);
				}
				elseif ($timestampnow < $row->start_time)
				{//if current timestamp smaller than start_time
					//old event
					$events['future'][] = array(
						'id_event'		=> $row->id_event,
						'name'			=> $row->name,
						'place'			=> $row->place,
						'organizer'		=> $row->organizer,
						'description'	=> $row->description,
						'start_date'	=> date_format(date_create($row->start_time), 'd-m-Y'),
						'start_time'	=> date_format(date_create($row->start_time), 'H:i'),
						'end_date'		=> date_format(date_create($row->end_time), 'd-m-Y'),
						'end_time'		=> date_format(date_create($row->end_time), 'H:i')
					);
				}
				elseif ($timestampnow > $row->end_time)
				{//if current timestamp is bigger than end_time
					//future event
					$events['old'][] = array(
						'id_event'		=> $row->id_event,
						'name'			=> $row->name,
						'place'			=> $row->place,
						'organizer'		=> $row->organizer,
						'description'	=> $row->description,
						'start_date'	=> date_format(date_create($row->start_time), 'd-m-Y'),
						'start_time'	=> date_format(date_create($row->start_time), 'H:i'),
						'end_date'		=> date_format(date_create($row->end_time), 'd-m-Y'),
						'end_time'		=> date_format(date_create($row->end_time), 'H:i')
					);
				}

			}
			
			//returns the event array
			return $events;
		}
		else
		{
			//get event with id
			$this->db->select('id_event, name, place, organizer, description, start_time, end_time');
			$this->db->from('gj_events');
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

		//insert the new event in db
		$this->db->insert('gj_events', array(
										'name'			=> $name,
										'place'			=> $place,
										'organizer'		=> $organizer,
										'description'	=> $description,
										'start_time'	=> $start_time,
										'end_time'		=> $end_time
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
