<?php 
class account_model extends MY_Model 
{
	//var $user_table = "mvc_user";
	var $error_msg = "";
	var $is_admin = 0;
	function __construct()
    {
        // 呼叫模型(Model)的建構函數
        parent::__construct();
		$this->load->database();
		$this->user_table = "mvc_user";
    }
	
	public function get_user($usr,$pwd)
	{
		$this->db->select($this->get_user_statement(constant("MYDB")));
		$query = $this->db->get_where($this->user_table
			,array("username"=>$usr,"password"=>$pwd));			
		return $query->result();
	}
	
}
/* End of file account_model.php */
/* Location: application/models/account_model.php */
