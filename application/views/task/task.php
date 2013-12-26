<html>
	<head>
		<title>Task Form</title>
	</head>
	<body>
		<div>
			<?php $this->load->view('nav'); ?>	
		</div>		
		<div>
			<table>
				<thead>
					<tr>
						<th>User</th>
						<th>Duration</th>
						<th>Starting Date</th>
						<th>Comment</th>
						<th>Billable</th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				</thead>
				<tbody>
<?php foreach ($tasks as $task): //echo $task['comment']; ?>	
					<tr>
						<td><?php echo $task['username'];  ?></td>
						<td><?php echo $task['duration']; ?></td>
						<td><?php echo $task['date_start']; ?></td>
						<td><?php echo $task['comment']; ?></td>
						<td><input type="checkbox" name="" value="" disabled="disabled" <?php if($task['billable'] == 1) {?>checked="checked"<?php }?>/></td>
						<td><a href="<?php echo site_url('task/edit'), '/', $task['ID_task']; ?>">Update</a></td>
						<td><a href="<?php echo site_url('task/delete'), '/', $task['ID_task']; ?>">Delete</a></td>
					</tr>
<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</body>
</html>