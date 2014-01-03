<div class="main-content">

<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>
<p>Comment:</p><!-- FIXME: Use lang()!!! -->
<textarea name="comment" rows="10" cols="20"></textarea>
<p>
<input type="file" name="userfile" size="20" />
</p>
<br /><br />

<input type="submit" value="upload" />
</div>