<div class="main-content">
	<div class="padded">
		<table class="table table-striped table-bordered table-hover datatable">
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
	</div>
</div>