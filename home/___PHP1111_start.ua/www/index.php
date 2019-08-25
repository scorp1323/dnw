<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================

//FRONT CONTROLLER 

//1. Общие настройки

//2. Подключение файлов системы
define('ROOT', dirname(__FILE__));
//полный путь к файлу на диске с помощью ф-ии dirname() и псевдоконстанты __FILE__  ->  dirname(__FILE__)
require_once(ROOT.'/components/Router.php');
require_once(ROOT.'/components/Db.php');


//3. Установка соединения с БД
//Пока пропустим

//4. вызов Router - вызов Роутера

$router = new Router;
$router -> run();

//запускаем метод run(), тем самым передав на него управление
// -> Класс Router, метод run