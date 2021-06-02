<?php

include_once('./models/Character.php');

class Dwarf extends Character{


    public function __construct($name , $role){
        parent::__construct($name , $role);
        $this->health *= 1.6;
    }
}

?>