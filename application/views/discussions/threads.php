<?php $this->load->view('nav'); ?>

<?php var_dump($threads); ?>

<!-- delete thread link: discussion/delete/:thread_id: -->
<form action="<?php echo site_url('discussion/add'); ?>" method="post">
    <input type="text" name="title">
    <input type="submit">
</form>
