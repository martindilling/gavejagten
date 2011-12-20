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
			$timestampnow = date('Y-m-d h:i:s');
			
			foreach ($query->result() as $row)
			{
				if ($timestampnow > $row->start_time && $timestampnow < $row->end_time)
				{//if current timestamp is bigger than start_time, and smaller than end_time
					//active event
					$events['active'][] = get_object_vars($row); 
				}
				elseif ($timestampnow < $row->start_time)
				{//if current timestamp smaller than start_time
					//old event
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
				elseif ($timestampnow > $row->end_time)
				{//if current timestamp is bigger than end_time
					//future event
					$events['future'][] = get_object_vars($row);
				}

			}
			
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
			if ($row) {
				return $row[0];
			} else {
				return NULL;
			}
		}
	}
	
	public function get_related_images($page_id) {
		$query = $this->db
						->select('image_id')
						->where('page_id', $page_id)
						->get('images_pages');
		
		return $query->result_array();
	}
	
	public function add() {
		$title		= $this->input->post('title');
		$bodytext	= $this->input->post('bodytext');
		$author_id	= $this->session->userdata('user_id');
		
		$this->db->insert('pages', array(
										'title'			=> $title,
										'bodytext'		=> $bodytext,
										'author_id'		=> $author_id
									));
		
		$page_id = $this->db->insert_id();
		
		$image_list = array();
		if ($this->input->post('image')) {
			$image_list = $this->input->post('image');
		}
		
		foreach ($image_list as $image_id) {
			$data = array(
						'page_id' => $page_id,
						'image_id' => $image_id
					);
			
			$this->db->insert('images_pages', $data);
		}

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
