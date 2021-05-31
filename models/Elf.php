<?php

include_once('./models/Character.php');

class Elf extends Character{


    private function __construct(){
        parent::__construct();
        $this->$health *= 0.75;
    }
}

?>