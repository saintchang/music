<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class checkout_controller extends MY_controller {

	public function index()
	{
		//codeigniter: how to redirect after login to current controller (php_self in regular php) - Stack Overflow 
		//<http://stackoverflow.com/questions/2652930/codeigniter-how-to-redirect-after-login-to-current-controller-php-self-in-regu>
		if($this->is_logon()== FALSE)
		{
			redirect('/account_controller/','location');
		}
		$this->get_view_collect("Address And Payment",5,"checkout/AddressAndPayment");
		$data["template_collect"] = $this->template;				
		$this->load->view('template',$data);
	}
	
	public function create_save()
	{
		$ok = 0;
		try
		{
		$this->load->helper('form');
		$obj2 = new order_details;
		/*
		$obj = new payment;		
		$obj->FirstName =  $this->input->post('FirstName', TRUE);
		$obj->LastName = $this->input->post('LastName', TRUE);
		$obj->Address = $this->input->post('Address',TRUE);
		$obj->City = $this->input->post('City',TRUE);
		$obj->State = $this->input->post('State',TRUE);
		$obj->PostalCode = $this->input->post('PostalCode',TRUE);
		$obj->Country = $this->input->post('Country',TRUE);
		$obj->Phone = $this->input->post('Phone',TRUE);
		$obj->Email = $this->input->post('Email',TRUE);
		*/
		$this->load->model("checkout_model");
		$this->load->model("shopping_cart_model");	
		$query = $this->shopping_cart_model->get_cart_count($this->get_cart_id());
		$obj = array(
			'Username' => $this->get_who()
			,'FirstName' => $this->input->post('FirstName', TRUE)
			,'LastName' => $this->input->post('LastName', TRUE)
			,'Address' =>  $this->input->post('Address',TRUE)
			,'City' => $this->input->post('City',TRUE)
			,'State' => $this->input->post('State',TRUE)
			,'PostalCode' => $this->input->post('PostalCode',TRUE)
			,'Country' => $this->input->post('Country',TRUE)
			,'Phone' => $this->input->post('Phone',TRUE) 
			,'Email' => $this->input->post('Email',TRUE) 
			,'Total' => $query[0]["CartTotal"]
		);
		$ok = $this->checkout_model->create($obj,$obj2,$this->get_cart_id());
		$this->checkout();
		}
		catch(Exception $e)
		{
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		redirect($this->home);
		/*
		//$obj2->$OrderId = $query[0][;
		$obj2->$AlbumId = $query[0]["AlbumId"];
		$obj2->$Quantity = $query[0]["Count"];
		$obj2->$UnitPrice = $query[0]["Price"];
		*/
	}
	
	
}
class payment
{
	var $FirstName = "";
	var $LastName = "";
	var $Address = "";
	var $City = "";
	var $State = "";
	var $PostalCode = "";
	var $Country = "";
	var $Phone = "";
	var $Email = "";
}
class order_details
{
	var $OrderId = 0;
	var $AlbumId = 0;
	var $Quantity = 0;
	var $UnitPrice = 0;
}

/* End of file checkout_controller.php */
/* Location: ./application/controllers/checkout_controller.php */
