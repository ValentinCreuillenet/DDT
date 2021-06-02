<?php 

class FightManager{


    //Représente l'instance unique possible de la Classe FightManager
    private static $_instance = null;

    //La liste des combattant qui vont se mettre sur la gueule
    private $fighters;

    //La liste des combattant mort au combat
    private $corpses;

    //Le contructeur del la class (privée car singleton)
    private function __construct(){

        $this->fighters = array();
        $this->corpses = array();

    }

    //Méthode qui affiche un message dans la sortie standard décrivant une attaque
    private function describeAttack($attacker,$target,$damage){

        echo $attacker->name." attacks ".$target->name." for ".$damage." damage!\n";

    }

    //Méthode qui affiche un message dans la sortie standard annoncant la mort d'un personnage
    private function describeDeath($dead){

        echo $dead->name." is dead!\n";

    }

    //Méthode qui affiche un message dans la sortie standard annoncant qui a gagné le combat
    private function describeFightEnd($winner){

        echo $winner->name." wins the fight!\n";

    }

    //Enlève un combattant de la liste des combattant, le rajoute dans la list des morts
    private function cleanCorpse($corpse){

            array_splice($this->fighters,array_search($corpse,$this->fighters),1);
            array_push($this->corpses, $corpse);

    }

    //Vérifie si un des combatant est mort, l'enlève de la liste des combattans si c'es le cas, le met dans la lsite des cadavres et annonce sa mort
    private function checkDead(){

        foreach($this->fighters as $fighter){
            if($fighter->health <=0){
                $this->describeDeath($fighter);
                $this->cleanCorpse($fighter);
            }
        }

    }

    //Ajoute un combattant à la liste des combattants
    public function addToFight($fighter){

        array_push($this->fighters,$fighter);

    }

    //Choisit un combattatn aléatoirement dans la liste des combattants
    private function chooseRandomFighter(){

        return $this->fighters[rand(0,count($this->fighters)-1)];

    }

    //Fait en sorte qu'un combatant attaque un autre combattant
    private function makeFightersAttack($attacker,$target){

        if($attacker != $target){
            $damage = $attacker->attack($target);
            $this->describeAttack($attacker,$target,$damage);
            sleep(1);
        }
    }

    //Fait s'affronter tout les combattant dans la liste des combattant jusqu'a ce qu'il n'en reste qu'un seul
    public function deathFight(){
        
        while(count($this->fighters) > 1){

            $attacker = $this->chooseRandomFighter();
            $target = $this->chooseRandomFighter();
            $this->makeFightersAttack($attacker,$target);
            $this->checkDead();

         }

        $this->describeFightEnd($attacker);
    }

    //Méthode pour avoir accès à l'instance de la classe
    public static function getInstance() {
 
        if(is_null(self::$_instance)) {
          self::$_instance = new FightManager();  
        }
    
        return self::$_instance;
      }
}

?>