<?php
require_once('../private/initialize.php');

$pageTitle = 'Inventory';
include(SHARED_PATH . '/public_header.php');

$parser = new ParseCSV(PRIVATE_PATH . '/used_bicycles.csv');
$bikeArray = $parser->parse();
?>

<div id="main">
    <div id="page">
        <div class="intro">
            <img class="inset" src="<?php echo urlFor('/images/AdobeStock_55807979_thumb.jpeg') ?>" />
            <h2>Our Inventory of Used Bicycles</h2>
            <p>Choose the bike you love.</p>
            <p>We will deliver it to your door and let you try it before you buy it.</p>
        </div>

        <table id="inventory">
            <tr>
                <th>Brand</th>
                <th>Model</th>
                <th>Year</th>
                <th>Category</th>
                <th>Gender</th>
                <th>Color</th>
                <th>Weight</th>
                <th>Condition</th>
                <th>Price</th>
            </tr>

            <?php foreach($bikeArray as $args) { 
                $bicycle = new Bicycle($args);
            ?>
            <tr>
                <td><?php echo h($bicycle->brand); ?></td>
                <td><?php echo h($bicycle->model); ?></td>
                <td><?php echo h($bicycle->year); ?></td>
                <td><?php echo h($bicycle->category); ?></td>
                <td><?php echo h($bicycle->gender); ?></td>
                <td><?php echo h($bicycle->color); ?></td>
                <td><?php echo h($bicycle->weightKg()) . ' / ' . h($bicycle->weightLbs()); ?></td>
                <td><?php echo h($bicycle->condition()); ?></td>
                <td><?php echo h('$' . number_format($bicycle->price, 2)); ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>

<?php include(SHARED_PATH . '/public_footer.php'); ?>
