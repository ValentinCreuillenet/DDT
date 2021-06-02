<?php

include_once('./models/Character.php');

class Elf extends Character{


    public function __construct($name , $role){
        parent::__construct($name , $role);
        $this->health *= 0.75;
    }
}

?>