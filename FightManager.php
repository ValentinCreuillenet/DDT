<?php 

class FightManager{

    private static $_instance = null;

    private $fighters;
    private $corpses;

    private function __construct(){
        $this->fighters = array();
        $this->corpses = array();
    }

    private function describeAttack($attacker,$target,$damage){
        echo $attacker->name." attacks ".$target->name." for ".$damage." damage!\n";
    }

    private function describeDeath($dead){
        echo $dead->name." is dead!\n";
    }

    private function describeFightEnd($winner){
        echo $winner->name." wins the fight!\n";
    }

    private function cleanCorpse($corpse){
            array_splice($this->fighters,array_search($corpse,$this->fighters),1);
            array_push($this->corpses, $corpse);
            $this->describeDeath($corpse);
    }

    public function addToFight($fighter){
        array_push($this->fighters,$fighter);
    }

    public function deathFight(){
        
        do{
            $attacker = $this->fighters[rand(0,count($this->fighters)-1)];
            $target = $this->fighters[rand(0,count($this->fighters)-1)];
            
            if($attacker != $target){
                $damage = $attacker->attack($target);
                $this->describeAttack($attacker,$target,$damage);
                if($target->health<=0) $this->cleanCorpse($target);
                sleep(1);
            }
         }while(count($this->fighters) > 1);

        $this->describeFightEnd($attacker);
    }

    public static function getInstance() {
 
        if(is_null(self::$_instance)) {
          self::$_instance = new FightManager();  
        }
    
        return self::$_instance;
      }
}

?>