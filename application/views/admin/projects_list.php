<script>var menu_id='projects-dropdown';</script>
<div class="main-content">
<table id="myTable" class="table table-striped table-bordered table-hover datatable tablesorter tablesorter-bootstrap">
	<thead>
		<tr>
		  <th>Title</th>
		  <th>Finished</th>
		  <th>Date time start</th>
          <th>Edit</th>
          <th>Delete</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($projects as $project): ?>
        <tr>
            <td><?php echo $project['title']; ?></td>
            <td><?php echo ($project['finished'] == 0)? 'NO' : 'YES'; ?></td>
            <td><?php echo $project['date_time_start']; ?></td>
            <td><a href="<?php echo site_url('projects/edit'), '/', $project['ID_project']; ?>">Edit</a></td>
            <td><a href="<?php echo site_url('projects/remove'), '/', $project['ID_project']; ?>">Delete</a></td>
        </tr>
<?php endforeach; ?>
	</tbody>
</table>

</div>





