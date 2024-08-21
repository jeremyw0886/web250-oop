<?php 

class bird {
  var $common_name;
  var $food = 'bugs';
  var $nest_placement = 'trees';
  var $conservation_level;
  var $song;

  function songs() {
    return $this->song;
  }

  function canFly() {
    return 'This bird can fly';
  }
}

$bird1 = new bird;
$bird1->common_name = 'Eastern Towhee';
$bird1->food = 'seeds, fruits, insects, and spiders.';
$bird1->nest_placement = 'Ground';
$bird1->conservation_level = 'Low';
$bird1->song = 'Drink-your-tea';

$bird2 = new bird;
$bird2->common_name = 'Indigo Bunting';
$bird2->food = 'small seeds, berries, buds, and insects';
$bird2->nest_placement = 'roadsides, railroad rights-of-way, and on the edges of cultivated fields';
$bird2->conservation_level = 'Low';
$bird2->song = 'whatwhat!!';

echo $bird1->common_name . "<br>";
echo "Food: " . $bird1->food . "<br>";
echo "Nest Placement: " . $bird1->nest_placement . "<br>";
echo "Conservation Level: " . $bird1->conservation_level . "<br>";
echo "Song: " . $bird1->songs() . "<br>";
echo $bird1->canFly() . "<br>";

echo "<br>";

echo $bird2->common_name . "<br>";
echo "Food: " . $bird2->food . "<br>";
echo "Nest Placement: " . $bird2->nest_placement . "<br>";
echo "Conservation Level: " . $bird2->conservation_level . "<br>";
echo "Song: " . $bird2->songs() . "<br>";
echo $bird2->canFly() . "<br>";

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
