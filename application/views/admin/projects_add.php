<script>var menu_id='projects-dropdown';</script>
<div class="main-content">

<div class="add-project">


<?php if (isset($info['ID_project']) == false): ?>
<form action="<?php echo site_url('/projects/add'); ?>" method="post">
<?php else: ?>
<form action="<?php echo site_url('/projects/edit'), '/', $info['ID_project']; ?>" method="post">
<?php endif; ?>
<div class="addprojectform">

    <h3>Project info</h3><!-- FIXME: Use lang()!!! -->
    <div class="form-group"><label>Title:</label> <input class="form-control" type="text" name="title" value="<?php if (isset($info['title']) == true) echo $info['title']; ?>"></div><!-- FIXME: Use lang()!!! -->
    <div class="form-group"><label>Finished: <input class="form-control" type="checkbox" value="1" name="finished"<?php if (isset($info['finished']) == true && $info['finished'] == 1) echo ' checked="checked"'; ?>></label></div><!-- FIXME: Use lang()!!! -->
    <div class="form-group"><label>Start:</label> <input class="form-control" id="datetimepicker" type="text" name="started" value="<?php if (isset($info['date_time_start']) == true) echo date2user($info['date_time_start']); ?>"></div><!-- FIXME: Use lang()!!! -->

    <h3>Clients</h3><!-- FIXME: Use lang()!!! -->

        <?php $i=0; foreach ($users as $user): if($user['role'] != 'Client') continue;?>
        
        <table id="myTable" class="table table-striped table-bordered table-hover datatable tablesorter tablesorter-bootstrap">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
            <tr>
                <?php $checked = (isset($assignees) == true && in_array($user['ID_user'], $assignees) ? 'checked="checked"' : '' ); ?> 
                <td><?php echo $user['firstname'];  ?></td>
                <td><?php echo $user['lastname'];  ?></td>
                <td><input type="checkbox" name="developer<?php echo $i++; ?>" value="<?php echo $user['ID_user']; ?>" <?php echo $checked; ?>></td>
            </tr>
    <?php endforeach; ?>
  <div class="form-group"> <input class="form-control" type="hidden" name="max_client" value="<?php echo $i; ?>"></div></li>

    
    <h3>Developers</h3><!-- FIXME: Use lang()!!! -->

<?php $i=0; foreach ($users as $user): if($user['role'] != 'Developer') continue; ?>
    
    <table id="myTable" class="table table-striped table-bordered table-hover datatable tablesorter tablesorter-bootstrap">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
        <tr>
            <?php $checked = (isset($assignees) == true && in_array($user['ID_user'], $assignees) ? 'checked="checked"' : '' ); ?> 
            <td><?php echo $user['firstname'];  ?></td>
            <td><?php echo $user['lastname'];  ?></td>
            <td><input type="checkbox" name="developer<?php echo $i++; ?>" value="<?php echo $user['ID_user']; ?>" <?php echo $checked; ?>></td>
        </tr>
<?php endforeach; ?>
        </tbody>
    </table>
    <br>
    <input type="hidden" name="max_developer" value="<?php echo $i; ?>">
    <input class="btn btn-primary btn-lg projectsubmit" type ="submit" value="Submit">
</form>
</div>
<?php if(isset($notify) == true): ?>
    <div>
        <?php echo $notify; ?>
    </div>
<?php endif; ?>
</div>
</div>
