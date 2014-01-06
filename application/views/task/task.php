<script>var menu_id='tasks-dropdown';</script>
<div class="main-content">

			<table id="myTable" class="table table-striped table-bordered table-hover datatable tablesorter tablesorter-bootstrap">
				<thead>
					<tr>
						<th><?php echo lang('lbl_username'); ?></th>
						<th><?php echo lang('lbl_duration'); ?></th>
						<th><?php echo lang('lbl_date_start'); ?></th>
						<th><?php echo lang('lbl_comment'); ?></th>
						<th><?php echo lang('lbl_billable'); ?></th>
						<th>Edit</th>
						<th>Delete</th>
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
