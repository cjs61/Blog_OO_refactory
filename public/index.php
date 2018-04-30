<?php 

session_start();

require '../app/Autoloader.php';
App\Autoloader::register();

$posts = App\App::getTable('Posts');

var_dump($posts);


