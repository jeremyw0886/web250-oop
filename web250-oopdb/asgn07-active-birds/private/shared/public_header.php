<?php
  if(!isset($page_title)) { $page_title = 'WNC Birds'; }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WNC Birds <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <link rel="stylesheet" media="all" href="<?php echo url_for('/css/styles.css'); ?>" />
  </head>

  <body>
    <header>
      <h1>
        <a href="<?php echo url_for('/index.php'); ?>">
          WNC Birds
        </a>
      </h1>
    </header>
