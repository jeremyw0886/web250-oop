<?php

class Bicycle {

  public $brand;
  public $model;
  public $year;
  public $description = 'Used bicycle';
  private $weightKg = 0.0;
  protected $wheels = 2;

  public function name() {
    return $this->brand . " " . $this->model . " (" . $this->year . ")";
  }

  public function wheelDetails() {
    $wheelString = $this->wheels == 1 ? "1 wheel" : "{$this->wheels} wheels";
    return "It has " . $wheelString . ".";
  }

  public function getWeightKg() {
    return $this->weightKg . ' kg';
  }

  public function setWeightKg($value) {
    $this->weightKg = floatval($value);
  }

  public function weightLbs() {
    return floatval($this->weightKg) * 2.2046226218 . ' lbs';
  }

  public function setWeightLbs($value) {
    $this->weightKg = floatval($value) / 2.2046226218;
  }

}

// Create a Unicycle subclass
class Unicycle extends Bicycle {
  protected $wheels = 1;
}

// Create instances of Bicycle and Unicycle
$trek = new Bicycle;
$trek->brand = 'Trek';
$trek->model = 'Emonda';
$trek->year = '2017';

$uni = new Unicycle;

// Display the details of the Bicycle and Unicycle
echo "Bicycle: " . $trek->wheelDetails() . "<br>";
echo "Unicycle: " . $uni->wheelDetails() . "<br>";
echo "<hr>";

// Set weight using kg and display the weight
echo "Set weight using kg: <br>";
$trek->setWeightKg(1);
echo $trek->getWeightKg() . "<br>";
echo $trek->weightLbs() . "<br>";
echo "<hr>";

// Set weight using lbs and display the weight
echo "Set weight using lbs: <br>";
$trek->setWeightLbs(2.);
echo $trek->getWeightKg() . "<br>";
echo $trek->weightLbs() . "<br>";
echo "<hr>";

echo "The bug in weightKg is that it is now private and can't be accessed from outside the class. To fix this, we can change it to protected.";
?>
