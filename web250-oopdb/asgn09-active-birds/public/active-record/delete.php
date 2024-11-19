<?php
require_once('../../private/initialize.php');
require_once('../../private/debugger.php');

if(!isset($_GET['id'])) {
    redirect_to(url_for('/birds.php'));
}

$id = $_GET['id'];
$bird = Bird::find_by_id($id);

if($bird == false) {
    redirect_to(url_for('/birds.php'));
}

if(is_post_request()) {
    $result = $bird->delete();
    
    if($result === true) {
        $_SESSION['message'] = 'The bird was deleted successfully.';
        redirect_to(url_for('/birds.php'));
    } else {
        $errors = $bird->errors;
    }
}

?>

<?php $page_title = 'Delete Bird'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="content">
    <a class="back-link" href="<?php echo url_for('/birds.php'); ?>">&laquo; Back to List</a>

    <div class="bird delete">
        <h1>Delete Bird</h1>
        <?php echo display_errors($errors ?? []); ?>
        <?php echo display_session_message(); ?>

        <p>Are you sure you want to delete this bird?</p>
        <?php if($bird) { ?>
            <p class="item">Name: <?php echo h($bird->common_name); ?></p>
            <p class="item">Conservation Status: <?php echo h($bird->conservation()); ?></p>
        <?php } ?>

        <form action="<?php echo url_for('/active-record/delete.php?id=' . h(u($id))); ?>" method="post">
            <div id="operations">
                <input type="submit" name="commit" value="Delete Bird" />
            </div>
        </form>
    </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
