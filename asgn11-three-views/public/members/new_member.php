<?php
require_once('../../private/initialize.php');
require_login();

// Check if user is admin
if (!$session->is_admin()) {
  $session->message('You do not have permission to access that page.');
  redirect_to(url_for('/members/index.php'));
}

$member = new Member;
if (is_post_request()) {
  $args = $_POST['member'];
  $member->merge_attributes($args);
  $member->password_required = true;

  if ($member->save()) {
    $session->message('The member was created successfully.');
    redirect_to(url_for('/members/index.php'));
  }
}
?>

<?php $page_title = 'Create Member'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
  <div id="page">
    <div id="content">
      <a class="back-link" href="<?php echo url_for('/members/index.php'); ?>">&laquo; Back to List</a>

      <div class="member new">
        <h1>Create Member</h1>

        <?php echo display_errors($member->errors); ?>

        <form action="<?php echo url_for('/members/new_member.php'); ?>" method="post">

          <div class="form-group <?php echo isset($member->errors['first_name']) ? 'has-error' : ''; ?>">
            <label for="first-name">First Name</label>
            <div class="input-container">
              <input type="text" id="first-name" name="member[first_name]" value="<?php echo h($member->first_name); ?>">
              <?php if (isset($member->errors['first_name'])) { ?>
                <span class="field-error"><?php echo h($member->errors['first_name']); ?></span>
              <?php } ?>
            </div>
          </div>

          <div class="form-group <?php echo isset($member->errors['last_name']) ? 'has-error' : ''; ?>">
            <label for="last-name">Last Name</label>
            <div class="input-container">
              <input type="text" id="last-name" name="member[last_name]" value="<?php echo h($member->last_name); ?>">
              <?php if (isset($member->errors['last_name'])) { ?>
                <span class="field-error"><?php echo h($member->errors['last_name']); ?></span>
              <?php } ?>
            </div>
          </div>

          <div class="form-group <?php echo isset($member->errors['email']) ? 'has-error' : ''; ?>">
            <label for="email">Email</label>
            <div class="input-container">
              <input type="email" id="email" name="member[email]" value="<?php echo h($member->email); ?>">
              <?php if (isset($member->errors['email'])) { ?>
                <span class="field-error"><?php echo h($member->errors['email']); ?></span>
              <?php } ?>
            </div>
          </div>

          <div class="form-group <?php echo isset($member->errors['username']) ? 'has-error' : ''; ?>">
            <label for="username">Username</label>
            <div class="input-container">
              <input type="text" id="username" name="member[username]" value="<?php echo h($member->username); ?>">
              <?php if (isset($member->errors['username'])) { ?>
                <span class="field-error"><?php echo h($member->errors['username']); ?></span>
              <?php } ?>
            </div>
          </div>

          <div class="form-group <?php echo isset($member->errors['password']) ? 'has-error' : ''; ?>">
            <label for="password">Password</label>
            <div class="input-container">
              <input type="password" id="password" name="member[password]" value="">
              <?php if (isset($member->errors['password'])) { ?>
                <span class="field-error"><?php echo h($member->errors['password']); ?></span>
              <?php } ?>
            </div>
          </div>

          <div class="form-group <?php echo isset($member->errors['confirm_password']) ? 'has-error' : ''; ?>">
            <label for="confirm-password">Confirm Password</label>
            <div class="input-container">
              <input type="password" id="confirm-password" name="member[confirm_password]" value="">
              <?php if (isset($member->errors['confirm_password'])) { ?>
                <span class="field-error"><?php echo h($member->errors['confirm_password']); ?></span>
              <?php } ?>
            </div>
          </div>

          <div class="form-group <?php echo isset($member->errors['user_level']) ? 'has-error' : ''; ?>">
            <label for="user-level">User Level</label>
            <div class="input-container">
              <select id="user-level" name="member[user_level]">
                <option value="m" <?php if ($member->user_level == 'm') {
                                    echo 'selected';
                                  } ?>>Member</option>
                <option value="a" <?php if ($member->user_level == 'a') {
                                    echo 'selected';
                                  } ?>>Admin</option>
              </select>
              <?php if (isset($member->errors['user_level'])) { ?>
                <span class="field-error"><?php echo h($member->errors['user_level']); ?></span>
              <?php } ?>
            </div>
          </div>

          <div class="form-buttons">
            <input type="submit" value="Create Member">
          </div>

        </form>
      </div>
    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
