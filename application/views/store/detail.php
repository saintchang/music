
<h2><?php echo $template_collect["title"] ?> </h2>
<p>    
	<?php 
		$this->load->helper('url');
		echo "<img alt='" . $detail[0]->Title . "' src=" .  base_url($detail[0]->AlbumArtUrl) . " />";
	?>
</p>
<div id="album-details">
    <p>
        <em>Genre:</em>
        <?php echo  $detail[0]->Name; ?>
    </p>
    <p>
        <em>Artist:</em>
		<?php echo $detail[0]->ArtistName; ?>
    </p>
    <p>
        <em>Price:</em>
		<?php echo $detail[0]->Price; ?>
    </p>
	
    <p class="button">		
        <?php echo anchor('shopping_cart_controller/add_to_cart/' . $detail[0]->AlbumId
		,'Add to cart')  ?>
    </p>
	
</div>
