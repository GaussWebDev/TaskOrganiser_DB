<?php var_dump($posts); ?>

<!-- delete post link: discussion/unpublish/:post_id: -->

<form action="<?php echo site_url('discussion/post'); ?>" method="post">
    <input type="text" name="message">
    <input type="hidden" name="thread" value="<?php echo $thread; ?>">
    <input type="submit">
</form>
