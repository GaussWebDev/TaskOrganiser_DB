<?php $this->load->view('nav'); ?>

<?php var_dump($posts); ?>

<form action="<?php echo site_url('discussion/post'); ?>" method="post">
    <input type="text" name="message">
    <input type="hidden" name="thread" value="<?php echo $thread; ?>">
    <input type="submit">
</form>
