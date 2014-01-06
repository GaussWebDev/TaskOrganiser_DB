<script>var menu_id='todo-dropdown';</script>
<div class="main-content">
	<div class="addtodo">
			<form action="<?php echo site_url('/todo/add'); ?>" method="post">
				<div class="form-group"><label><?php echo lang('lbl_comment'); ?>:</label> <textarea style="resize:none;" class="form-control" name="comment" placeholder="Add ToDo note"></textarea></div>
				<div class="form-group"><input class="btn btn-primary btn-lg usersubmit" value="Submit" type="submit"></div>
			</form>
		</div>
		<!-- notification if the action was successfull -->
<?php if(isset($notify) == true): ?>
    	<div>
			<?php echo $notify; ?>
    	</div>
<?php endif; ?>
</div>
</div>