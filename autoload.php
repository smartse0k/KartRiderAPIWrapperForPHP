<?php
include_once dirname(__FILE__) . '/vendor/autoload.php';

spl_autoload_register(function($class) {
    include_once dirname(__FILE__) . "/{$class}.php";
});