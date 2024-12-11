<?php
if(!isset($member)) {
  redirect_to(url_for('/members/index.php'));
}
?>

<div class="form-group <?php echo isset($member->errors['first_name']) ? 'has-error' : ''; ?>">
    <label for="first-name">First Name</label>
    <div class="input-container">
        <input type="text" id="first-name" name="member[first_name]" value="<?php echo h($member->first_name); ?>">
        <?php if(isset($member->errors['first_name'])) { ?>
            <span class="field-error"><?php echo h($member->errors['first_name']); ?></span>
        <?php } ?>
    </div>
</div>

<div class="form-group <?php echo isset($member->errors['last_name']) ? 'has-error' : ''; ?>">
    <label for="last-name">Last Name</label>
    <div class="input-container">
        <input type="text" id="last-name" name="member[last_name]" value="<?php echo h($member->last_name); ?>">
        <?php if(isset($member->errors['last_name'])) { ?>
            <span class="field-error"><?php echo h($member->errors['last_name']); ?></span>
        <?php } ?>
    </div>
</div>

<div class="form-group <?php echo isset($member->errors['email']) ? 'has-error' : ''; ?>">
    <label for="email">Email</label>
    <div class="input-container">
        <input type="email" id="email" name="member[email]" value="<?php echo h($member->email); ?>">
        <?php if(isset($member->errors['email'])) { ?>
            <span class="field-error"><?php echo h($member->errors['email']); ?></span>
        <?php } ?>
    </div>
</div>

<div class="form-group <?php echo isset($member->errors['username']) ? 'has-error' : ''; ?>">
    <label for="username">Username</label>
    <div class="input-container">
        <input type="text" id="username" name="member[username]" value="<?php echo h($member->username); ?>">
        <?php if(isset($member->errors['username'])) { ?>
            <span class="field-error"><?php echo h($member->errors['username']); ?></span>
        <?php } ?>
    </div>
</div>

<div class="form-group <?php echo isset($member->errors['user_level']) ? 'has-error' : ''; ?>">
    <label for="user-level">User Level</label>
    <div class="input-container">
        <select id="user-level" name="member[user_level]">
            <option value="m" <?php if($member->user_level == 'm') { echo 'selected'; } ?>>Member</option>
            <option value="a" <?php if($member->user_level == 'a') { echo 'selected'; } ?>>Admin</option>
        </select>
        <?php if(isset($member->errors['user_level'])) { ?>
            <span class="field-error"><?php echo h($member->errors['user_level']); ?></span>
        <?php } ?>
    </div>
</div>

<?php if($member->is_new()) { ?>
    <div class="form-group <?php echo isset($member->errors['password']) ? 'has-error' : ''; ?>">
        <label for="password">Password</label>
        <div class="input-container">
            <input type="password" id="password" name="member[password]" value="">
            <?php if(isset($member->errors['password'])) { ?>
                <span class="field-error"><?php echo h($member->errors['password']); ?></span>
            <?php } ?>
        </div>
    </div>

    <div class="form-group <?php echo isset($member->errors['confirm_password']) ? 'has-error' : ''; ?>">
        <label for="confirm-password">Confirm Password</label>
        <div class="input-container">
            <input type="password" id="confirm-password" name="member[confirm_password]" value="">
            <?php if(isset($member->errors['confirm_password'])) { ?>
                <span class="field-error"><?php echo h($member->errors['confirm_password']); ?></span>
            <?php } ?>
        </div>
    </div>
<?php } ?>
