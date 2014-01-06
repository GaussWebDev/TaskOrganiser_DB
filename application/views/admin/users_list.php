<script>var menu_id='users-dropdown';</script>
<div class="main-content">
	<table id="myTable" class="table table-striped table-bordered table-hover datatable tablesorter tablesorter-bootstrap">
		<thead>
			<tr>
				<th>Username</th>
				<th>Firstname</th>
				<th>Lastname</th>
				<th>Address</th>
				<th>Mobile</th>
				<th>Email</th>
				<th>Role</th>
                <th>Edit</th>
			</tr>
		</thead>
		<tbody>
<?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['firstname']; ?></td>
                <td><?php echo $user['lastname']; ?></td>
                <td><?php echo $user['address']; ?></td>
                <td><?php echo $user['mobile']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['role']; ?></td>
                <td><a href="<?php echo site_url('users/edit'), '/', $user['ID_user']; ?>">Edit</a></td>
            </tr>
<?php endforeach; ?>
		</tbody>
	</table>
</div>
