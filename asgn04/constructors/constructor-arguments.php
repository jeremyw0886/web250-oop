<?php

class Bird {
  public $commonName;
  public $latinName;

  public function __construct($args) {
    $this->commonName = $args['commonName'] ?? NULL;
    $this->latinName = $args['latinName'] ?? NULL;
  }
}

// Create new instances of the Bird class
$flycatcher = new Bird(['commonName' => 'Acadian Flycatcher', 'latinName' => 'Empidonax virescens']);
$robin = new Bird(['commonName' => 'American Robin', 'latinName' => 'Turdus migratorius']);
$towhee = new Bird(['commonName' => 'Eastern Towhee', 'latinName' => 'Pipilo erythrophthalmus']);
$wren = new Bird(['commonName' => 'Carolina Wren', 'latinName' => 'Thryothorus ludovicianus']);

//Output
echo "Common Name: " . $flycatcher->commonName . "<br>";
echo "Latin Name: " . $flycatcher->latinName . "<hr>";

echo "Common Name: " . $wren->commonName . "<br>";
echo "Latin Name: " . $wren->latinName . "<br>";

?>
