<div class="main-content">

    <div class="add-form">


            <?php if (isset($user['ID_user']) == false): ?>
            <form action="<?php echo site_url('users/add'); ?>" method="post">
            <?php else: ?>
            <form action="<?php echo site_url('users/edit'), '/', $user['ID_user']; ?>" method="post">
            <?php endif; ?>
                <div class="form-group">
                        <label>Username:</label> <input placeholder="Username" class="form-control" type="text" name="username" value="<?php if (isset($user['username']) == true) echo $user['username']; ?>"></div>
                        <div class="form-group"><label>First name:</label> <input placeholder="First name" class="form-control" type="text" name="firstname" value="<?php if (isset($user['firstname']) == true) echo $user['firstname']; ?>"></div>
                        <div class="form-group"><label>Last name:</label> <input placeholder="Last name" class="form-control" type="text" name="lastname" value="<?php if (isset($user['lastname']) == true) echo $user['lastname']; ?>"></div>
                        <div class="form-group"><label>Address:</label> <input placeholder="Address" class="form-control" type="text" name="address" value="<?php if (isset($user['address']) == true) echo $user['address']; ?>"></div>
                        <div class="form-group"><label>Mobile:</label> <input placeholder="Mobile phone number" class="form-control" type="text" name="mobile" value="<?php if (isset($user['mobile']) == true) echo $user['mobile']; ?>"></div>
                        <div class="form-group"><label>Email:</label> <input placeholder="E-mail" class="form-control" type="text" name="email" value="<?php if (isset($user['email']) == true) echo $user['email']; ?>"></div>
                    <?php if (isset($user['ID_user']) == true): ?>
                        <div class="form-group"><label>Active:</label> <input class="form-control" type="checkbox-inline" name="active" value="1" <?php if ($user['active']==1) echo 'checked="checked"'; ?>></div>
                    <?php endif; ?>
                        <div class="form-group"><label>
                            Role:</label>
                            <select name="role" id="">
                    <?php foreach ($roles as $role): ?>
                                <option value="<?php echo $role['ID_role']; ?>"><?php echo $role['role']; ?></option>
                    <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group"><input class="btn btn-primary btn-lg usersubmit" type="submit" value="Submit"></div>
                    </form>
                </div>
    </div>        
</div>





<?php if(isset($notify) == true): ?>
    <div>
        <?php echo $notify; ?>
    </div>
<?php endif; ?>
</div>
