<h3>Browse Genres</h3>

<p>
    Select from <?php echo count($template_collect["genre"]) ?> genres:</p>
<ul>
	<?php
	foreach($template_collect["genre"] as $g)
	{
		echo "<li>" . anchor("store_controller/browse/" . $g["Name"] 
			,$g["Name"]) . "</li>" ;			
	}	
	?>	
</ul>