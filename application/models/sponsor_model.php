<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sponsor_model extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
		
		
	}
	
	public function get($sponsor_id=null, $event_id=null)
	{
		if (is_null($sponsor_id) && is_null($event_id))
		{//if both sponsor_id and event_id is null
			//get all sponsors
			$this->db->select('id_sponsor, name, description, img_link, url');
			$this->db->from('gj_sponsors');
			
			$query = $this->db->get();
			
			//returns the event array
			return $query->result_array();
		}
		else if (!is_null($sponsor_id) && is_null($event_id))
		{//if sponsor_id exists and event_id is null
			//get event with id
			$this->db->select('id_sponsor, name, description, img_link, url');
			$this->db->from('gj_sponsors');
			$this->db->where(array('id_sponsor' => $sponsor_id));
			
			$query = $this->db->get();
			
			$row = $query->result();
			
			//return row if something is found, else return null
			if ($row) {
				return $row[0];
			} else {
				return NULL;
			}
		}
		else if (is_null($sponsor_id) && !is_null($event_id))
		{//if sponsor_id is null and event_id exists
			//get event with id
			$this->db->select('gj_sponsors.id_sponsor, name, description, img_link, url, id_event, value, maxvalue, qr_string');
			$this->db->from('gj_join_events_sponsors');
			$this->db->join('gj_sponsors', 'gj_sponsors.id_sponsor = gj_join_events_sponsors.id_sponsor');
			$this->db->where(array('gj_join_events_sponsors.id_event' => $event_id));
			
			$query = $this->db->get();
			
			$row = $query->result_array();
			
			//return row if something is found, else return null
			if ($row) {
				return $row;
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
	
	public function addtoevent($event_id)
	{
		//put form post data in variables
		//$id_event		= $this->input->post('id_event');
		$sponsor_id		= $this->input->post('sponsor');
		$donation_piece	= $this->input->post('donation_piece');
		$donation_max	= $this->input->post('donation_max');
		
		//generate the QR Code
		$qr_string		= 'placeholder QR Code';
		
		$exists = $this->_check_event_sponsor($event_id, $sponsor_id);
		
		if ($exists == FALSE)
		{//the data does not exist
			//insert the new event in db
			$this->db->insert('gj_join_events_sponsors', array(
										'id_event'		=> $event_id,
										'id_sponsor'	=> $sponsor_id,
										'value'			=> $donation_piece,
										'maxvalue'		=> $donation_max,
										'qr_string'		=> $qr_string
						));
			
		}
		else
		{//the data does exist
			//make array with changes
			$data = array(
										'id_event'		=> $event_id,
										'id_sponsor'	=> $sponsor_id,
										'value'			=> $donation_piece,
										'maxvalue'		=> $donation_max,
										'qr_string'		=> $qr_string
						);

			//updates the db
			$this->db->where('id_event', $event_id);
			$this->db->where('id_sponsor', $sponsor_id);
			$this->db->update('gj_join_events_sponsors', $data);
		}

	}
	
	private function _check_event_sponsor($event_id, $sponsor_id)
	{
		$this->db->select('id_event, id_sponsor');
		$this->db->where('id_event', $event_id);
		$this->db->where('id_sponsor', $sponsor_id);
		
		$query = $this->db->get('gj_join_events_sponsors');
		
		if ($query->num_rows() > 0) {
			return TRUE;
		} else {
			return FALSE;
		}
	}
	
	public function update()
	{
		//put form post data in variables
		$sponsor_id		= $this->input->post('id_sponsor');
		$name			= $this->input->post('sponsor_name');
		$url			= $this->input->post('sponsor_url');
		$description	= $this->input->post('sponsor_description');
		$img_link		= $this->input->post('sponsor_logo');
		
        //make array with changes
		$sponsor_data = array(
						'name'			=> $name,
						'url'			=> $url,
						'description'	=> $description,
						'img_link'		=> $img_link
					);
		
		//updates the eventdata in db
		$this->db->where('id_sponsor', $sponsor_id);
        $this->db->update('gj_sponsors', $sponsor_data);
	}
	
	public function delete($id = 0)
	{
		//deletes the event from db
		$this->db->delete('gj_sponsors', array('id_sponsor' => $id));
	}
	
}
