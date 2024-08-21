<?php

class bicycle {
  var $brand;
  var $model;
  var $year;
  var $description = 'Used bicycle';
  var $weight_kg = 0.0;

  function name() {
    return $this->brand . " " . $this->model . " (" . $this->year . ")";
  }

  function weight_lbs() {
    return floatval($this->weight_kg) * 2.2046226218;
  }

  function set_weight_lbs($value) {
    $this->weight_kg = floatval($value) / 2.2046226218;
  }
}

$monocog = new bicycle;
$monocog->brand = 'Monocog';
$monocog->model = 'Flyer';
$monocog->year = 2009;
$monocog->description = 'All-purpose bike';
$monocog->weight_kg = 8.0;

$giant = new bicycle;
$giant->brand = 'Giant';
$giant->model = 'Defy';
$giant->year = 2011;
$giant->description = 'Road bike';
$giant->weight_kg = 8.5;

echo $monocog->name() . "<br>";
echo $giant->name() . "<br>";
echo "<br />";

$monocog->set_weight_lbs(17);
echo "Weight of monocog in lbs: " . 
$monocog->weight_lbs() . "<br />";
echo "Weight of monocog in kg: " . $monocog->weight_kg . "<br>";

$giant->set_weight_lbs(19);
echo "Weight of giant in lbs: " . $giant->weight_lbs() . "<br>";
echo "Weight of giant in kg: " . $giant->weight_kg . "<br>";

?>
