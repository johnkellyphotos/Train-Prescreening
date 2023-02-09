<?php

spl_autoload_register(function ($className) {
    $className = str_replace( '\\' , '/' , $className);
    try {
        if (file_exists($className . '.php')) {
            include $className . '.php';
        } else {
            throw new Exception("Class $className could not be found!");
        }
    } catch (Exception $e) {
        echo "Unable to load class '$className' - " . $e->getMessage() . " \n";
        exit;
    }
});