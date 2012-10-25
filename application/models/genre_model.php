<?php 
class genre_model extends CI_Model 
{
	function __construct()
    {
        // 呼叫模型(Model)的建構函數
        parent::__construct();
		$this->load->database();
    }
	
	function get_list()
	{
		//變數名不能用result = ="
		$this->db->select('GenreId');
		$this->db->select('Name');
		$query  = $this->db->get("Genres");
		/*
		foreach ($query ->result()  as $row)
		{
			//沒想到欄位名要分大小寫~
			echo $row->Name;
		}
		*/		
		return $query->result_array() ;
	}
}
/* End of file gene_model.php */
/* Location: application/models/gene_model.php */
