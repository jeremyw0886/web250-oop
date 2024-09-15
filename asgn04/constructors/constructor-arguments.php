<?php

class Bird {
  public $commonName;
  public $latinName;

  public function __construct($commonName, $latinName) {
    $this->commonName = $commonName;
    $this->latinName = $latinName;
  }
}

// Create a new instance of the Bird class
$robin = new Bird("American Robin", "Turdus migratorius");
$towhee = new Bird("Eastern Towhee", "Pipilo erythrophthalmus");

//Output
echo "Common Name: " . $robin->commonName . "<br>";
echo "Latin Name: " . $robin->latinName . "<hr>";

echo "Common Name: " . $towhee->commonName . "<br>";
echo "Latin Name: " . $towhee->latinName . "<br>";

?>
