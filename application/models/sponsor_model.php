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
			$this->db->where(array('id_sponsor' => $id));
			
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
