<?php

class User {

  private $isAdmin = false;

  protected $firstName;
  protected $lastName;
  public $username;

  public function getIsAdmin() {
    return $this->isAdmin;
  }

  public function setIsAdmin($isAdmin) {
    $this->isAdmin = $isAdmin;
  }

  public function getFirstName() {
    return $this->firstName;
  }

  public function setFirstName($firstName) {
    if (!empty($firstName)) {
      $this->firstName = $firstName;
    }
  }

  public function getLastName() {
    return $this->lastName;
  }

  public function setLastName($lastName) {
    if (!empty($lastName)) {
      $this->lastName = $lastName;
    }
  }

  public function fullName() {
    return $this->firstName . " " . $this->lastName;
  }

}

class Customer extends User {

  public $city;
  public $state; // or province
  public $country;

  public function location() {
    return $this->city . ", " . $this->state . ", " . $this->country;
  }
}

class AdminUser extends User {
  public function __construct() {
    $this->setIsAdmin(true);
  }

  public function fullName() {
    return $this->getFirstName() . " " . $this->getLastName() . " (Admin)";
  }
}

$u = new User;
$u->setFirstName('Jerry');
$u->setLastName('Seinfeld');
$u->username = 'jseinfeld';

$c = new Customer;
$c->setFirstName('George');
$c->setLastName('Costanza');
$c->username = 'gcostanza';
$c->city = 'New York';
$c->state = 'New York';
$c->country = 'United States';

echo $u->fullName() . '<br>';
echo $c->fullName() . '<br>';

echo $c->location() . '<br>';
// echo $u->location() . '<br>'; // no method error

echo get_parent_class($u) . '<br>';
echo get_parent_class($c) . '<br>';

if(is_subclass_of($c, 'User')) {
  echo "Instance is a subclass of User.<br>";
}

$parents = class_parents($c);
echo implode(', ', $parents) . '<br>';

?>
