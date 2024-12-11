<!doctype html>
<html lang="en">

<head>
  <title>WNC Birds - <?php echo h($page_title); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" media="all" href="<?php echo url_for('/stylesheets/style.css'); ?>">
</head>

<header>
  <h1><a href="<?php echo url_for('/index.php'); ?>">WNC Birds</a></h1>
  <nav>
    <ul>
      <li><a href="<?php echo url_for('/index.php'); ?>">Home</a></li>
      <li><a href="<?php echo url_for('/birds/index.php'); ?>">View Birds</a></li>
      <?php if ($session->is_logged_in()) { ?>
        <?php if ($session->is_admin()) { ?>
          <li><a href="<?php echo url_for('/members/index.php'); ?>">Manage Birds/Members</a></li>
        <?php } ?>
        <li><a href="<?php echo url_for('/logout.php'); ?>">Logout, <?php echo h($session->username); ?> (<?php echo $session->is_admin() ? 'Admin' : 'Member'; ?>)</a></li>
      <?php } else { ?>
        <li><a href="<?php echo url_for('/login.php'); ?>">Login</a></li>
        <li><a href="<?php echo url_for('/signup.php'); ?>">Sign Up</a></li>
      <?php } ?>
    </ul>
  </nav>
</header>
