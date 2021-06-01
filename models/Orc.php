<?php

include_once('./models/Character.php');

class Orc extends Character{


    public function __construct(){
        parent::__construct();
        $this->health *= 1.3;
    }
}

?>