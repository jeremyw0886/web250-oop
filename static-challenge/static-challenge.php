<?php

class Bicycle {

  // Static property to keep track of the number of instances
  public static $instanceCount = 0;

  public $brand;
  public $model;
  public $year;
  public $category; // Adds a public property for category
  public $description = 'Used bicycle';
  protected $weightKg = 0.0; // change visibility to protected
  protected static $wheels = 2; // change visibility to static
  
  // Adds a constant property for categories
  public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];

  // Adds a static method to get the categories
  // public function __construct() {
  //   self::$instanceCount++;
  // }
  
  // Adds a static method to create a new instance
  public static function create() {
    $className = get_called_class();
    $obj = new $className;
    if ($className === 'Bicycle') {
      self::$instanceCount++;
    }
    return $obj;
  }
  
  // Adds a static method to get the instance count
  public static function getInstanceCount() {
    return self::$instanceCount;
  }

  public function name() {
    return $this->brand . " " . $this->model . " (" . $this->year . ")";
  }
  
  // Makes wheelDetails() a static method
  public static function wheelDetails() {
    $wheelString = static::$wheels == 1 ? "1 wheel" : static::$wheels . " wheels";
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
  protected static $wheels = 1; // change visibility to static
  
  // creates a method that extends the parent method and adds to it 
  public function name() {
    return "Unicycle: " . parent::name();
  }
  
  // Creates a method which overrides the parent method but also falls back to the parent method if the condition is not met
  public static function wheelDetails() {
    if (static::$wheels == 1) {
      return "It has 1 wheel.";
    } else {
      return parent::wheelDetails();
    }
  }

  // Adds a static method to create a new instance
  public static function create() {
    $className = get_called_class();
    $obj = new $className;
    if ($className === 'Unicycle') {
      self::$instanceCount++;
    }
    return $obj;
  }
}

// Displays the number of instances
echo 'Bicycle count: ' . Bicycle::getInstanceCount() . '<br>';
echo 'Unicycle count: ' . Unicycle::getInstanceCount() . '<br>';

// Creates new instances of Bicycle and Unicycle
$bike1 = Bicycle::create();
$uni1 = Unicycle::create();

// Displays the number of instances
echo 'Bicycle count: ' . Bicycle::getInstanceCount() . '<br>';
echo 'Unicycle count: ' . Unicycle::getInstanceCount() . '<br>';

echo '<hr>';

// Display the details of the Bicycle and Unicycle
echo "Bicycle: " . Bicycle::wheelDetails() . "<br>";
echo "Unicycle: " . Unicycle::wheelDetails() . "<br>";

?>
