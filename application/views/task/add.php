<html>
	<head>
		<title>Task Form</title>
	</head>
	<body>
		<div>
			<?php $this -> load -> view('nav'); ?>
		</div>
		<div>
			<form action="<?php if (isset($task['ID_task']) == false) {echo site_url('task/add');} else {echo site_url('task/edit'), '/', $task['ID_task'];} ?>" method="post">
				<p>Duration(seconds): <input type="time" name="duration" value="<?php if(isset($task['duration']) == TRUE) echo $task['duration']; ?>"></p>
				<p>Starting date: <input type="date" name="date_start" value="<?php if(isset($task['date_start']) == TRUE) echo $task['date_start']; ?>"></p>
				<p>Comment: <textarea name="comment"><?php if(isset($task['comment']) == TRUE) echo $task['comment']; ?></textarea></p>
				<p>Billable<input type="checkbox" name="billable" <?php if(isset($task['billable']) == TRUE) {if($task['billable'] == 1) {echo 'checked="checked"';}} ?> /></p>
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