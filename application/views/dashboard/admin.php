<script>var menu_id='dashboard';</script>
<div class="main-content">
<div class="hero-unit">
<h1 style="margin-top:-20px;">Welcome to TaskOrganiser!</h1>
<h3>This is the administrator panel.</h3> 
<br><br> <h1>
<?php 
echo ucfirst($this->User_model->getFirstName());
echo " ";
echo ucfirst($this->User_model->getLastName());
?></h1>
</div>
</div>
