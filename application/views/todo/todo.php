<div class="main-content">
			<table>
				<thead>
					<tr>
						<th><?php echo lang('lbl_comment'); ?></th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				</thead>
				<tbody>
<?php foreach ($todos as $todo): ?>	
					<tr>
						<td><?php echo $todo['comment'];  ?></td>
						<td><a href="<?php echo site_url('todo/delete'), '/', $todo['ID_todo']; ?>"><?php echo lang('lbl_delete'); ?></a></td>
					</tr>
<?php endforeach ?>
</div>