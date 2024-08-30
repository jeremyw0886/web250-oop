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

?>
