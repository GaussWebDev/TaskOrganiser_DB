<script>var menu_id='uploads-dropdown';</script>
<div class="main-content">
<div class="newupload">
<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>
<div class="form-group"><label>Comment:</label></div><!-- FIXME: Use lang()!!! -->
<textarea class="form-control" style="resize:none;" placeholder="Describe upload" name="comment" rows="10" cols="20"></textarea>
<div class="form-group">
<input class="btn btn-primary btn-lg upload" type="file" name="userfile" size="20" placeholder=""/>
</div>

<div class="form-group">

<input class="btn btn-primary btn-lg upload" type="submit" value="Upload" />

</div>


</div>

</div>