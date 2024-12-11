<?php
require_once('../private/initialize.php');

if($session->is_logged_in()) {
    redirect_to(url_for('/index.php'));
}

$member = new Member;
if(is_post_request()) {
    $args = $_POST['member'];
    $args['user_level'] = 'm';  // Force member level on signup
    $member->merge_attributes($args);
    
    if($member->save()) {
        $session->login($member);
        $session->message('Registration successful.');
        redirect_to(url_for('/index.php'));
    }
}
?>

<?php $page_title = 'Sign Up'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
  <div id="page">
    <div class="login-form">
      <h1>Sign Up</h1>

      <?php echo display_errors($member->errors); ?>

      <form action="signup.php" method="post">
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

        <div class="form-buttons">
            <input type="submit" value="Sign Up">
        </div>
      </form>

      <div class="login-link">
          <p>Already have an account? <a href="<?php echo url_for('/members/login.php'); ?>">Log in</a></p>
      </div>
    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
