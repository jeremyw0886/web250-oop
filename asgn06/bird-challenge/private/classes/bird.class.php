<?php

class Bird {
/*
Use the wnc-birds.csv file to create the properties
Make all of the properties public.
*/
  // Add properties based on CSV columns
  public $commonName;
  public $habitat;
  public $food;
  public $nestPlacement;
  public $behavior;
  public $conservationId;
  public $backyardTips;
 
  /*
  Create a protected constant array called CONSERVATION_OPTIONS using the following scale.
  Use the CONDITION_OPTIONS from the bicycle.class.php file

  1 = Low concern
  2 = Moderate concern
  3 = Extreme concern
  4 = Extinct
  */
  //Add the CONSERVATION_OPTIONS constant array
  protected const CONSERVATION_OPTIONS = [
    1 => 'Low concern',
    2 => 'Moderate concern',
    3 => 'Extreme concern',
    4 => 'Extinct'
  ];

   /*
   - Create a public __contruct that accepts a list of $args[]
   - Use the Null coalescing operator
   - Create a default value of 1 for conservation_id
   */
  // Creates constructor to use the args array
  public function __construct($args = []) {
    $this->commonName = $args['commonName'] ?? '';
    $this->habitat = $args['habitat'] ?? '';
    $this->food = $args['food'] ?? '';
    $this->nestPlacement = $args['nestPlacement'] ?? '';
    $this->behavior = $args['behavior'] ?? '';
    $this->conservationId = $args['conservationId'] ?? 1;
    $this->backyardTips = $args['backyardTips'] ?? '';
  }

  /*
  Create a public method called conservation(). This method should mimic the
    public function condition() from the bicycle.class.php file
  */
  // Add the conservation method
  public function conservation() {
    if($this->conservationId > 0) {
      return self::CONSERVATION_OPTIONS[$this->conservationId];
    } else {
        return 'Unknown';
    }
  }
}

?>
