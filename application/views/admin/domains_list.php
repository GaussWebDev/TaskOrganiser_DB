<script>var menu_id='domains-dropdown';</script>
<div class="main-content">
<?php if(isset($dates)) { ?>
				<p>Following domains expire within a week:</p>
				<table id="myTable" class="table table-striped table-bordered table-hover datatable tablesorter tablesorter-bootstrap"><thead><tr><th><?php echo lang('lbl_domain'); ?></th></tr></thead><tbody>
<?php 	foreach ($dates as $date): ?>
						<tr><td><?php echo $date['domain'];  ?></td></tr>
<?php 	endforeach;	} ?>
					</tbody>
				</table>
			<table id="myTable" class="table table-striped table-bordered table-hover datatable tablesorter tablesorter-bootstrap">
				<thead>
					<tr>
						<th><?php echo lang('lbl_username'); ?></th>
						<th><?php echo lang('lbl_domain'); ?></th>
						<th><?php echo lang('lbl_date_time_start'); ?></th>
						<th><?php echo lang('lbl_date_time_expires'); ?></th>
						<th><?php echo lang('lbl_cost'); ?></th>
						<th><?php echo lang('lbl_expired'); ?></th>
						<th>Edit</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
<?php foreach ($domains as $domain): ?>	
					<tr>
						<td><?php echo $domain['username'];  ?></td>
						<td><?php echo $domain['domain'];  ?></td>
						<td><?php echo $domain['date_time_start']; ?></td>
						<td><?php echo $domain['date_time_expires']; ?></td>
						<td><?php echo $domain['cost']; ?></td>						
						<td><input type="checkbox" name="" value="" disabled="disabled" <?php if($domain['expired'] == 1) {?>checked="checked"<?php }?>/></td>
						<td><a href="<?php echo site_url('domains/edit'), '/', $domain['ID_domain']; ?>"><?php echo lang('lbl_update'); ?></a></td>
						<td><a href="<?php echo site_url('domains/delete'), '/', $domain['ID_domain']; ?>"><?php echo lang('lbl_delete'); ?></a></td>
					</tr>
<?php endforeach; ?>
				</tbody>
			</table>
<?php if(isset($notify) == true): ?>
    	<div>
			<?php echo $notify; ?>
    	</div>
<?php endif; ?>

</div>