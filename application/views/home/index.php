<div id="promotion">
</div>

<h3><em>Fresh</em> off the grill</h3>

<ul id="album-list">
<?php 
	$this->load->helper('html');
	foreach ($template_collect["albums"]->result()  as $row)
	{
		echo "<li><a href=" . site_url("store_controller/details/". $row->AlbumId)  . "> "
		. "<img src=" . base_url($row->AlbumArtUrl) . " alt='" . $row->Title . "'/> "		
		. "<span>" . $row->Title  . "</span></a></li>";
	}
?>
</ul>


