<?php
$folder = scandir("./models/");

foreach ($folder as $file){
    if($file != "." && $file != ".."){
        $path = ("./models/" . $file);
        include_once($path);
    }
}

include_once("./Fight.php");

$dudu = new Fight();

$loic = new Human();
$loic->setName("Loïc");

$pierre = new Human();
$pierre->setName("Pierre");

$dudu->deathFight($loic,$pierre);

?>