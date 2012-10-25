<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//class Welcome extends CI_Controller {
class home_controller extends MY_Controller {

	public function index()
	{			
		$this->get_view_collect("PHP Codeigniter Music Store",5,"home/index");
		$data["template_collect"] = $this->template;				
		$this->load->view('template',$data);
	}
}

/* End of file home_controller.php */
/* Location: ./application/controllers/home_controller.php */