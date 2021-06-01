<?php 

class Fight{

    public function __construct(){

    }


    private function describeAttack($attacker,$target,$damage){
        echo $attacker->name." attacks ".$target->name." for ".$damage." damage!\n";
    }

    private function describeFightEnd($winner,$loser){
        echo $winner->name." wins the fight! ".$loser->name." is dead!\n";
    }

    public function deathFight($fighter1,$fighter2){
        
        do{
            $initiative = rand(1,2);
            if($initiative = 1){
                $damage = $fighter1->attack($fighter2);
                $this->describeAttack($fighter1,$fighter2,$damage);

                if($fighter2->health<0){
                $damage = $fighter2->attack($fighter1);
                $this->describeAttack($fighter2,$fighter1,$damage);
                }
            } else {
                $damage = $fighter2->attack($fighter1);
                $this->describeAttack($fighter2,$fighter1,$damage);

                if($fighter1->health<0){
                $damage = $fighter1->attack($fighter2);
                $this->describeAttack($fighter1,$fighter2,$damage);
                }
            }

        } while($fighter1->health>0 || $fighter2->health>0);

        if($fighter1->health<0)$this->describeFightEnd($fighter2,$fighter1);
        else$this->describeFightEnd($fighter1,$fighter2);
        
    }
}

?>