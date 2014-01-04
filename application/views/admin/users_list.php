<div class="main-content">
<table id="myTable" class="table table-striped table-bordered table-hover datatable tablesorter">
	<thead>
		<tr>
		  <th>Username</th>
		  <th>Firstname</th>
		  <th>Lastname</th>
		  <th>Address</th>
		  <th>Mobile</th>
		  <th>Email</th>
		  <th>Role</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	foreach ($users as $user) 
	{
		echo "<tr>";
		echo "<th>{$user['username']}</th>";
		echo "<th>{$user['firstname']}</th>";
		echo "<th>{$user['lastname']}</th>";
		echo "<th>{$user['address']}</th>";
		echo "<th>{$user['mobile']}</th>";
		echo "<th>{$user['email']}</th>";
		echo "<th>{$user['role']}</th>";
		echo "</tr>";
	}

	?>
	</tbody>
</table>
<div id="pager" class="pager">
	<form>
		<img src="<?php echo base_url(); ?>assets/tablesorter/first.png" class="first"/>
		<img src="<?php echo base_url(); ?>assets/tablesorter/prev.png" class="prev"/>
		<input type="text" class="pagedisplay"/>
		<img src="<?php echo base_url(); ?>assets/tablesorter/next.png" class="next"/>
		<img src="<?php echo base_url(); ?>assets/tablesorter/last.png" class="last"/>
		<select class="pagesize">
			<option selected="selected"  value="10">10</option>
			<option value="20">20</option>
			<option value="30">30</option>
			<option  value="40">40</option>
		</select>
	</form>
</div>

</div>


