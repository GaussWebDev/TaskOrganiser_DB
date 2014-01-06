<script>var menu_id='todo-dropdown';</script>
<div class="main-content">
			<table id="myTable" class="table table-striped table-bordered table-hover datatable tablesorter tablesorter-bootstrap">
				<thead>
					<tr>
						<th><?php echo lang('lbl_comment'); ?></th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($todos as $todo): ?>	
					<tr>
						<td><?php echo $todo['comment'];  ?></td>
						<td><a href="<?php echo site_url('todo/delete'), '/', $todo['ID_todo']; ?>"><?php echo lang('lbl_delete'); ?></a></td>
					</tr>
<?php endforeach ?>
				</tbody>
			</table>
</div>
