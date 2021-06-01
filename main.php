<?php
$folder = scandir("./models/");

foreach ($folder as $file){
    if($file != "." && $file != ".."){
        $path = ("./models/" . $file);
        include_once($path);
    }
}

include_once("./FightManager.php");

$domeDuTonnerre = FightManager::getInstance();

$loic = new Human();
$loic->setName("Loïc");

$pierre = new Dwarf();
$pierre->setName("Pierre");

$yassine = new Orc();
$yassine->setName("Yassine");

$domeDuTonnerre->addToFight($loic);
$domeDuTonnerre->addToFight($yassine);
$domeDuTonnerre->addToFight($pierre);

$domeDuTonnerre->deathFight();

?>