<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class shopping_cart_controller extends MY_controller {

	protected $qry = FALSE;

	function __construct()
    {
        // 呼叫的建構函數
        parent::__construct();
    }
	
	public function index()
	{
		$this->load->model("shopping_cart_model");
		$query = $this->shopping_cart_model->get_cart_count($this->get_cart_id());
		$this->qry = $query;		
		$data["cart_items"] = $this->qry;
				
		$this->get_view_collect("Shopping Cart",5,"shoppingcart/index");
		$data["template_collect"] = $this->template;	
		$this->load->view('template',$data);
	}

	public function add_to_cart($p_album_id)
	{	
		$this->load->model("shopping_cart_model");
		$query = $this->shopping_cart_model->add_to_cart($p_album_id
			,$this->get_cart_id());	
		//$data["cart_items"] = $query;	 好像不能這樣做
		$this->qry = $query;
		//$this->index();//↓ 這兩個是差在那
		redirect('/shopping_cart_controller/','refresh');
	}

	public function remove_form_cart($p_id=0)
	{
		$this->load->helper('form');
		if($p_id == FALSE)
		{
			$p_id = $this->input->post('id', TRUE);
		}		 
		//Get the name of the album to display confirmation

		$this->load->model("shopping_cart_model");		
		$qry = $this->shopping_cart_model->get_album_title($p_id);
		$albumName =  "";
		if(count($qry) > 0)
		{
			$albumName = $qry[0]["Title"];
		}
		
							
		// Remove from cart
		$itmCount = 0;
		$itmCount = $this->shopping_cart_model->remove_form_cart($p_id);

		// Display the confirmation message
		$query = $this->shopping_cart_model->get_cart_count($this->get_cart_id());
		
		$cartTotal = 0;
		
		if(count($query) > 0)
		{
			$cartTotal = $query[0]["CartTotal"];

		}
		if($p_id ==FALSE)
		{
			$p_id = 0;
		}
		
		$jsn = new jsn_obj;
		$jsn->Message = $albumName . "has been removed from your shopping cart.";
		$jsn->CartCount = $this->cart_summary();
		$jsn->CartTotal = $cartTotal;
		$jsn->ItemCount = $itmCount;
		$jsn->DeleteId = $p_id;
		
		/*	
		$jsn = array(
				"Message" => $albumName . "has been removed from your shopping cart."
				,"CartCount" => $this->cart_summary()
				,"CartTotal" => $cartTotal
				,"ItemCount" => 0
				,"DeleteId" => $p_id
		);
		
	
		jQuery and CodeIgniter AJAX with JSON not working - Stack Overflow 
		<http://stackoverflow.com/questions/2531273/jquery-and-codeigniter-ajax-with-json-not-working>
		Converting CodeIgniter Query to JSON 
		<http://browse-tutorials.com/tutorial/converting-codeigniter-query-json>
		
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($jsn));
		return Json(results); CI 好像要用 echo 回去哦?			
		header('Content-type: application/json');
		$this->output->set_content_type('application/json');
		
	
		*/				
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($jsn));
	}
	
	//取得CartSessionID	
	/*
	protected function get_cart_id()
	{
		if($this->session->userdata(self::cart_session_key) == false)
		{
			$this->session->set_userdata(self::cart_session_key,uniqid());			
		}
		return $this->session->userdata(self::cart_session_key);
	}
	*/
}

class jsn_obj
{
	var $Message = "";
	var $CartCount = 0;
	var $CartTotal = 0;
	var $ItemCount = "";
	var $DeleteId = "";
}
/* End of file shopping_cart_controller.php */
/* Location: ./application/controllers/shopping_cart_controller.php */