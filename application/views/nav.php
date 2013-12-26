<?php if ($this->User_model->getPermissions() == 100) $this->load->view('admin_nav'); ?>

<ul id="developer_menu">
    <li><strong>This should be submenu for each project!</strong></li>
    <li><a href="<?php echo site_url('discussions'); ?>">Discussions</a></li>
    <li>Tasks</li>
    <ul>
        <li><a href="<?php echo site_url('task/add'); ?>">Add</a></li>
        <li><a href="<?php echo site_url('task/all'); ?>">List</a></li>
    </ul>
    <li><a href="<?php echo site_url('upload'); ?>">Upload file</a></li>
</ul>

<ul id="default_menu">
    <li><strong>Visible by everyone</strong></li>
    <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
    <li>TODO</li>
    <ul>
        <li><a href="<?php echo site_url('todo/add'); ?>">Add</a></li>
        <li><a href="<?php echo site_url('todo'); ?>">List</a></li>
    </ul>
    <li>Language select</li>
</ul>
