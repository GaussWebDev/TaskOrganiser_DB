<html>
	<head>
		<title>Domain List Form</title>
	</head>
	<body>
		<div>
			<?php $this->load->view('nav'); ?>	
		</div>		
		<div>
			<div>
<?php if(isset($dates)) { ?>
				<p>Following domains expire within a week:</p>
				<table><thead><tr><th><?php echo lang('lbl_domain'); ?></th></tr></thead><tbody>
<?php 	foreach ($dates as $date): ?>
						<tr><td><?php echo $date['domain'];  ?></td></tr>
<?php 	endforeach;	} ?>
					</tbody>
				</table>
			</div>
			<table>
				<thead>
					<tr>
						<th><?php echo lang('lbl_username'); ?></th>
						<th><?php echo lang('lbl_domain'); ?></th>
						<th><?php echo lang('lbl_date_time_start'); ?></th>
						<th><?php echo lang('lbl_date_time_expires'); ?></th>
						<th><?php echo lang('lbl_cost'); ?></th>
						<th><?php echo lang('lbl_expired'); ?></th>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
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
		</div>
<?php if(isset($notify) == true): ?>
    	<div>
			<?php echo $notify; ?>
    	</div>
<?php endif; ?>
	</body>
</html>