<?php

// это фронт контроллер 

// общие настройки 

ini_set('display_errors', 1);
error_reporting(E_ALL);

// подключение файлов

define('ROOT', dirname(__FILE__));

require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/Autoload.php');

// bd connection 
require_once(ROOT.'/components/db.php');

// вызов роутера 
$router = new Router();
$router->run();