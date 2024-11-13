<?php
require_once('../../private/initialize.php');

// Get requested ID
$id = $_GET['id'] ?? false;

if(!$id) {
  redirect_to(url_for('/birds.php'));
}

// Find bird using ID
$bird = Bird::find_by_id($id);
if($bird == false) {
  redirect_to(url_for('/birds.php'));
}

$page_title = 'Show Bird: ' . h($bird->common_name);
include(SHARED_PATH . '/public_header.php');
?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/birds.php'); ?>">&laquo; Back to List</a>

  <div class="bird show">
    <h1>Bird: <?php echo h($bird->common_name); ?></h1>

    <div class="attributes">
      <dl>
        <dt>Common Name</dt>
        <dd><?php echo h($bird->common_name); ?></dd>
      </dl>
      <dl>
        <dt>Habitat</dt>
        <dd><?php echo h($bird->habitat); ?></dd>
      </dl>
      <dl>
        <dt>Food</dt>
        <dd><?php echo h($bird->food); ?></dd>
      </dl>
      <dl>
        <dt>Conservation Status</dt>
        <dd class="status-<?php echo strtolower(str_replace(' ', '-', $bird->conservation())); ?>">
                    <?php echo h($bird->conservation()); ?>
      </dl>
      <dl>
        <dt>Backyard Tips</dt>
        <dd><?php echo h($bird->backyard_tips); ?></dd>
      </dl>
    </div>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/active-record/edit.php?id=' . h(u($bird->id))); ?>">Edit</a>
      <a class="action" href="<?php echo url_for('/active-record/delete.php?id=' . h(u($bird->id))); ?>">Delete</a>
    </div>

  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
