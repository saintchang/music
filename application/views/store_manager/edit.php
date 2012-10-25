<h2>Edit</h2>

<script src=<?=base_url("/Scripts/jquery.validate.min.js")?>  type="text/javascript"></script>
<script src=<?=base_url("/Scripts/jquery.validate.unobtrusive.min.js")?>  type="text/javascript"></script>
<?php
	$this->load->helper('form');
	echo form_open("store_manager_controller/edit_save/" . $albums[0]["AlbumId"]);	
	
 ?>

    <fieldset>
        <legend>Album</legend>
		<!--
        @Html.HiddenFor(model => model.AlbumId)
		-->
		<div class="editor-label">
			<label for="GenreId">Genre</label>	
		</div>
		<div class="editor-field">
		<?php 		
			$options = array();
			foreach($template_collect["genre"] as $g)
			{
				$options[$g["GenreId"]]=$g["Name"];
			}
			echo form_dropdown('GenreId', $options,$albums[0]["GenreId"]);
		?>
		</div>
		<!--
        <div class="editor-field">
            @Html.DropDownList("GenreId", String.Empty)
            @Html.ValidationMessageFor(model => model.GenreId)
        </div>
		-->
		<div class="editor-label">
			<label for="username">Artist</label>	
		</div>
		<div class="editor-field">
		<?php 		
			$options = array();
			foreach($Artist as $a)
			{
				$options[$a["ArtistId"]]=$a["Name"];
			}
			echo form_dropdown('ArtistId', $options,$albums[0]["ArtistId"]);
		?>
		</div>
		<!--    @Html.ValidationMessageFor(model => model.ArtistId)-->

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
				echo form_input($Title,$albums[0]["Title"]);
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
				echo form_input($Price,$albums[0]["Price"]);
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
				echo form_input($AlbumArtUrl,$albums[0]["url"]);
			?>
		</div>

        <p>
			<?=form_submit('', 'Edit'); ?>
		</p>
    </fieldset>


<div>
    <?=anchor("store_manager_controller/"   ,"Back to List") ?>
</div>
