<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class store_controller extends MY_controller {

	public function index()
	{
		$this->get_view_collect("Store",5,"store/index");
		$data["template_collect"] = $this->template;			
		$this->load->view('template',$data);	
	}
		
	public function browse($p_genre)
	{
		$this->load->model("store_model");	
		$data["Albums"] = $this->store_model->browse($p_genre);
						
		$this->get_view_collect("Browse Albums",5,"store/browse");
		$data["template_collect"] = $this->template;			
		$this->load->view('template',$data);		
	}
		
	public function details($p_id)
	{
		$this->load->model("albums_model");		
		$qry = $this->albums_model->find($p_id);			
		$data["detail"] = $qry;
				
		$this->get_view_collect("Album - " . $qry[0]->Title,5,"store/detail");
		$data["template_collect"] = $this->template;	
		$this->load->view('template',$data);
	}
}

/* End of file store_control.php */
/* Location: ./application/controllers/store_control.php */