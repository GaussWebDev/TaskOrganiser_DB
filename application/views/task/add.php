<div class="main-content">
	<div class="addtask">
			<form action="<?php if (isset($task['ID_task']) == false) {echo site_url('task/add');} else {echo site_url('task/edit'), '/', $task['ID_task'];} ?>" method="post">
				<div class="form-group"><label><?php echo lang('lbl_duration'); ?></label>: <input class="form-control" placeholder="(hh:mm:ss)" type="time" name="duration" value="<?php if(isset($task['duration']) == TRUE) echo $task['duration']; ?>"></div>
				<div class="form-group"><label><?php echo lang('lbl_date_start'); ?>:</label> <input type="date" placeholder="Enter start date" class="form-control"name="date_start" value="<?php if(isset($task['date_start']) == TRUE) echo $task['date_start']; ?>"></div>
				<div class="form-group"><label><?php echo lang('lbl_comment'); ?>:</label> <textarea style="resize:none;" placeholder="Describe task" class="form-control" name="comment"><?php if(isset($task['comment']) == TRUE) echo $task['comment']; ?></textarea></div>
				<div class="form-group"><label><?php echo lang('lbl_billable'); ?><input class="form-control" type="checkbox" name="billable" <?php if(isset($task['billable']) == TRUE) {if($task['billable'] == 1) {echo 'checked="checked"';}} ?></label> </div>
				<div class="form-group"><label><input class="btn btn-primary btn-lg tasksubmit" type="submit" value="Submit"></p>
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