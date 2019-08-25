<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================

//FRONT CONTROLLER

//1.Общие настройки

//2.Подключение файлов системы
define('ROOT', dirname(__FILE__));
require_once(ROOT . '/components/Router.php');
//3.Установкс соединения с БД

//4.Вызов Router
$router = new Router();
$router->run();