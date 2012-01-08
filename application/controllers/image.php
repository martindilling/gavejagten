<?php if (!defined('BASEPATH')) exit('No direct script access allowed.');

class Image extends CI_Controller
{
    
    function __construct()
	{
        parent::__construct();
        $this->load->library('auth');
		
        $this->load->model('image_model');
    }
	
	private function _is_logged_in()
	{
		if (!$this->auth->logged_in())
		{//user is not logged in
			//redirect them to the login page
			redirect('admin/login', 'refresh');
		}
	}
    
    function index()
	{
		//redirect to login if not logged in
		$this->_is_logged_in();
		
        //redirect to the adminpanel
		redirect('admin/adminpanel', 'refresh');
    }
        
    public function upload()
	{
        $data['title'] = 'Admin | Upload Images';
		$data['error'] = NULL;
        $this->_view('image/upload', $data);
    }
    
    public function do_upload()
	{
        $config['upload_path']		= realpath(BASEPATH . '../uploads/');
        $config['allowed_types']	= 'gif|jpg|jpeg|png';
        $config['max_size']			= '3000';
        $config['max_width']		= '3000';
        $config['max_height']		= '2000';
		

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();
			$data['title'] = 'Admin | Upload images';
			$this->_view('image/upload', $data);
        } else {
			$this->image_model->save();
			
			$this->_make_thumbnail();
			
			redirect('image');
        }
    }
	
	private function _make_thumbnail()
	{
		$data = $this->upload->data();
//		echo '<pre>';
//		die(var_dump($data));
		
		$config['image_library']	= 'gd2';
		$config['source_image']		= $data['full_path'];
		$config['new_image']		= $data['file_path'] . 'thumbs/' . $data['file_name'];
		$config['create_thumb']		= TRUE;
		$config['maintain_ratio']	= TRUE;
		$config['width']			= 100;
		$config['height']			= 100;

		$this->load->library('image_lib', $config); 

		$this->image_lib->resize();
	}
	
	public function delete()
	{
		$this->image_model->delete();
		redirect('image');
	}
	
	public function view($image_id = NULL)
	{
		$this->image_model->get();
	}
    
    private function _view($view, $data)
	{
        $this->load->view('snippets/header', $data);
        $this->load->view('snippets/menu');
        $this->load->view($view, $data);
        $this->load->view('snippets/footer');
    }
    
}