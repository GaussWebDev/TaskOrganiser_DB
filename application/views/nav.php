<?php if ($this->User_model->getPermissions() == 100) $this->load->view('admin_nav'); ?>

<ul id="developer_menu">
<?php if ($this->User_model->getActiveProject() != false): ?>
    <li><a href="<?php echo site_url('discussions'); ?>">Discussions</a></li>
    <li>Tasks</li>
    <ul>
        <li><a href="<?php echo site_url('tasks/add'); ?>">Add</a></li>
        <li><a href="<?php echo site_url('tasks'); ?>">List</a></li>
    </ul>
    <li><a href="<?php echo site_url('upload'); ?>">Upload file</a></li>
    
    <li>- - - - - -</li>
<?php endif; ?>
    <li><a href="<?php echo site_url('dashboard'); ?>">Dashboard</a></li>
    <li>TODO</li>
    <ul>
        <li><a href="<?php echo site_url('todo/add'); ?>">Add</a></li>
        <li><a href="<?php echo site_url('todo'); ?>">List</a></li>
    </ul>
<?php $projects = $this->Project_model->listUserProjects(); ?>
    <li>Projects</li>
    <ul>
<?php foreach ($projects as $project): ?>
        <li><a href="<?php echo site_url('dashboard/project'), '/', $project['ID_project']; ?>"><?php echo $project['title']; ?></a></li>
<?php endforeach; ?>
    </ul>
    <li>Language select</li>
    <li><a href="<?php echo site_url('account/logout'); ?>">Sign out</a></li>
</ul>
