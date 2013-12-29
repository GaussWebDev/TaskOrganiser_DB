<<<<<<< HEAD
<div class="main-content">
=======
<html>
	<head>
		<title>Task List Form</title>
	</head>
	<body>
		<div>
			<?php $this->load->view('nav'); ?>	
		</div>		
		<div>
>>>>>>> fa3712116f883e851bc3996ec6ac8af1d588f0f9
			<table>
				<thead>
					<tr>
						<th><?php echo lang('lbl_username'); ?></th>
						<th><?php echo lang('lbl_duration'); ?></th>
						<th><?php echo lang('lbl_date_start'); ?></th>
						<th><?php echo lang('lbl_comment'); ?></th>
						<th><?php echo lang('lbl_billable'); ?></th>
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
						<td><a href="<?php echo site_url('task/edit'), '/', $task['ID_task']; ?>"><?php echo lang('lbl_update'); ?></a></td>
						<td><a href="<?php echo site_url('task/delete'), '/', $task['ID_task']; ?>"><?php echo lang('lbl_delete'); ?></a></td>
					</tr>
<?php endforeach ?>
				</tbody>
			</table>
</div>
