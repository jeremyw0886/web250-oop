<?php 
require_once('../private/initialize.php');
$page_title = 'Bird List';
include(SHARED_PATH . '/public_header.php');

// Get all birds
$birds = Bird::find_all();
?>

<div id="main">
  <div id="page">
    <div class="intro">
      <h2>Bird Inventory</h2>
      <p>This is a short list -- start your birding!</p>
    </div>

    <div class="actions">
      <a class="action" href="<?php echo url_for('/active-record/new.php'); ?>">Add Bird</a>
    </div>

    <table>
      <tr>
        <th>Name</th>
        <th>Habitat</th>
        <th>Food</th>
        <th>Conservation</th>
        <th>Backyard Tips</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
      </tr>

      <?php foreach($birds as $bird) { ?>
        <tr>
          <td><?php echo h($bird->common_name); ?></td>
          <td><?php echo h($bird->habitat); ?></td>
          <td><?php echo h($bird->food); ?></td>
          <td class="status-<?php echo strtolower(str_replace(' ', '-', $bird->conservation())); ?>">
            <?php echo h($bird->conservation()); ?>
          </td>
          <td><?php echo h($bird->backyard_tips); ?></td>
          <td><a href="<?php echo url_for('/active-record/show.php?id=' . h(u($bird->id))); ?>">View</a></td>
          <td><a href="<?php echo url_for('/active-record/edit.php?id=' . h(u($bird->id))); ?>">Edit</a></td>
        </tr>
      <?php } ?>
    </table>
  </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?> 
