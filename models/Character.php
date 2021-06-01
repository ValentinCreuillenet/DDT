<?php
class Character{

    public $attributes;

    public $health;

    public $role;

    public $name;

    protected function __construct($role = 0){
     $this->health = 80;
     $this->force=10;
     $this->agility=10;
     $this->endurance=10;
     $this->role = $role;
     $this->attributes=array(&$this->force,&$this->agility,&$this->endurance);
     $this->setStats();

    }

    public function setName($name){
        $this->name = $name;
    }

    public function setStats(){
        $pool = rand(30,50);


        while($pool > 0){
            
            $rand = rand(0,count($this->attributes)-1);

            $this->attributes[$rand] += 1;

            $pool -= 1;
        }

    }

    public function attack($target){

        $multiplier = rand(10,20)/10;
        $damage = round(($this->force * $multiplier) - ($target->endurance/2));
        if($damage <=0) $damage = 1;
        $target->health -= $damage;
        return $damage;
    }
}

?>