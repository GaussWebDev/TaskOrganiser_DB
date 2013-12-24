<?php include 'nav.php' ?>

<?php if (isset($info['ID_project']) == false): ?>
<form action="<?php echo site_url('/projects/add'); ?>" method="post">
<?php else: ?>
<form action="<?php echo site_url('/projects/edit'), '/', $info['ID_project']; ?>" method="post">
<?php endif; ?>
    <h2>Project info</h2><!-- FIXME: Use lang()!!! -->
    <p>Title: <input type="text" name="title" value="<?php if (isset($info['title']) == true) echo $info['title']; ?>"></p><!-- FIXME: Use lang()!!! -->
    <p>Finished: <input type="checkbox" value="1" name="finished"<?php if (isset($info['finished']) == true && $info['finished'] == 1) echo ' checked="checked"'; ?>></p><!-- FIXME: Use lang()!!! -->
    <p>Start: <input type="text" name="started" value="<?php if (isset($info['date_time_start']) == true) echo $info['date_time_start']; ?>"></p><!-- FIXME: Use lang()!!! -->
    <h2>Clients</h2><!-- FIXME: Use lang()!!! -->
    <ul>
<?php
    $i=0; foreach ($users as $user): if($user['role'] != 'Client') continue;?>
        <li>
<?php $checked = (isset($assignees) == true && in_array($user['ID_user'], $assignees) ? 'checked="checked"' : '' ); ?>
            <input type="checkbox" name="client<?php echo $i++; ?>" value="<?php echo $user['ID_user']; ?>" <?php echo $checked; ?>>
            <?php echo $user['firstname'], ' ', $user['lastname']; ?>
        </li>
<?php endforeach; ?>
        <input type="hidden" name="max_client" value="<?php echo $i; ?>">
    </ul>
    
    <h2>Developers</h2><!-- FIXME: Use lang()!!! -->
    <ul>
<?php $i=0; foreach ($users as $user): if($user['role'] != 'Developer') continue; ?>
        <li>
<?php $checked = (isset($assignees) == true && in_array($user['ID_user'], $assignees) ? 'checked="checked"' : '' ); ?>
            <input type="checkbox" name="developer<?php echo $i++; ?>" value="<?php echo $user['ID_user']; ?>" <?php echo $checked; ?>>
            <?php echo $user['firstname'], ' ', $user['lastname']; ?>
        </li>
<?php endforeach; ?>
    <input type="hidden" name="max_developer" value="<?php echo $i; ?>">
    </ul>
    <input type="submit">
</form>
<?php if(isset($notify) == true): ?>
    <div>
        <?php echo $notify; ?>
    </div>
<?php endif; ?>
