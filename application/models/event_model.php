<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Event_model extends CI_Model {
	
	public function __construct() {
		parent::__construct();
		
		
	}
	
	public function get($id=null) {
		if (is_null($id))
		{
			//get all events
			$this->db->select('id_event, name, place, organizer, description, start_time, end_time');
			$this->db->from('gj_events');
			//$this->db->join('user', 'user.user_id = pages.author_id');
			
			$query = $this->db->get();
			
			$query->result();
			
			//set the timezone
			date_default_timezone_set("Europe/Copenhagen");
			
			//set variable to current date-time
			$timestampnow = date('Y-m-d H:i:s');
			
			$events['active'] = array();
			$events['old'] = array();
			$events['future'] = array();
			
			foreach ($query->result() as $row)
			{
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
			
			return $events;
		}
		else
		{
			//get event with id
//			$this->db->select('id_event, name, place, organizer, description, start_time, end_time');
//			$this->db->from('gj_events');
//			$this->db->where(array('id_event' => $id));
//			
//			$query = $this->db->get();
//			
//			$row = $query->result();
//			if ($row) {
//				return $row[0];
//			} else {
//				return NULL;
//			}
		}
	}
	
	public function add() {
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
		
		$start_time		= date('Y-m-d H:i:s' ,strtotime($startdate.' '.$start_hour.':'.$start_min.':00'));
		$end_time		= date('Y-m-d H:i:s' ,strtotime($enddate.' '.$end_hour.':'.$end_min.':00'));
		
//		vd::dump($_POST);
//		vd::dump($start_time);
//		vd::dumpd($end_time);
		
		$this->db->insert('gj_events', array(
										'name'			=> $name,
										'place'			=> $place,
										'organizer'		=> $organizer,
										'description'	=> $description,
										'start_time'	=> $start_time,
										'end_time'		=> $end_time
									));
		
//		$page_id = $this->db->insert_id();
//		
//		$image_list = array();
//		if ($this->input->post('image')) {
//			$image_list = $this->input->post('image');
//		}
//		
//		foreach ($image_list as $image_id) {
//			$data = array(
//						'page_id' => $page_id,
//						'image_id' => $image_id
//					);
//			
//			$this->db->insert('images_pages', $data);
//		}

	}
	
	public function update() {
        $this->db->where('page_id', $this->input->post('page_id'));
		$page_data = array(
						'page_id' => $this->input->post('page_id'),
						'title' => $this->input->post('title'),
						'bodytext' => $this->input->post('bodytext')
					);
		
        $this->db->update('pages', $page_data);
		
		$this->db->where('page_id', $this->input->post('page_id'))->delete('images_pages');
		
		$image_list = array();
		if ($this->input->post('image')) {
			$image_list = $this->input->post('image');
		}
		
		foreach ($image_list as $image_id) {
			$data = array(
				'page_id' => $this->input->post('page_id'),
				'image_id' => $image_id
			);
			$this->db->insert('images_pages', $data);
		}
    }
	
	public function delete($id=0) {
		if ($this->auth->is_admin()) {
			$this->db->delete('pages', array('page_id' => $id));
		}
	}
	
}
