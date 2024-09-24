<!doctype html>

<html lang="en">
  <head>
    <title>Bike Challenge <?php if(isset($page_title)) { echo '- ' . h($page_title); } ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" media="all" href="<?php echo urlFor('/stylesheets/public.css'); ?>" />
  </head>

  <body>

    <header>
      <h1>
        <a href="<?php echo urlFor('/index.php'); ?>">
          <img class="bike-icon" src="<?php echo urlFor('/images/USDOT_bicycle_symbol.svg') ?>" /><br />
          Chain Gang
        </a>
      </h1>
    </header>
