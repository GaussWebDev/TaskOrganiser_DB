<script>var menu_id='projects-dropdown';</script>
<div class="main-content">
<?php if (isset($confirm) == true): ?>
    <form action="<?php echo site_url('discussion/unpublish'), '/', $id; ?>" method="post">
        <p>Delete post?</p>
        <input type="hidden" name="confirm" value="<?php echo $confirm; ?>">
         <div class="form-group"> <input class="btn btn-primary btn-lg usersubmit" type="submit" value="Delete"></div>
    </form>
<?php endif; ?>
<?php if (isset($notify) == true): ?>
    <p><?php echo $notify; ?></p>
<?php endif; ?>
</div>