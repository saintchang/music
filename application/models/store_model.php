<?php 
class store_model extends CI_Model 
{
	function __construct()
    {
        // 呼叫模型(Model)的建構函數
        parent::__construct();
		$this->load->database();
    }
	
	public function details($p_id)
	{
		
	}
	
	public function browse($p_genre)
	{
		$this->db->select("a.Name,b.*");
		$this->db->from("Genres a");
		$this->db->join("Albums b","a.GenreId = b.GenreId","left");
		if($p_genre != FALSE)
		{	
			$this->db->where('a.Name', $p_genre);
		}
		$query = $this->db->get();
		return $query->result_array();
	}
}
/* End of file gene_model.php */
/* Location: application/models/gene_model.php */
