<div class="main-content">
			<form action="<?php if (isset($domain['ID_domain']) == false) {echo site_url('/domains/add');} else {echo site_url('/domains/edit'), '/', $domain['ID_domain'];} ?>" method="post">
				<p><?php echo lang('lbl_date_time_start'); ?> (yyyy-MM-dd hh:mm:ss): <input type="datetime" name="date_time_start" value="<?php if(isset($domain['date_time_start']) == TRUE) echo $domain['date_time_start'];	?>"></p>
				<p><?php echo lang('lbl_date_time_expires'); ?> (yyyy-MM-dd hh:mm:ss): <input type="datetime" name="date_time_expires" value="<?php if(isset($domain['date_time_expires']) == TRUE) echo $domain['date_time_expires']; ?>"></p>
				<p><?php echo lang('lbl_cost'); ?>: <input type="number" name="cost" value="<?php if(isset($domain['cost']) == TRUE) echo $domain['cost']; ?>"></p>
				<p><?php echo lang('lbl_domain'); ?>: <textarea name="domain"><?php if(isset($domain['domain']) == TRUE) echo $domain['domain']; ?></textarea></p>
				<p><?php echo lang('lbl_expired'); ?><input type="checkbox" name="expired" <?php if(isset($domain['expired']) == TRUE) {if($domain['expired'] == 1) {echo 'checked="checked"';}} ?> /></p>
				<!-- dropdown list for users -->
				<p><?php echo lang('lbl_username'); ?>: <select name="user" id="user">
<?php foreach ($users as $user): ?>
					<!--each option has the following syntax:
							<option value="number">name</option>
						selected option has the following syntax:
							<option value="number" selected="selected"></option>
						1st php script: <?php echo $polaznik['ID_user']?> 
							is located under value="" tag. We get the id value for that option
						2nd php script: <?php if($polaznik['ID_user'] == $user['ID_user_fk']) {echo "selected=\"selected\"";} ?> 
							checks to see if it is the option that was originally selected is the one in the current itteration
						3rd php script: <?php $user['username'].', '.$user['firstname'].' '.$user['lastname']; ?> 
							is located between "> </option>" tags. We get the name of the current korisink -->
					<option value="<?php echo $user['ID_user']?>" <?php if($user['ID_user'] == $domain['ID_user_fk']) {echo "selected=\"selected\"";} ?>><?php echo $user['username'].', '.$user['firstname'].' '.$user['lastname']; ?></option>
<?php endforeach; ?> 	
				</select></p>
				<!-- end of dropdown list for users -->
				<p><input type="submit"></p>
			</form>
		</div>
		<!-- notification if the action was successfull -->
<?php if(isset($notify) == true): ?>
    	<div>
			<?php echo $notify; ?>
    	</div>
<?php endif; ?>
</div>