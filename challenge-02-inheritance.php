<?php

// Define a base class for types of wood
class TypesOfWood {
  var $hard = false;
  var $soft = false;
}

// Define a class for hardwood
class TypesOfHardWood extends TypesOfWood {
  var $oak = false;
  var $maple = false;
  var $cherry = false;
  var $walnut = false;
  var $mahogany = false; 
}

// Define a class for softwood
class TypesOfSoftWood extends TypesOfWood {
  var $pine = false;
  var $cedar = false;
  var $redwood = false;
  var $spruce = false;
  var $fir = false;
}

// Define a class for types of oak
class TypesOfOak extends TypesOfHardWood {
  var $white = false;
  var $red = false;
}

?>
