<?php
$folder = scandir("./models");

foreach ($folder as $file){
    $path = ("./models/" . $file);
    include_once($path);
}

?>