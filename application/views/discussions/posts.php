<div class="main-content">

<?php foreach($posts as $post): ?>

<div class="alert alert-info alert-dismissable">
	<h2><?php echo $post["title"]; ?></h2>
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true"><a href="<?php echo site_url("discussion/unpublish/{$post['ID_post']}");?>">×</a></button>
    <i class="icon-exclamation-sign"></i><?php echo $post["date_time_post"]; ?> <strong><?php echo $post["firstname"] ." ".$post["lastname"];  ?></strong> <br><br>
    <?php echo $post["text"]; ?>
</div>

<?php endforeach; ?>
<!-- delete post link: discussion/unpublish/:post_id: -->

<form action="<?php echo site_url('discussion/post'); ?>" method="post">
    <div class="form-group"><label for="post">Message</label><input id="post" class="form-control" type="text" name="message"></div>
    <input type="hidden" name="thread" value="<?php echo $thread; ?>">
    <div class="form-group"><input  class="btn btn-primary btn-lg usersubmit" type="submit"></div>
</form>
</div>