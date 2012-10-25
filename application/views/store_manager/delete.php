<h2>Delete Confirmation</h2>

<p>Are you sure you want to delete the album titled 
   <strong> <?=$albums[0]["Title"];?></strong>?
</p>

<?php
	$this->load->helper('form');
	echo form_open("store_manager_controller/delete_save/" .$albums[0]["AlbumId"]);		
 ?>
    <p>
		<?=form_submit('', 'Delete'); ?>
    </p>
	<p>
		<?=anchor("store_manager_controller/"   ,"Back to List") ?>
	</p>

<?=form_close();?>
