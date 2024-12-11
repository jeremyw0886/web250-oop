<?php
require_once('../../private/initialize.php');
require_login();

if(!$session->is_admin()) {
    $session->message('You do not have permission to access that page.');
    redirect_to(url_for('/members/index.php'));
}

if(!isset($_GET['id'])) {
    redirect_to(url_for('/members/index.php'));
}
$id = $_GET['id'];
/** @var Member|false $member */
$member = Member::find_by_id($id);
if($member == false) {
    redirect_to(url_for('/members/index.php'));
}

if(is_post_request()) {
    // Don't allow admin to delete themselves
    if($member->id == $session->get_member_id()) {
        $session->message('You cannot delete your own admin account.');
        redirect_to(url_for('/members/index.php'));
    }
    
    $result = $member->delete();
    $session->message('The member was deleted successfully.');
    redirect_to(url_for('/members/index.php'));
}
?>

<?php $page_title = 'Delete Member'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
  <div id="page">
    <div id="content">
      <a class="back-link" href="<?php echo url_for('/members/index.php'); ?>">&laquo; Back to List</a>

      <div class="member delete">
        <h1>Delete Member</h1>
        <p>Are you sure you want to delete this member?</p>
        <p class="item"><?php echo h($member->full_name()); ?></p>

        <form action="<?php echo url_for('/members/delete.php?id=' . h(u($id))); ?>" method="post">
          <div class="form-buttons">
            <input type="submit" name="commit" value="Delete Member">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
