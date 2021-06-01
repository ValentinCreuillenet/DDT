<?php

include_once('./models/Character.php');

class Human extends Character{


    public function __construct(){
        parent::__construct();
        $this->health *= 1.15;
    }
}

?>