<div class="main-content">
			<form action="<?php echo site_url('/todo/add'); ?>" method="post">
				<p><?php echo lang('lbl_comment'); ?>: <textarea name="comment"></textarea></p>
				<p><input type="submit"></p>
			</form>
		</div>
		<!-- notification if the action was successfull -->
<?php if(isset($notify) == true): ?>
    	<div>
			<?php echo $notify; ?>
    	</div>
<?php endif; ?>
</div>