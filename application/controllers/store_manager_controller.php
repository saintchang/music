<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class store_manager_controller extends MY_Controller {

	public function index()
	{	
		if($this->is_logon()== FALSE)
		{
			redirect('/account_controller/');
		}
		if($this->is_admin()==FALSE)
		{
			redirect('/home_controller/');
		}
		$this->load->model("store_manager_model");
		$data["glist"] = $this->store_manager_model->browse();
		
		$this->get_view_collect("Index",5,"store_manager/index");
		$data["template_collect"] = $this->template;	
		$this->load->view('template',$data);		
	}
	
	public function create()
	{
		if($this->is_logon()== FALSE)
		{
			redirect('/account_controller/');
		}
		//已登入又是Admin 就到List 頁面，反之不是Admin 就再回到Home
		if($this->is_admin()==FALSE)
		{
			redirect('/home_controller/');
		}
		$this->load->model("store_manager_model");		
		$data["Artist"] = $this->store_manager_model->get_artlist();		
		
		$this->get_view_collect("Create",5,"store_manager/create");
		$data["template_collect"] = $this->template;	
		$this->load->view('template',$data);			
	}
	
	public function create_save()
	{
		$this->load->helper('form');
		$obj = new albums;
		$obj->GenreId = $this->input->post('GenreId', TRUE);
		$obj->ArtistId = $this->input->post('ArtistId', TRUE);
		$obj->Title = $this->input->post('Title', TRUE);
		$obj->Price = $this->input->post('Price', TRUE);
		$obj->AlbumArtUrl = $this->input->post('AlbumArtUrl', TRUE);
		$this->load->model("store_manager_model");	
		$this->store_manager_model->create($obj);
		redirect('/store_manager_controller/');
	}
	
	public function edit($p_id)
	{
		$this->load->model("store_manager_model");	
		$data["Artist"] = $this->store_manager_model->get_artlist();
		$data["albums"] = $this->store_manager_model->details($p_id);
		
		$this->get_view_collect("Details",5,"store_manager/edit");
		$data["template_collect"] = $this->template;			
		$this->load->view('template',$data);	
	}
	
	public function edit_save($p_id)
	{
		$this->load->helper('form');
		$obj = new albums;
		$obj->GenreId = $this->input->post('GenreId', TRUE);
		$obj->ArtistId = $this->input->post('ArtistId', TRUE);
		$obj->Title = $this->input->post('Title', TRUE);
		$obj->Price = $this->input->post('Price', TRUE);
		$obj->AlbumArtUrl = $this->input->post('AlbumArtUrl', TRUE);
		$this->load->model("store_manager_model");	
		$ok = $this->store_manager_model->update($obj,$p_id);
		redirect('/store_manager_controller/');
	}
	
	public function details($p_id)
	{
		$this->load->model("store_manager_model");	
		$data["albums"] = $this->store_manager_model->details($p_id);
		
		$this->get_view_collect("Details",5,"store_manager/details");
		$data["template_collect"] = $this->template;	
		$this->load->view('template',$data);				
	}
	
	public function delete($p_id)
	{
		$this->load->model("store_manager_model");	
		$data["albums"] = $this->store_manager_model->details($p_id);
		
		$this->get_view_collect("Delete",5,"store_manager/delete");
		$data["template_collect"] = $this->template;	
		$this->load->view('template',$data);					
	}
	
	public function delete_save($p_id)
	{	
		$this->load->model("store_manager_model");
		$this->store_manager_model->delete($p_id);
		redirect('/store_manager_controller/');	
	}
}

class albums
{
	var $GenreId = 0;
	var $ArtistId = 0;
	var $Title = "";
	var $Price = "";
	var $AlbumArtUrl = "";
}

/* End of file store_manager_controller.php */
/* Location: ./application/controllers/store_manager_controller.php */
