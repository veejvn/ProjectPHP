<?php

session_start();

define("BASE_PATH", __DIR__);
define("ENCRYPTION_KEY", "!@#_________#@!");

require("../vendor/autoload.php");

use Illuminate\Config\Repository;

$configPath = BASE_PATH . DIRECTORY_SEPARATOR . "config" . DIRECTORY_SEPARATOR;

$config = new Repository();

foreach(glob($configPath . "*.php") as $configFile){
    $config->set(
        basename($configFile, ".php"),
        require_once("$configFile")
    );
}

$routesPath = BASE_PATH . DIRECTORY_SEPARATOR . "routes" . DIRECTORY_SEPARATOR;

foreach(glob($routesPath . "*.php") as $phpFile){
    require_once("$phpFile");
}

$dbConfig = $config->get("app.db");

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection($dbConfig);

$capsule->setAsGlobal();

$capsule->bootEloquent();

?>