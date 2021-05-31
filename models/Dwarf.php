<?php

include_once('./models/Character.php');

class Dwarf extends Character{


    private function __construct(){
        parent::__construct();
        $this->$health *= 1.6;
    }
}

?>