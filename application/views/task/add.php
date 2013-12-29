<html>
	<head>
		<title>Task Insert Form</title>
	</head>
	<body>
		<div>
			<?php $this -> load -> view('nav'); ?>
		</div>
		<div>
			<form action="<?php if (isset($task['ID_task']) == false) {echo site_url('task/add');} else {echo site_url('task/edit'), '/', $task['ID_task'];} ?>" method="post">
				<p><?php echo lang('lbl_duration'); ?>(hh:mm:ss): <input type="time" name="duration" value="<?php if(isset($task['duration']) == TRUE) echo $task['duration']; ?>"></p>
				<p><?php echo lang('lbl_date_start'); ?>: <input type="date" name="date_start" value="<?php if(isset($task['date_start']) == TRUE) echo $task['date_start']; ?>"></p>
				<p><?php echo lang('lbl_comment'); ?>: <textarea name="comment"><?php if(isset($task['comment']) == TRUE) echo $task['comment']; ?></textarea></p>
				<p><?php echo lang('lbl_billable'); ?><input type="checkbox" name="billable" <?php if(isset($task['billable']) == TRUE) {if($task['billable'] == 1) {echo 'checked="checked"';}} ?> /></p>
				<p><input type="submit"></p>
			</form>
		</div>
		<!-- notification if the action was successfull -->
<?php if(isset($notify) == true): ?>
    	<div>
			<?php echo $notify; ?>
    	</div>
<?php endif; ?>
	</body>
</html>