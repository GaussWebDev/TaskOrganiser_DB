<div class="main-content">

<table border="1">
	<tr>
		<th>Name</th>
		<th>Time</th>
		<th>Comment</th>
		<th>Download</th>

  	</tr>
	
  	<?php 
  	foreach($upload_data as $data)
  	{
  		$name = str_replace("C:/xammp1/htdocs/TaskOrganiser_DB/uploads/","","{$data['url']}");
  		echo '<tr>';
  		echo "<td>{$data['firstname']}&nbsp{$data['lastname']}</td>";
  		echo "<td>{$data['date_time_upload']}</td>";
  		echo "<td>{$data['comment']}</td>";
  		echo "<td><a href=". base_url("upload/download_item/{$name}") . ">Download</a></td>";
      if($permission == 100)
      {
        echo "<td><a href=". base_url("upload/delete_item/{$data['ID_file']}") . ">Delete</a></td>";
      }
  		echo '</tr>';
  	} 
  	?>

</table>

</div>
