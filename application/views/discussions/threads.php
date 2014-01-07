<div class="main-content">

<table id="myTable" class="table table-striped table-bordered table-hover datatable tablesorter tablesorter-bootstrap">
	<thead>
		<tr>
			<th>Title</th>
			<th>Date and Time</th>
			<th>Delete</th>
		</tr>
	</thead>
	<tbody>
<?php foreach ($threads as $thread): ?>
        <tr>
            <td><a href="<?php echo site_url("discussion/thread/$thread[ID_thread]"); ?>"><?php echo $thread['title']; ?></td>
            <td><?php echo $thread['date_time_start']; ?></td>
            <td><a href="<?php echo site_url("discussion/delete/$thread[ID_thread]"); ?>">Delete</a></td>
        </tr>
<?php endforeach; ?>
	</tbody>
</table>
<!-- delete thread link: discussion/delete/:thread_id: -->
<form action="<?php echo site_url('discussion/add'); ?>" method="post">
     <div class="form-group"><label for="title">Theme Title</label><input  id="title" class="form-control" type="text" name="title"></div>
    <div class="form-group"><input class="btn btn-primary btn-lg usersubmit" type="submit"></div>
</form>
</div>