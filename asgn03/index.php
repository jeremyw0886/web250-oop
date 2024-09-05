<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>asgn03 Static</title>
  </head>

  <body>
    <h1>Static Examples</h1>

    <?php 
      include 'Bird.php';
    
      // Display instance counts before using create() method
      echo "<p>Bird instances: " . Bird::$instanceCount . "</p>";
      echo "<p>Yellow-bellied Flycatcher instances: " .      YellowBelliedFlyCatcher::$instanceCount . "</p>";
      echo "<p>Kiwi instances: " . Kiwi::$instanceCount . "</p>";  

      echo "<hr>";

      // Create new instances using create() method
      $bird = Bird::create();
      $flyCatcher = YellowBelliedFlyCatcher::create();
      $kiwi = Kiwi::create();

  // Display instance counts after using create() method
      echo "<p>Bird instances: " . Bird::$instanceCount . "</p>";
      echo "<p>Yellow-bellied Flycatcher instances: " .      YellowBelliedFlyCatcher::$instanceCount . "</p>";
      echo "<p>Kiwi instances: " . Kiwi::$instanceCount . "</p>";

      echo "<hr>";

      echo '<p>The generic song of any bird is "' . $bird->song . '".</p>';
      echo '<p>The song of the ' . $flyCatcher->name . ' on breeding ground is "' .      $flyCatcher->song . '".</p>';
      $kiwi->flying = "no";
      echo "<p>The " . $flyCatcher->name . " " . $flyCatcher->canFly() . ".</p>";
      echo "<p>The " . $kiwi->name. " " . $kiwi->canFly() . ".</p>";
    ?>
  </body>
</html>

