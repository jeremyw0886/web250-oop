<?php
require_once '../../private/initialize.php';

if(is_post_request()) {
  $args = $_POST['bird'];
  $bird = new Bird($args);
  $result = $bird->save();

  if($result === true) {
    $new_id = $bird->id;
    $_SESSION['message'] = 'The bird was created successfully.';
    redirect_to(url_for('/active-record/show.php?id=' . $new_id));
  }
} else {
  $bird = new Bird();
}

$page_title = 'Create Bird';
include(SHARED_PATH . '/public_header.php');
?>

<div id="content">
  <a class="back-link" href="<?php echo url_for('/birds.php'); ?>">&laquo; Back to List</a>

  <div class="bird new">
    <h1>Create Bird</h1>

    <form action="<?php echo url_for('/active-record/new.php'); ?>" method="post">
      <?php include('form_fields.php'); ?>

      <div id="operations">
        <input type="submit" value="Create Bird" />
      </div>
    </form>
  </div>
</div>

<?php include SHARED_PATH . '/public_footer.php'; ?>
