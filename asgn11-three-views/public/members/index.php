<?php
require_once('../../private/initialize.php');
require_login();

// Initialize $members variable
$members = [];

// For admin view, show member management
if ($session->is_admin()) {
  $members = Member::find_all();
} else if 
(!$session->is_admin() && strpos($_SERVER['PHP_SELF'], 'members') !== false) 
{
    $session->message('You do not have permission to access that page.');
    redirect_to(url_for('/birds/index.php'));
}

$birds = Bird::find_all();
?>

<?php $page_title = 'Manage Birds'; ?>
<?php include(SHARED_PATH . '/public_header.php'); ?>

<div id="main">
  <div id="page">
    <div id="content">

      <div class="birds listing">
        <h1>Birds</h1>

        <div class="actions">
          <a class="action" href="<?php echo url_for('/birds/new.php'); ?>">Add Bird</a>
        </div>

        <table class="list">
          <tr>
            <th>Name</th>
            <th>Habitat</th>
            <th>Food</th>
            <th>Conservation ID</th>
            <th>Backyard Tips</th>
            <th>&nbsp;</th>
          </tr>

          <?php foreach ($birds as $bird) { ?>
            <tr>
              <td><?php echo h($bird->common_name); ?></td>
              <td><?php echo h($bird->habitat); ?></td>
              <td><?php echo h($bird->food); ?></td>
              <td><?php echo h($bird->conservation_id); ?></td>
              <td><?php echo h($bird->backyard_tips); ?></td>
              <td class="actions">
                <a class="action view-btn" href="<?php echo url_for('/birds/show.php?id=' . h(u($bird->id))); ?>">View</a>
                <a class="action edit-btn" href="<?php echo url_for('/birds/edit.php?id=' . h(u($bird->id))); ?>">Edit</a>
                <a class="action delete-btn" href="<?php echo url_for('/birds/delete.php?id=' . h(u($bird->id))); ?>">Delete</a>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>

      <?php if ($session->is_admin()) { ?>
        <div class="members listing">
          <h1>Manage Members</h1>

          <div class="actions">
            <a class="action" href="<?php echo url_for('/members/new_member.php'); ?>">Add Member</a>
          </div>

          <table class="list">
            <tr>
              <th>Username</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Email</th>
              <th>User Level</th>
              <th>&nbsp;</th>
            </tr>

            <?php foreach ($members as $member) { ?>
              <tr>
                <td><?php echo h($member->username); ?></td>
                <td><?php echo h($member->first_name); ?></td>
                <td><?php echo h($member->last_name); ?></td>
                <td><?php echo h($member->email); ?></td>
                <td><?php echo h($member->user_level_text()); ?></td>
                <td class="actions">
                  <a class="action edit-btn" href="<?php echo url_for('/members/edit.php?id=' . h(u($member->id))); ?>">Edit</a>
                  <a class="action delete-btn" href="<?php echo url_for('/members/delete.php?id=' . h(u($member->id))); ?>">Delete</a>
                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
      <?php } ?>
    </div>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
