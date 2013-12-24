<?php $this->load->view('nav'); ?>

<?php if (isset($user['ID_user']) == false): ?>
<form action="<?php echo site_url('users/add'); ?>" method="post">
<?php else: ?>
<form action="<?php echo site_url('users/edit'), '/', $user['ID_user']; ?>" method="post">
<?php endif; ?>
    <p>Username: <input type="text" name="username" value="<?php if (isset($user['username']) == true) echo $user['username']; ?>"></p>
    <p>First name: <input type="text" name="firstname" value="<?php if (isset($user['firstname']) == true) echo $user['firstname']; ?>"></p>
    <p>Last name: <input type="text" name="lastname" value="<?php if (isset($user['lastname']) == true) echo $user['lastname']; ?>"></p>
    <p>Address: <input type="text" name="address" value="<?php if (isset($user['address']) == true) echo $user['address']; ?>"></p>
    <p>Mobile: <input type="text" name="mobile" value="<?php if (isset($user['mobile']) == true) echo $user['mobile']; ?>"></p>
    <p>Email: <input type="text" name="email" value="<?php if (isset($user['email']) == true) echo $user['email']; ?>"></p>
<?php if (isset($user['ID_user']) == true): ?>
    <p>Active: <input type="checkbox" name="active" value="1" <?php if ($user['active']==1) echo 'checked="checked"'; ?>></p>
<?php endif; ?>
    <p>
        Role:
        <select name="role" id="">
<?php foreach ($roles as $role): ?>
            <option value="<?php echo $role['ID_role']; ?>"><?php echo $role['role']; ?></option>
<?php endforeach; ?>
        </select>
    </p>
    <p><input type="submit"></p>
</form>
<?php if(isset($notify) == true): ?>
    <div>
        <?php echo $notify; ?>
    </div>
<?php endif; ?>
