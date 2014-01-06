<script>var menu_id='projects-dropdown';</script>
<div class="main-content">

<?php if (isset($confirm) == true): ?>
    <form action="<?php echo site_url('projects/remove'), '/', $id; ?>" method="post">
        <p>Delete project?</p>
        <input type="hidden" name="confirm" value="<?php echo $confirm; ?>">
        <input type="submit">
    </form>
<?php endif; ?>
<?php if (isset($notify) == true): ?>
    <p><?php echo $notify; ?></p>
<?php endif; ?>
</div>