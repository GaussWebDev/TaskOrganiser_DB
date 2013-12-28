<?php $this->load->view('nav'); ?>

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
  		$remove_part = str_replace("C:/xammp1/htdocs/TaskOrganiser_DB/","","{$data['url']}");
  		echo '<tr>';
  		echo "<td>{$data['firstname']}&nbsp{$data['lastname']}</td>";
  		echo "<td>{$data['date_time_upload']}</td>";
  		echo "<td>{$data['comment']}</td>";
  		echo "<td><a href=". base_url("$remove_part") . ">Download</a></td>";
  		echo '</tr>';
  	} 
  	?>


</table>


