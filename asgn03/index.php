<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asgn02 Inheritance</title>
</head>
<body>
<h1>Inheritance Examples</h1>

<?php 
    include 'Bird.php';
    
    // Display instance counts before using create() method
    echo "<p>Bird instances: " . Bird::$instanceCount . "</p>";
    echo "<p>Yellow-bellied Flycatcher instances: " . YellowBelliedFlyCatcher::$instanceCount . "</p>";
    echo "<p>Kiwi instances: " . Kiwi::$instanceCount . "</p>";    

?>
    </body>
</html>

