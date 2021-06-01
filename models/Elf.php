<?php

include_once('./models/Character.php');

class Elf extends Character{


    public function __construct(){
        parent::__construct();
        $this->health *= 0.75;
    }
}

?>