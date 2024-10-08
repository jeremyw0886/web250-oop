<?php

class Bird {

public static $instanceCount; // A static property to keep track of the number of instances of the class

public static $eggNum = 0; // A static property to keep track of the number of eggs laid by all birds

public $habitat;
public $food;
public $nesting = "tree";
public $conservation;
public $song = "chirp";
public $flying = "yes";

    // public function canFly() {
    //     if ( $this->flying == "yes" ) {
    //         $flyingString = "can fly";
    //     } else {
    //         $flyingString = "is stuck on the ground";
    //     }
    //     return  $flyingString ;
    // }

public function __construct() {
  self::$instanceCount++;
} // Increment the instanceCount property by one each time a new instance of the class is created

public function canFly() {
  return $this->flying == "yes" ? "bird can fly" : "cannot fly and is stuck on the ground"; // ternary operator
}

public static function create() {
  return new static();
}
}

class YellowBelliedFlyCatcher extends Bird {

public static $eggNum = "3-4, sometimes 5"; // A static property to keep track of the number of eggs laid by all birds

public $name = "yellow-bellied flycatcher";
public $diet = "mostly insects.";
public $song = "flat chilk";
}
class Kiwi extends Bird {
public $name = "kiwi";
public $diet = "omnivorous";
public $flying = "no";
}
