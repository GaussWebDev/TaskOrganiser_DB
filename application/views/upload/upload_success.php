<html>
<head>
<title>Upload Form</title><!-- FIXME: Use lang()!!! -->
</head>
<body>

<h3>Your file was successfully uploaded!</h3> <!-- FIXME: Use lang()!!! -->

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('upload', 'Upload Another File!'); ?></p> <!-- FIXME: Use lang()!!! -->

</body>
</html>
