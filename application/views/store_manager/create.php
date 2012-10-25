<h2>Create</h2>
<script src=<?php echo base_url("/Scripts/jquery.validate.min.js")?>  type="text/javascript"></script>
<script src=<?php echo base_url("/Scripts/jquery.validate.unobtrusive.min.js")?>  type="text/javascript"></script>
<?php
	echo "hello";
	$this->load->helper('form');
	$this->load->helper('my_frm');
	echo form_open("store_manager_controller/create_save");	
 ?>
<fieldset>
	<legend>Album</legend>
	<div class="editor-label">
		<label for="GenreId">Genre</label>	
    </div>
    <div class="editor-field">
		<?php 		
			/*
			$options = array();
			foreach($template_collect["genre"] as $g)
			{
				$options[$g["GenreId"]]=$g["Name"];
			}
			echo form_dropdown('GenreId', $options);
			*/
			echo my_frm_dropdown($template_collect["genre"],"GenreId","Name");
		?>
    </div>

    <div class="editor-label">
		<label for="username">Artist</label>	
    </div>
    <div class="editor-field">
		<?php 		
			/*
			$options = array();
			foreach($Artist as $a)
			{
				$options[$a["ArtistId"]]=$a["Name"];
			}
			echo form_dropdown('ArtistId', $options);
			*/
			echo my_frm_dropdown($Artist,'ArtistId',"Name");
		?>
    </div>

    <div class="editor-label">
		<label for="Title">Title</label>	
    </div>
    <div class="editor-field">
		<?php 			
			$Title = array(
			  'name'    => 'Title',				  
			  'id'      => 'Title',
			  'type' 	=> 'text',
			  'data-val' => 'true',
			  'data-val-required' => 'An Album Title is required'
			);
			echo form_input($Title);			
		?>
		<span data-valmsg-for="Title"></span>
    </div>

    <div class="editor-label">
		<label for="Price">Price</label>	
    </div>
    <div class="editor-field">
		<?php 		
			$Price = array(
			  'name'    => 'Price',				  
			  'id'      => 'Price',
			  'type' 	=> 'text',
			  'data-val' => 'true',
			  'data-val-required' => 'Price is required');
			echo form_input($Price);
		?>
		<span data-valmsg-for="Price"></span>
	</div>

    <div class="editor-label">
		<label for="AlbumArtUrl">Album Art URL</label>	        
    </div>
    <div class="editor-field">
		<?php
			$AlbumArtUrl = array(
			  'name'    => 'AlbumArtUrl',				  
			  'id'      => 'AlbumArtUrl',
			  'type' 	=> 'text');
			echo form_input($AlbumArtUrl);
		?>
    </div>

    <p>
		<?=form_submit('', 'Create'); ?>
    </p>
</fieldset>	
<?=form_close();?>
<div>
<?=anchor("store_manager_controller/","Back to List")?>
</div>
