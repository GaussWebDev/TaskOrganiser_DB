<!-- This is responsive menu!-->
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </button>
</div>
<!-- This is left menu! -->
<div class="side-bar-wrapper collapse navbar-collapse navbar-ex1-collapse">
  <a href="<?php echo site_url('dashboard'); ?>" class="logo hidden-sm hidden-xs">
    <i class="icon-group"></i>
    <span><?php echo $name; ?></span>
  </a>
  <div class="search-box">
    <input type="text" placeholder="SEARCH" class="form-control">
  </div>
  <ul class="side-menu">
    <li>
      <a href="<?php echo site_url('dashboard'); ?>">
        <i class="icon-cogs"></i> Dashboard
      </a>
    </li>
  </ul>
  <div class="relative-w">
    <ul class="side-menu">

    <?php 
    if ($this->User_model->getPermissions() == 100) 
    { 
    ?>
      <li>
        <a href="charts.html" class="is-dropdown-menu">
          <span class="badge pull-right"></span>
          <i class="icon-user"></i> Users
        </a>
        <ul>
          <li>
            <a href="<?php echo site_url('users/all'); ?>">
              <i class=" icon-list"></i>
              List all users
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('users/add'); ?>">
              <i class="icon-bullseye"></i>
              Add new user
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="charts.html" class="is-dropdown-menu">
          <span class="badge pull-right"></span>
          <i class=" icon-briefcase"></i> Projects
        </a>
        <ul>
          <li>
            <a href="<?php echo site_url('projects/all'); ?>">
              <i class="icon-list-ol"></i>
              List projects
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('projects/add'); ?>">
              <i class="icon-bullseye"></i>
              Add project
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="charts.html" class="is-dropdown-menu">
          <span class="badge pull-right"></span>
          <i class="icon-plus-sign"></i> Domains
        </a>
        <ul>
          <li>
            <a href="<?php echo site_url('domains/all'); ?>">
              <i class=" icon-unlock"></i>
              List domains
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('domains/add'); ?>">
              <i class="icon-bullseye"></i>
              Add new domain
            </a>
          </li>
        </ul>
      </li>
      <?php } ?>
       <li>
        <a href="charts.html" class="is-dropdown-menu">
          <span class="badge pull-right"></span>
          <i class="icon-check"></i> TODO
        </a>
        <ul>
          <li>
            <a href="<?php echo site_url('todo/add'); ?>">
              <i class="icon-check-empty"></i>
              Add
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('todo'); ?>">
              <i class=" icon-calendar-empty"></i>
              List
            </a>
          </li>
        </ul>
      </li>

      <li>
        <a href="charts.html" class="is-dropdown-menu">
          <span class="badge pull-right"></span>
          <?php $projects = $this->Project_model->listUserProjects(); ?>
          <i class="icon-briefcase"></i> Projects
        </a>
        <ul>
          <?php foreach ($projects as $project): ?>
          <li>
            <a href="<?php echo site_url('dashboard/project'), '/', $project['ID_project']; ?>">
              <i class="icon-puzzle-piece"></i><?php echo $project['title']; ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </li>

      <?php if ($this->User_model->getActiveProject() != false): ?>
       <li>
        <a href="<?php echo site_url('discussions'); ?>" class="is-dropdown-menu">
          <span class="badge pull-right"></span>
          <i class="icon-comments"></i> Discussions
        </a>
      </li>
      <li>
        <a href="charts.html" class="is-dropdown-menu">
          <span class="badge pull-right"></span>
          <i class="icon-edit"></i> Tasks
        </a>
        <ul>
          <li>
            <a href="<?php echo site_url('task/add'); ?>">
              <i class="icon-bullseye"></i>
              Add
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('task/all'); ?>">
              <i class="icon-sort-by-attributes-alt"></i>
              List
            </a>
          </li>
        </ul>
      </li>
      <li>
        <a href="charts.html" class="is-dropdown-menu">
          <span class="badge pull-right"></span>
          <i class="icon-cloud-upload"></i> Upload file
        </a>
        <ul>
          <li>
            <a href="<?php echo site_url('upload'); ?>">
              <i class="icon-upload-alt"></i>
              New upload
            </a>
          </li>
          <li>
            <a href="<?php echo site_url('task/all'); ?>">
              <i class="icon-cloud"></i>
              List
            </a>
          </li>
        </ul>
      </li>
    <?php endif; ?>
    </ul>
    </ul>
  </div>
</div>
    </div>
<!-- End of left menu! -->



<!-- This is dashboard header and menu -->
<div class="col-md-9">
  <div class="content-wrapper ">
    <div class="content-inner">
      <div class="page-header">
      <div class="header-links hidden-xs">
      <a href="<?php echo site_url('account/logout'); ?>"><i class="icon-signout"></i> Logout</a>
    </div>
  <h1><i class="icon-bar-chart"></i> Dashboard</h1>
</div>
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Bread</a></li>
  <li><a href="#">Crumbs</a></li>
  <li class="active">Example</li>
</ol>
<!-- End of dashboard header -->