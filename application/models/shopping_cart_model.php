<?php 
class shopping_cart_model extends MY_Model 
{
	var $cart_session_key = "cart_id";

	function __construct()
    {
        // 呼叫模型(Model)的建構函數
        parent::__construct();
		$this->load->database();
    }
		
	public function cart_summary($p_cartid)
	{	
		$this->db->select("SUM(Count) CNT");	
		//$this->db->select("COUNT(CartId)CNT");	
		$query = $this->db->get_where("Carts",array("CartId"=>$p_cartid));	
		$tmp = $query->result_array();
		return $tmp[0]["CNT"];
	}	
	
	public function get_cart_id()
	{
		return uniqid();
	}
	
	public function add_to_cart($p_album_id,$p_cart_id)
	{
		//找出相同的CartID、AlbumID
		$query = $this->get_exist_cart($p_album_id,$p_cart_id);
		$sql = "";			
		$cnt = 1; //預設為1，如果有這筆紀錄有存在，則要取出目前有多少個
		//echo count($query->result_array());
		$record_id = 0; //這是key 值用來查詢用
		if(count($query) == 0)
		{
			/*insert*/
			
			/*$sql = "INSERT INTO Carts([CartId]
					  ,[AlbumId],[Count],[DateCreated]) VALUES("
					. "'" . $p_cart_id . "',"
					. $p_album_id . ","		
					. $cnt . ","
					. "GETDATE())";
			*/	
			$sql = $this->get_add_to_cart_statement(constant("MYDB"));
			$sql = str_replace("{0}",$p_cart_id,$sql);
			$sql = str_replace("{1}",$p_album_id,$sql);
			$sql = str_replace("{2}",$cnt,$sql);
			$this->db->query($sql);				
			//$query = $this->get_exist_cart($p_album_id,$p_cart_id);	
			//$record_id = $query[0]["RecordId"];					
		}
		else
		{			
			$cnt = $cnt + $query[0]["Count"];
			$record_id = $query[0]["RecordId"];
			//已存在，要更新 count 
			$data = array('Count' => $cnt);
			$this->db->where('RecordId', $query[0]["RecordId"]);
			$this->db->update('Carts', $data); 											
		}		
		//要再計算出這一個訂單的數量和金額
		$query = $this->get_cart_count($p_cart_id);	
		return $query;
	}
	
	protected function get_exist_cart($p_album_id,$p_cart_id)
	{
		$query = $this->db->get_where('Carts'
			, array('AlbumId' => $p_album_id
					,"CartId" => $p_cart_id));
		return $query->result_array();
	}
	
	public function get_cart_count($CartId)
	{
		$sql = "SELECT
	A.*
	,B.CartTotal
FROM(
SELECT
	a.RecordId
	,a.CartId
	,a.AlbumId
	,a.Count
	,b.Title
	,b.Price	
FROM Carts a LEFT OUTER JOIN Albums b
ON a.AlbumId = b.AlbumId	
WHERE CartId = '" . $CartId . "'
)A LEFT OUTER JOIN (
			SELECT
				A.CartId
				,SUM(CartTotal)CartTotal
			FROM(
			SELECT
				a.RecordId
				,a.CartId
				,a.AlbumId
				,a.Count
				,b.Title
				,b.Price	
				,a.Count * b.price as CartTotal
			FROM Carts a LEFT OUTER JOIN Albums b
			ON a.AlbumId = b.AlbumId	
			WHERE CartId = '" .$CartId . "'
			)A GROUP BY CartId
	)B
ON	A.CartId = B.CartId";
		$query = $this->db->query($sql);
		return $query->result_array();		
	}
	
	
	public function remove_form_cart($p_id)
	{
		$inventory = $this->get_inventory($p_id);
		if($inventory[0]["Result"]== 0)
		{
			$this->db->delete('Carts', array('RecordId' => $p_id)); 	
		}
		else
		{
			$this->update_inventory($p_id,$inventory[0]["Result"]);
		}
		return $inventory[0]["Result"];
	}
	
	protected function update_inventory($p_id,$p_inventory)
	{
		/* 因為CI的關係，如果這樣下會變成執行兩次
		$sql = "UPDATE [MvcMusicStore].[dbo].[Carts]
	SET [Count] = (SELECT CASE 
	WHEN [COUNT] > 0 THEN [COUNT] -1 ELSE 0 END [RESULT]
FROM [MvcMusicStore].[dbo].[Carts]
WHERE [RecordId] = " . $p_id ."
)
WHERE [RecordId] = " . $p_id;
*/

		$sql = "UPDATE Carts SET Count = {0} WHERE RecordId = {1}";
		$sql = str_replace("{0}",$p_inventory,$sql);
		$sql = str_replace("{1}",$p_id,$sql);
		$this->db->query($sql);
	}
	
	protected function get_inventory($p_id)
	{
		$sql = $this->get_inventory_statement(constant("MYDB")). $p_id;
		/*
		$sql = "SELECT 
					CASE 
						WHEN [COUNT] > 0 AND [COUNT] = 1 THEN 0
						WHEN [COUNT] > 0 THEN [COUNT] -1 ELSE 0 
					END [Result]
				FROM [MvcMusicStore].[dbo].[Carts]
				WHERE [RecordId] = " . $p_id ;
				*/ 
		$query = $this->db->query($sql);
		return $query->result_array();		
	}
	
	public function get_album_title($p_id)
	{
		$sql = "SELECT
				a.RecordId
				,a.CartId
				,a.AlbumId
				,a.Count
				,b.Title
				,b.Price	
			FROM Carts a LEFT OUTER JOIN Albums b
			ON a.AlbumId = b.AlbumId	
			WHERE RecordId = '" . $p_id . "'";
		$query = $this->db->query($sql);
		return $query->result_array();	
	}
}
/* End of file gene_model.php */
/* Location: application/models/gene_model.php */
/*
UPDATE [MvcMusicStore].[dbo].[Carts]
	SET [Count] = (SELECT CASE 
	WHEN [COUNT] > 0 THEN [COUNT] -1 ELSE 0 END [RESULT]
FROM [MvcMusicStore].[dbo].[Carts]
WHERE [RecordId] = 3
)
WHERE [RecordId] = 3
*/
//echo $sql;
		//if($query->result
		//echo count($query->result_array());
		//$qq = $query->result();
		//var_dump($qq);
		//var_dump($query->result_array());
		//echo $qq[0]->cnt;
		//echo $query->result()[0]->cnt;
