<?php

class Bicycle {

  // static property to keep track of the number of instances
  public static $instanceCount = 0;

  public $brand;
  public $model;
  public $year;
  public $description = 'Used bicycle';
  protected $weightKg = 0.0; // change visibility to protected
  protected static $wheels = 2; // change visibility to static
  
  // add a constant property for categories
  public const CATEGORIES = ['Road', 'Mountain', 'Hybrid', 'Cruiser', 'City', 'BMX'];

  // add a static method to get the categories
  public function __construct() {
    self::$instanceCount++;
  }
  
  // add a static method to create a new instance
  public static function create() {
    $className = get_called_class();
    $obj = new $className;
    self::$instanceCount++;
    return $obj;
  }
  
  // add a static method to get the instance count
  public static function getInstanceCount() {
    return self::$instanceCount;
  }

  public function name() {
    return $this->brand . " " . $this->model . " (" . $this->year . ")";
  }
  
  // make wheelDetails() a static method
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
  
  //creates a method which overrides the parent method but also falls back to the parent method if the condition is not met
  public static function wheelDetails() {
    if (static::$wheels == 1) {
      return "It has 1 wheel.";
    } else {
      return parent::wheelDetails();
    }
  }
}
