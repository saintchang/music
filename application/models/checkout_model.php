<?php 
class checkout_model extends MY_Model 
{
	function __construct()
    {
        // ㊣家(Model)篶ㄧ计
        parent::__construct();
		$this->load->database();
		//$this->user_table = "";
    }
	
	function create($p_obj,$p_obj2,$p_cart_id)
	{	
		/*
		$sql = "INSERT INTO Orders(OrderDate,Username";
		$sql .= ",FirstName,LastName,Address,City,State,PostalCode";
		$sql .= ",Country,Phone,Email,Total) VALUES(GETDATE(),'";
		*/
		$sql = $this->get_create_statement(constant("MYDB"));
		$sql .= $p_obj["Username"] . "'" . ",'" . $p_obj["FirstName"] . "'" .	",'" ;
		$sql .= $p_obj["LastName"] . "'" .",'" . $p_obj["Address"] . "'" . ",'" ;
		$sql .= $p_obj["City"] . "'" . ",'" . $p_obj["State"] . "'" ;
		$sql .= ",'" . $p_obj["PostalCode"] . "'" . ",'" . $p_obj["Country"] . "'" ;
		$sql .= ",'" . $p_obj["Phone"] . "'" . ",'" . $p_obj["Email"] . "'" ;
		$sql .= "," . $p_obj["Total"] . ")" ;		
		/*
		$data = array(
				'OrderDate'=>'GETDATE()'
				,'Username'=>$p_obj["Username"]
				,'FirstName'=>$p_obj["FirstName"]
				,'LastName'=>$p_obj["LastName"]
				,'Address'=>$p_obj["Address"] 
				,'City'=>$p_obj["City"]
				,'State'=>$p_obj["State"]
				,'PostalCode'=>$p_obj["PostalCode"]
				,'Country'=>$p_obj["Country"]
				,'Phone'=>$p_obj["Phone"]
				,'Email'=>$p_obj["Email"]
				,'Total'=>$p_obj["Total"]
				);				
				//string(266) "INSERT INTO Orders([OrderDate] ,[Username],[FirstName],[LastName] ,[Address],[City],[State] ,[PostalCode],[Country],[Phone] ,[Email],[Total]) VALUES(GETDATE() ,'123','123','123','123','taipei','ddd','105','taiwan','123456789','email@gmail.com',0)" [Microsoft][SQL Server Native Client 10.0]COUNT field incorrect or syntax error		
		
		$sql = "INSERT INTO Orders([OrderDate]
				,[Username],[FirstName],[LastName]
				,[Address],[City],[State]
				,[PostalCode],[Country],[Phone]
				,[Email],[Total]) VALUES(GETDATE(),'" . '123' . "'" .
				",'" . $t1 . "'" .
				",'" . '123' . "'" .
				",'" . '123' . "'" .
				",'" . 'taipei' . "'" .
				",'" . 'ddd' . "'" .
				",'" . '105' . "'" .
				",'" . 'taiwan' . "'" .
				",'" . '123456789' . "'" .
				",'" . 'email@gmail.com' . "'" .
				"," . '0' . ")" 
				;
		*/		
		$AAA  = $this->db->query($sql);
		//$AAA = $this->db->insert('Orders'$data); 
		if($AAA == FALSE)
		{
			echo $this->db->_error_message();	
		}
		else
		{
			//眔穝糤ID
			//$identity = $this->db->insert_id("select @@IDENTITY as insert_id");
			//穝糤 details璶ㄢ把计1.CartID2.order id
			/*
			$sql = "INSERT INTO OrderDetails(OrderId,AlbumId,Quantity,UnitPrice) ";
			$sql .= "SELECT ";
			$sql .= "(select @@IDENTITY as insert_id) OrderId";
			$sql .=	",a.AlbumId,[Count],b.Price ";
			$sql .=	"FROM Carts a LEFT OUTER JOIN albums b ";
			$sql .=	"ON a.AlbumId = b.AlbumId ";
			$sql .=	"WHERE CartId ='" . $p_cart_id ."'";
			*/
			
			$sql = $this->get_create_detail_statement(constant("MYDB"));
			$sql .=  $p_cart_id . "'";
			//die($sql);;
			$this->db->query($sql);
		}
		
		/*	
		$ok = 0;
		$this->user_table = "Orders";
		$ok = parent::create($p_obj);
		if($ok == 0)
		{
			echo "<br>Error:" . $this->error_msg;
		}		
		return $ok;
		
		$this->user_table = "OrderDetails";
		parent::create($p_obj2);	
		*/
	}
}
/* End of file checkout_model.php */
/* Location: application/models/checkout_model.php */
