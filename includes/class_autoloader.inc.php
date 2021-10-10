<?php

spl_autoload_register('classAutoloader');

function classAutoloader ($className){
    $path = "classes/";
    $extenstion = ".class.php";
    $fileName = $path . $className . $extenstion;

    if (!file_exists($fileName)){
        return false;
    }

    include_once $path . $className . $extenstion;
}