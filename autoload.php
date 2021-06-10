<?php
spl_autoload_register(function($class) {
    $class = str_replace('\\', '/', $class);

    $path = dirname(__FILE__) . "/{$class}.php";
    if(file_exists($path)) {
        include_once $path;
    }
});