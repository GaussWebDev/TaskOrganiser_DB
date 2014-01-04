
<div class="main-content">
<table id="myTable" class="table table-striped table-bordered table-hover datatable tablesorter tablesorter-bootstrap">
	<thead>
		<tr>
		  <th>Title</th>
		  <th>Finished</th>
		  <th>Date time start</th>
		</tr>
	</thead>
	<tbody>
	<?php 
	foreach ($projects as $project) 
	{
		echo "<tr>";
		echo "<th>{$project['title']}</th>";
		if($project['finished'] == 0)
		{
			echo "<th>NO</th>";
		}
		else
		{
			echo "<th>YES</th>";
		}
		echo "<th>{$project['date_time_start']}</th>";
		echo "</tr>";
	}

	?>
	</tbody>
</table>

</div>





