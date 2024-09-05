<?php

class Bicycle {

  // static property to keep track of the number of instances
  public static $instanceCount = 0;

  public $brand;
  public $model;
  public $year;
  public $description = 'Used bicycle';
  protected $weightKg = 0.0; // change visibility to protected
  protected $wheels = 2;
  
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
