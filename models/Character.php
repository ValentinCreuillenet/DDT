<?php
class Character{


    public $stats[
    public $force,
    public $agility,
    public $endurance
    ];

    public $health;

    public $role;

    public $name;

    protected function __construct($role){
     $this->setStats();
     $this->health = 1000;
     $this->role = $role;
    }

    function setStats(){
        $pool = rand(30,50);

        while($pool > 0){
            
            $rand = rand(0,count($stats)-1);

            $stats[$rand] += 1;

            $pool -= 1;
        }

    }
}

?>