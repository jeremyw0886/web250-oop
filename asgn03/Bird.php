<?php

class Bird {
    public $habitat;
    public $food;
    public $nesting = "tree";
    public $conservation;
    public $song = "chirp";
    public $flying = "yes";

    public function canFly() {
        if ( $this->flying == "yes" ) {
            $flyingString = "can fly";
        } else {
            $flyingString = "is stuck on the ground";
        }
        return  $flyingString ;
    }
}

class YellowBelliedFlyCatcher extends Bird {
    public $name = "yellow-bellied flycatcher";
    public $diet = "mostly insects.";
    public $song = "flat chilk";
}
class Kiwi extends Bird {
    public $name = "kiwi";
    public $diet = "omnivorous";
    public $flying = "no";
}
