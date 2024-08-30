<?php

class User {

  var $isAdmin = false;

  var $firstName;
  var $lastName;
  var $username;

  function fullName() {
    return $this->firstName . " " . $this->lastName;
  }

}

class Customer extends User {

  var $city;
  var $state; // or province
  var $country;

  function location() {
    return $this->city . ", " . $this->state . ", " . $this->country;
  }
}

class AdminUser extends User {
  var $isAdmin = true;

  function fullName() {
    return $this->firstName . " " . $this->lastName . " (Admin)";
  }
}

$u = new User;
$u->firstName = 'Jerry';
$u->lastName = 'Seinfeld';
$u->username = 'jseinfeld';

$c = new Customer;
$c->firstName = 'George';
$c->lastName = 'Costanza';
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
