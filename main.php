<?php

include_once("./FightManager.php");

$folders = scandir("./models/");

foreach ($folders as $folder){

    if(is_dir("./models/".$folder) && $folder != "." && $folder != ".."){
        $subfolder = scandir("./models/".$folder);

        foreach($subfolder as $file){

            if($file != "." && $file != ".."){

                $path = ("./models/".$folder."/".$file);
                include_once($path);
                
            }
        }
    }
}


$domeDuTonnerre = FightManager::getInstance();

$domeDuTonnerre->addToFight(new Human("Loïc", new Rogue()));
$domeDuTonnerre->addToFight(new Dwarf("Pierre", new Warrior()));
$domeDuTonnerre->addToFight(new Orc("Yassine", new Warrior()));

$domeDuTonnerre->deathFight();

?>