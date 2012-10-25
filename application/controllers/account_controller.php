<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class account_controller extends MY_Controller {

	var $home = '/home_controller/';
	
	public function index()
	{
		$this->get_view_collect("Log On",5,"account/logon");
		$data["template_collect"] = $this->template;
		$this->load->view('template',$data);		
	}

	public function logon()
	{	
		$usr = $this->input->post('username', TRUE);
		$pwd = $this->input->post('password', TRUE);
		$ok = $this->get_user($usr,$pwd);
		//echo (int)$ok;
		
		if($ok == FALSE)
		{
			redirect('/account_controller/');
		}
		//登入成功後，如果是admin要再轉去store_manager
		if($this->is_admin())
		{
			redirect('/store_manager_controller/create');
		}
		else
		{
			redirect($this->home);
		}		
	}
	
	public function register()
	{		
		$this->get_view_collect("Register",5,"account/register");
		$data["template_collect"] = $this->template;
		$this->load->view('template',$data);	
	}
	
	public function create()
	{
		$this->load->helper('form');
		$obj = new mvc_user;
		$obj->username = $this->input->post('username', TRUE);
		$obj->password = $this->input->post('password', TRUE);
		$obj->email = $this->input->post('email', TRUE);
		$this->load->model("account_model");	
		$ok = $this->account_model->create($obj);		
		if($ok == 1)
		{
			redirect($this->home);
		}
		else
		{			
			redirect('/account_controller/register');
		}
	}
	
	public function get_user($p_usr,$p_pwd)
	{
		$this->load->model("account_model");	
		$user = $this->account_model->get_user($p_usr,$p_pwd);		
		$logon = FALSE;
		if(count($user)>0)
		{
			$logon = TRUE;
			$this->set_session_value($user[0]->is_admin,$logon
			,$p_usr);			
		}
		return $logon;
	}
	
	public function logout()
	{
		echo "logout";
		$this->set_session_value(FALSE,FALSE,FALSE);	
		$this->checkout();
		echo (int)$this->session->userdata("logon");
	}
	
	public function who()
	{
		echo $this->get_who();
	}	
}

class mvc_user
{
	var $username = "";
	var $password = "";
	var $email = "";
}

/* End of file account_controller.php */
/* Location: ./application/controllers/account_controller.php */