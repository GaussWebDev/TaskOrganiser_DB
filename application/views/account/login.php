<form action="<?php echo site_url('/account'); ?>" method="post">
    <input type="text" name="username">
    <input type="password" name="password">
    <input type="submit">
<?php if(isset($notify) == true): ?>
    <div>
        <?php echo $notify; ?>
    </div>
<?php endif; ?>
</form>
