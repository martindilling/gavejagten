<?php

class Image_model extends CI_Model {
    
    public function get($image_id = NULL) {		
		if (($this->uri->segment(1) == 'image') and (!$this->uri->segment(3) == NULL)) {
			$image_id = $this->uri->segment(3);
			
			$this->db->select('image_id, name, type, height, width');
			$this->db->from('images');
			$this->db->where(array('image_id' => $image_id));
			$query = $this->db->get();
			
			$row = $query->result();
			
			$path	= realpath(BASEPATH . '/../uploads/' . $row[0]->name);
			$type	= $row[0]->type;
			$height = $row[0]->height;
			$width	= $row[0]->width;
			
			header("content-type: image/$type");
			readfile($path);
			
		}
        
        if (! $image_id) {
            $query = $this->db->get('images');			
			$data = array();
		} else {
			$query = $this->db->where('image_id', $image_id)->get('images');
		}
		
		foreach ($query->result_array() as $image) {
			$data[] = array(
				'functions'		=> array(
											'data' =>	anchor('image/delete/' . $image['image_id'], 'Delete', array('class' => 'btn small danger', 'style' => 'width:35px; text-align:center')) . ' ' .
														anchor('image/view/'.$image['image_id'],'View', array('class' => 'btn small default', 'style' => 'width:35px; text-align:center')),
											'width' =>	'115'
										),
				'image_id'		=> $image['image_id'],
				'thumb'			=> $this->make_img_tag($this->get_thumbnail('thumbs/' . $image['name'])),
				'name'			=> $image['name'],
				'type'			=> $image['type'],
				'height'		=> $image['height'],
				'width'			=> $image['width']
			);
		}

		return $data;
    }
	
	public function make_img_tag($name) {
		return '<img src="' . base_url() . 'uploads/' . $name . '" />';
	}
	
	public function get_thumbnail($image) {
		$tmp = explode('.', $image);
		$tmp[sizeof($tmp)-2] = $tmp[sizeof($tmp)-2] . '_thumb';
		return implode('.', $tmp);
	}
    
    public function save($image_id=NULL) {
        if (!$image_id) {
			$this->_insert();
		} else {
			$this->_update();
		}
    }
	
	private function _insert() {
		$data = $this->upload->data();
		$image = array(
					'name'		=> $data['file_name'],
					'height'	=> $data['image_height'],
					'width'		=> $data['image_width'],
					'type'		=> $data['image_type']
				);
		
		$this->db->insert('images', $image);
	}
	
	private function _update() {
		
	}
    
    public function delete() {
        $image_id = $this->uri->segment(3);
        if ($image_id) {
            $query = $this->db->where('image_id', $image_id)->get('images');
            $data = $query->result();
			
			$this->db->where('image_id', $image_id)->delete('images');
			
			unlink(realpath(BASEPATH . '/../uploads/' . $data[0]->name));
			unlink(realpath(BASEPATH . '/../uploads/thumbs/' . $this->get_thumbnail($data[0]->name)));
        }
    }
}