<?php 
class store_manager_model extends MY_Model //CI_Model 
{
	function __construct()
    {
        // 呼叫模型(Model)的建構函數
        parent::__construct();
		$this->load->database();
		$this->user_table = "Albums";
    }
	
	public function details($p_id)
	{
		return $this->get_data($p_id);
	}
	
	public function browse()
	{
		return $this->get_data(FALSE);
	}
	

	protected function  get_data($p_id)
	{
		$this->db->select("a.AlbumId,c.Name as genre,b.Name as artist,a.Title,a.Price,AlbumArtUrl AS url,a.GenreId,a.ArtistId");
		$this->db->from("Albums a");
		$this->db->join("Artists b","a.ArtistId = b.ArtistId","left");
		$this->db->join("Genres c","a.GenreId = c.GenreId","left");
		if($p_id != FALSE)
		{
			$this->db->where('a.AlbumId', $p_id);
		}
		$query = $this->db->get();
		return $query->result_array();	
	}
	
		
	public function delete($p_id)
	{	
		$this->db->delete('Albums', array('AlbumId' => $p_id)); 		
	}
	
	public function update($obj,$p_id)
	{
		$this->error_msg = "";
		/*如果要自己catch 到Error 要記得把db_debug 設成false
		set db_debug to FALSE in the database config file
		*/
		$ok = TRUE;
		$this->db->where('AlbumId', $p_id);
		$ok = $this->db->update($this->user_table,$obj);
		if(!$ok)
		{
			$error_msg = $this->db->_error_message();	
		}
		return (int)$ok;
	}
	
	public function get_artlist()
	{
		$this->db->select("ArtistId");
		$this->db->select("Name");
		$query = $this->db->get("Artists");
		return $query->result_array();
	}	
}
/* End of file store_manager_model.php */
/* Location: application/models/store_manager_model.php */
