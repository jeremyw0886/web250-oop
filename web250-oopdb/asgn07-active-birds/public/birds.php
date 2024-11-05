<?php
require_once('../private/initialize.php');
$page_title = 'Sightings';
include(SHARED_PATH . '/public_header.php');
?>

<div id="main">
    <div id="page">
        <div class="intro">
            <h2>Bird Inventory</h2>
            <p>This is a short list -- start your birding!</p>
        </div>

        <table>
            <tr>
                <th>Name</th>
                <th>Habitat</th>
                <th>Food</th>
                <th>Conservation Status</th>
                <th>Backyard Tips</th>
            </tr>

            <?php
            $birds = Bird::find_all();
            foreach($birds as $bird) {
            ?>
                <tr>
                    <td><?php echo h($bird->common_name); ?></td>
                    <td><?php echo h($bird->habitat); ?></td>
                    <td><?php echo h($bird->food); ?></td>
                    <td class="status-<?php echo strtolower(str_replace(' ', '-', $bird->conservation())); ?>">
                        <?php echo h($bird->conservation()); ?>
                    </td>
                    <td><?php echo h($bird->backyard_tips); ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>


<?php include(SHARED_PATH . '/public_footer.php'); ?>
