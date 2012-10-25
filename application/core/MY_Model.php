<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Model extends CI_Model {

	var $user_table = ""; 
	var $error_msg = "";
	function __construct()
    {
        // 呼叫模型(Model)的建構函數
        parent::__construct();
		$this->load->database();
    }

	/*
	2012-07-08 如果是用object的方式把值傳到model 這來
				就可以把建檔的動作移到上一層來
	*/
	public function create($obj)
	{
		$this->error_msg = "";
		/*如果要自己catch 到Error 要記得把db_debug 設成false
		set db_debug to FALSE in the database config file
		*/
		$ok = TRUE;
		$ok = $this->db->insert($this->user_table,$obj);
		if(!$ok)
		{
			$this->error_msg = $this->db->_error_message();	
		}
		return (int)$ok;
	}	
	
	protected function get_db_type($p_db)
	{
		$db = "mssql";
		if($p_db == "mysql")
		{
			$db = "mysql";
		}
		return $db;
	}
	
	protected function get_albums_statement($p_db="mssql")
	{
		$db = $this->get_db_type($p_db);				
		
		$sql = array(
			"mssql" => "SELECT TOP {0} A.* 
						FROM 
						ALBUMS A LEFT OUTER JOIN 
							(SELECT 
								ALBUMID
								,COUNT(*)CNT
								FROM OrderDetails
								GROUP BY ALBUMID) 
						B ON A.ALBUMID = B.ALBUMID
						ORDER BY B.CNT DESC "
			,"mysql" => "SELECT
								a.*
							FROM Albums a LEFT OUTER JOIN (
								select 
									AlbumId
									,COUNT(AlbumId)cnt
								 from OrderDetails
								 GROUP BY AlbumId)b
							on a.AlbumId = b.AlbumId
							order by b.cnt desc
							limit 0,{0};"
			);
		return $sql[$db];		
	}
	
	protected function get_user_statement($p_db)
	{
		$db = $this->get_db_type($p_db);	
		$sql = array(
			"mssql" => "username,password,email,is_admin"
			,"mysql" => "username
						,password,email
						,cast(is_admin as unsigned integer)is_admin"
		
		);
		return $sql[$db];			
	}
	
	protected function get_add_to_cart_statement($p_db)
	{
		$db = $this->get_db_type($p_db);
		$sql = array(
			"mssql" => "INSERT INTO Carts([CartId]
					  ,[AlbumId],[Count],[DateCreated]) VALUES('{0}',{1},{2},GETDATE())"
			,"mysql" => "INSERT INTO Carts(CartId
					  ,AlbumId,Count,DateCreated) VALUES('{0}',{1},{2},sysdate())"		
		);
		return $sql[$db];			
	}
	
	protected function get_inventory_statement($p_db)
	{
		$db = $this->get_db_type($p_db);
		$sql = array(
			"mssql" => "SELECT 
					CASE 
						WHEN [COUNT] > 0 AND [COUNT] = 1 THEN 0
						WHEN [COUNT] > 0 THEN [COUNT] -1 ELSE 0 
					END [Result]
				FROM [MvcMusicStore].[dbo].[Carts]
				WHERE [RecordId] = "
			,"mysql" => "SELECT 
					CASE 
						WHEN Count > 0 AND Count = 1 THEN 0
						WHEN Count > 0 THEN Count -1 ELSE 0 
					END Result
				FROM MvcMusicStore.Carts
				WHERE RecordId =  "		
		);
		return $sql[$db];
	}
	
	protected function get_create_statement($p_db)
	{
		$db = $this->get_db_type($p_db);
		$sql = array(
			"mssql" => "INSERT INTO Orders(OrderDate,Username
,FirstName,LastName,Address,City,State,PostalCode
,Country,Phone,Email,Total) VALUES(GETDATE(),'"
			,"mysql" => "INSERT INTO Orders(OrderDate,Username
,FirstName,LastName,Address,City,State,PostalCode
,Country,Phone,Email,Total) VALUES(sysdate(),'"
		);
		return $sql[$db];		
	}
	
	protected function get_create_detail_statement($p_db)
	{
		$db = $this->get_db_type($p_db);
		$sql = array(
			"mssql" => "INSERT INTO OrderDetails(OrderId,AlbumId,Quantity,UnitPrice) 
	SELECT (select @@IDENTITY as insert_id) OrderId
		,a.AlbumId,[Count],b.Price 
	FROM Carts a LEFT OUTER JOIN albums b 
	ON a.AlbumId = b.AlbumId 
	WHERE CartId ='"
			,"mysql" => "INSERT INTO OrderDetails(OrderId,AlbumId,Quantity,UnitPrice) 
	select last_insert_id()  OrderId
		,a.AlbumId,Count,b.Price 
	FROM Carts a LEFT OUTER JOIN Albums b 
	ON a.AlbumId = b.AlbumId 
	WHERE CartId ='"		
		);
		return $sql[$db];
	}
}

/* End of file MY_Model.php */
/* Location: ./application/controllers/MY_Model.php */
