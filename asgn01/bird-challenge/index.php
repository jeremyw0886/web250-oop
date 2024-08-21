<?php 

class bird {
  var $common_name;
  var $food = 'bugs';
  var $nest_placement = 'trees';
  var $conservation_level;

  function songs($args) {

  }

  function canFly($args) {

  }
}

$bird1 = new bird;

$bird2 = new bird;

?>


<!-- UML Diagram:
+-------------------+
|       bird        |
+-------------------+
| - common_name     |
| - food = "bugs"   |
| - nest_placement  |
| - conservation_level |
+-------------------+
| + songs(args): Type |
| + canFly(args): Type |
+-------------------+ -->
