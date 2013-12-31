<?php $this->load->view('nav'); ?>

<?php var_dump($threads); ?>

<form action="<?php echo site_url('discussion/add'); ?>" method="post">
    <input type="text" name="title">
    <input type="submit">
</form>
