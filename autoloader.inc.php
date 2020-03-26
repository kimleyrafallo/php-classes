<?php
spl_autoload_register('autoloader');

function autoloader($className) {
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    if(strpos($url, 'includes') !== FALSE) {
        $path = "../classes/";
    }else{
        $path = "classes/";
    }
    $extension = ".class.php";
    $fullPath = $path . $className . $extension;

    if(!file_exists($fullPath)) {
        return FALSE;
    }
    include_once $fullPath;
}