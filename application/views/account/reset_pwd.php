<form action="<?php echo site_url('/account/reset'); ?>" method="post">
    <input type="text" name="email">
    <input type="submit">
<?php if(isset($notify) == true): ?>
    <div>
        <?php echo $notify; ?>
    </div>
<?php endif; ?>
</form>
