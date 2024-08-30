<?php

// Define a base class for types of wood
class TypesOfWood {
  var $hard = false;
  var $soft = false;
}

// Define a class for hardwood
class TypesOfHardwood extends TypesOfWood {
  var $oak = false;
  var $maple = false;
  var $cherry = false;
  var $walnut = false;
  var $mahogany = false; 
}

?>
