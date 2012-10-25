<div class="genre">
    <h3><em><?php echo $Albums[1]["Name"] ?></em> Albums</h3>
 
    <ul id="album-list">
		<?php 
		$this->load->helper('html');
		$this->load->helper('url');
		foreach($Albums as $row)
		{
			echo "<li><a href=" . site_url("store_controller/details/" . $row["AlbumId"]) . "> "
				. "<img src=" . base_url($row["AlbumArtUrl"]) . " alt=" . $row["Title"] . "/> "	
				. "<span>" . $row["Title"]  . "</span></a></li>";				
		}
		?>        
    </ul>
</div>