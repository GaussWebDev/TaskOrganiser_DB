<div class="main-content">
<?php 
echo "<pre>";
var_dump($users); 
echo "</pre>";

?>

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
	echo "<th>{$user['username']}</th>";

}

?>
</tbody>
</table>
</div>