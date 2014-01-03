<?php if (isset($confirm) == true): ?>
    <form action="<?php echo site_url('discussion/delete'), '/', $id; ?>" method="post">
        <p>Delete thread?</p>
        <input type="hidden" name="confirm" value="<?php echo $confirm; ?>">
        <input type="submit">
    </form>
<?php endif; ?>
<?php if (isset($notify) == true): ?>
    <p><?php echo $notify; ?></p>
<?php endif; ?>
