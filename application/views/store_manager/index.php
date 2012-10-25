<?php 
function truncate($p_input,$p_length)
{
	if(strlen($p_input) > $p_length)
	{
		$p_input =  substr($p_input,0,$p_length). "...";
	}
	return $p_input ;
}
?>
<h2>Index</h2>
<p>
	<?=anchor("store_manager_controller/Create","Create New")?>
</p>
<table>
	<tr>
        <th>
            Genre
        </th>
        <th>
            Artist
        </th>
        <th>
            Title
        </th>
        <th>
            Price
        </th>
        <th></th>
    </tr>
	<?php 
	foreach($glist as $g)
	{
		$tag = "<tr>" 
				. "<td>" . $g["genre"] . "</td>"
				. "<td>" . truncate($g["artist"],25) . "</td>"
				. "<td>" . truncate($g["Title"],25) . "</td>"
				. "<td>" . $g["Price"] . "</td>"
				. "<td>" . anchor("store_manager_controller/edit/" .$g["AlbumId"]  ,"Edit") .
					" | " . anchor("store_manager_controller/details/" .$g["AlbumId"]  ,"Details") .
					" | " . anchor("store_manager_controller/delete/" .$g["AlbumId"]  ,"Delete") .
				"</td>"
				."</tr>";
		echo $tag;
	}
	?>	
</table>

