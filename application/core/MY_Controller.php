<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_controller extends CI_Controller {
	var $template = FALSE;
	const cart_session_key = "CartId";
	const admin = "admin";
	const logon = "logon";
	const user = "user";
	function __construct()
    {
        // 呼叫的建構函數
        parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
    }
	
	protected function get_genre()
	{
		$this->load->model("genre_model");							
		return $this->genre_model->get_list();	
	}
	
	//找出N名的銷量
	protected function get_top_selling_albums($p_count)
	{
		$this->load->model("albums_model");									
		return $this->albums_model->get_top_selling_albums($p_count);
	}
	
	//取得目前shopping cart 中有多少東西
	protected function cart_summary()
	{
		$cart_count = 0;
		//echo self::cart_session_key;
		//表示還沒有東西放到shopping cart中去\
		
		if($this->session->userdata(self::cart_session_key)
						<> FALSE)
		{
			$this->load->model("shopping_cart_model","shopcart");
			$cart_count = $this->shopcart->cart_summary(
				$this->session->userdata(self::cart_session_key));
			if($cart_count == FALSE)
			{
				$cart_count = 0;
			}		
		}
		
		return $cart_count;
	}	
		
	//檢查是否已經登入過
	protected function is_logon()
	{		
		$is_logon = FALSE;		
		if($this->session->userdata("logon") <> FALSE)
		{
			$is_logon = TRUE;
		}
		return $is_logon;
	}
	
	//檢查是否為Administrator
	protected function is_admin()
	{
		$is_admin = FALSE;
		if($this->session->userdata(self::admin)<>FALSE)
		{
			$is_admin = TRUE;
		}
		return $is_admin;
	}
	
	protected function get_who()
	{
		$user = "";		
		if($this->session->userdata(self::user)<>FALSE)
		{
			$user = $this->session->userdata(self::user);
		}
		return $user;		
	}
	
	protected function set_session_value($p_admin,$p_logon,$p_user)
	{
		//如果登入過就記錄下來 1表示logon 成功
		$this->session->set_userdata(self::logon,$p_logon);
		$this->session->set_userdata(self::admin,$p_admin);
		$this->session->set_userdata(self::user,$p_user);
	}
	
	protected function get_view_collect($p_title="PHP Codeigniter Music Store"
					,$p_albums=5,$p_include="home/index")
	{
		
		$this->template = array("genre" => $this->get_genre()
				,"albums" => $this->get_top_selling_albums($p_albums)
				,"cart_count" => $this->cart_summary()
				,"title" => $p_title
				,"include" => $p_include
				);		
	}
	
	protected function get_cart_id()
	{
		if($this->session->userdata(self::cart_session_key) == FALSE)
		{
			$this->session->set_userdata(self::cart_session_key,uniqid());			
		}
		return $this->session->userdata(self::cart_session_key);
	}
	
	//這時要把cart_session_key 清空
	protected function checkout()
	{
		$this->session->set_userdata(self::cart_session_key,FALSE);
	}
}

/* End of file MY_controller.php */
/* Location: ./application/controllers/MY_controller.php */
