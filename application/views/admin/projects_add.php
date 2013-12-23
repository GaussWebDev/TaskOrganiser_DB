<?php include 'nav.php' ?>

<form action="<?php site_url('/projects/add'); ?>" method="post">
    <h2>Project info</h2><!-- FIXME: Use lang()!!! -->
    <p>Title: <input type="text" name="title"></p><!-- FIXME: Use lang()!!! -->
    <p>Finished: <input type="checkbox" value="1" name="finished"></p><!-- FIXME: Use lang()!!! -->
    <p>Start: <input type="date" name="started"></p><!-- FIXME: Use lang()!!! -->
    <h2>Clients</h2><!-- FIXME: Use lang()!!! -->
    <ul>
<?php
    $i=0; foreach ($users as $user): if($user['role'] != 'Client') continue;?>
        <li>
            <input type="checkbox" name="client<?php echo $i++; ?>" value="<?php echo $user['ID_user']; ?>">
            <?php echo $user['firstname'], ' ', $user['lastname']; ?>
        </li>
<?php endforeach; ?>
        <input type="hidden" name="max_client" value="<?php echo $i; ?>">
    </ul>
    
    <h2>Developers</h2><!-- FIXME: Use lang()!!! -->
    <ul>
<?php $i=0; foreach ($users as $user): if($user['role'] != 'Developer') continue; ?>
        <li>
            <input type="checkbox" name="developer<?php echo $i++; ?>" value="<?php echo $user['ID_user']; ?>">
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
