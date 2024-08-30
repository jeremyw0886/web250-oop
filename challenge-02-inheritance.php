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

// Define a class for types of pine
class TypesOfPine extends TypesOfSoftWood {
  var $white = false;
  var $yellow = false;
}

// Creates function to inspect a class and return its properties and methods
function inspect_class($class_name) {
  $output = '';

  // Add class name to output
  $output .= $class_name;

  // Get the parent class, if any, and add it to the output
  $parent_class = get_parent_class($class_name);
  if ($parent_class != '') {
    $output .= " extends {$parent_class}";
  }
  $output .= "\n";

  // Get the class variables, sort them, and add them to the output
  $class_vars = get_class_vars($class_name);
  ksort($class_vars);
  $output .= "properties:\n";
  foreach ($class_vars as $k => $v) {
    $output .= "  {$k}: " . (is_bool($v) ? ($v ? 'true' : 'false') : $v) . "\n";
  }

  // Get the class methods, sort them, and add them to the output
  $class_methods = get_class_methods($class_name);
  sort($class_methods);
  $output .= "methods:\n";
  foreach ($class_methods as $k) {
    $output .= "- {$k}\n";
  }

  return $output;
}

// List of Class Names to inspect
$class_names = ['TypesOfWood', 'TypesOfHardWood', 'TypesOfSoftWood', 'TypesOfOak', 'TypesOfPine'];

// Loop through each class name, inspect it, and print the result
foreach ($class_names as $class_name) {
  echo nl2br(inspect_class($class_name));
  echo '<br>';
}
echo '<br>';

// Create an instance of TypesOfHardWood and set its properties
$hardwood = new TypesOfHardWood();
$hardwood -> oak = true;
$hardwood -> maple = true;
$hardwood -> cherry = true;
$hardwood -> walnut = true;
$hardwood -> mahogany = true;

// Create an instance of TypesOfSoftWood and set its properties
$softwood = new TypesOfSoftWood();
$softwood -> pine = true;
$softwood -> cedar = true;
$softwood -> redwood = true;
$softwood -> spruce = true;
$softwood -> fir = true;

// Create an instance of TypesOfOak and set its properties
$oak = new TypesOfOak();
$oak -> white = true;
$oak -> red = true;

// Create an instance of TypesOfPine and set its properties
$pine = new TypesOfPine();
$pine -> white = true;
$pine -> yellow = true;

// Print a message about the types of wood used in the wood shop
echo "Wood working is my favorite hobby and these are the types of wood I use in my wood shop.<br><br>";



?>
