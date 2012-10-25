<h2>Details</h2>

<fieldset>
    <legend>Album</legend>

    <div class="display-label">Genre</div>
    <div class="display-field">
		<?=$albums[0]["genre"];?>
    </div>

    <div class="display-label">Artist</div>
    <div class="display-field">
        <?=$albums[0]["artist"];?>
    </div>

    <div class="display-label">Title</div>
    <div class="display-field">
        <?=$albums[0]["Title"];?>
    </div>

    <div class="display-label">Price</div>
    <div class="display-field">
        <?=$albums[0]["Price"];?>
    </div>

    <div class="display-label">AlbumArtUrl</div>
    <div class="display-field">
        <?=$albums[0]["url"];?>
    </div>
</fieldset>
<p>
	<?=anchor("store_manager_controller/edit/" .$albums[0]["AlbumId"]  ,"Edit") ?>
     |
	<?=anchor("store_manager_controller/"   ,"Back to List") ?>
</p>
