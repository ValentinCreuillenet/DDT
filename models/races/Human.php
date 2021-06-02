<?php

include_once('./models/Character.php');

class Human extends Character{


    public function __construct($name , $role){
        parent::__construct($name , $role);
        $this->health *= 1.15;
    }
}

?>