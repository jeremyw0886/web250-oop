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
$member = Member::find_by_id($id);
if($member == false) {
    redirect_to(url_for('/members/index.php'));
}

if(is_post_request()) {
    $args = $_POST['member'];
    $member->merge_attributes($args);
    $result = $member->save();

    if($result === true) {
        $session->message('The member was updated successfully.');
        redirect_to(url_for('/members/index.php'));
    }
}
?>

<?php $page_title = 'Edit Member'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
  <div id="page">
    <div id="content">
      <h1>Edit Member</h1>
      <?php echo display_errors($member->errors); ?>
      <form action="<?php echo url_for('/members/edit.php?id=' . h(u($id))); ?>" method="post">
        <?php include('member_form_fields.php'); ?>
        <input type="submit" value="Edit Member">
      </form>
    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
