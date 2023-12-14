<?php
class Autoloader {
    public static function register() {
        spl_autoload_register(function ($class) {
            if(file_exists("Controller/".$class .".php")) {
                require_once "Controller/".$class .".php";
            }
            if(file_exists("Model/".$class . ".php")){
                require_once "Model/".$class . ".php";
            }
        });
    }
}
Autoloader::register();