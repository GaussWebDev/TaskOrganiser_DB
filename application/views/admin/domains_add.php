<script>var menu_id='domains-dropdown';</script>
<div class="main-content">
	<div class="adddomain">
			<form action="<?php if (isset($domain['ID_domain']) == false) {echo site_url('/domains/add');} else {echo site_url('/domains/edit'), '/', $domain['ID_domain'];} ?>" method="post">
				<div class="form-group"><label><?php echo lang('lbl_date_time_start'); ?>:</label> <input class="form-control" type="datetime" name="date_time_start" placeholder="(yyyy-MM-dd hh:mm:ss)" value="<?php if(isset($domain['date_time_start']) == TRUE) echo $domain['date_time_start'];	?>"></div>
				<div class="form-group"><label><?php echo lang('lbl_date_time_expires'); ?>:</label> <input class="form-control" type="datetime" placeholder="(yyyy-MM-dd hh:mm:ss)" name="date_time_expires" value="<?php if(isset($domain['date_time_expires']) == TRUE) echo $domain['date_time_expires']; ?>"></div>
				<div class="form-group"><label><?php echo lang('lbl_cost'); ?>:</label> <input class="form-control" type="number" name="cost" placeholder="Enter cost" value="<?php if(isset($domain['cost']) == TRUE) echo $domain['cost']; ?>"></div>
				<div class="form-group"><label><?php echo lang('lbl_domain'); ?>:</label> <textarea class="form-control" name="domain" placeholder="Enter domain" style="resize:none;"><?php if(isset($domain['domain']) == TRUE) echo $domain['domain']; ?></textarea></div>
				<div class="form-group"><label><?php echo lang('lbl_expired'); ?><input class="form-control" type="checkbox" name="expired" <?php if(isset($domain['expired']) == TRUE) {if($domain['expired'] == 1) {echo 'checked="checked"';}} ?> /></label></div>
				<!-- dropdown list for users -->
				<div class="form-group"><label><?php echo lang('lbl_username'); ?>:</label> <select name="user" id="user">
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
				<div class="form-group"><input class="btn btn-primary btn-lg usersubmit" type="submit" value="Submit"></div>
			</form>
		</div>
		<!-- notification if the action was successfull -->
<?php if(isset($notify) == true): ?>
    	<div>
			<?php echo $notify; ?>
    	</div>
<?php endif; ?>
</div>
</div>