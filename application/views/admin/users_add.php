<?php include 'nav.php' ?>

<form action="<?php echo site_url('users/add'); ?>" method="post">
    <p>Username: <input type="text" name="username" value=""></p>
    <p>First name: <input type="text" name="firstname" value=""></p>
    <p>Last name: <input type="text" name="lastname" value=""></p>
    <p>Address: <input type="text" name="address" value=""></p>
    <p>Mobile: <input type="text" name="mobile" value=""></p>
    <p>Email: <input type="text" name="email" value=""></p>
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
