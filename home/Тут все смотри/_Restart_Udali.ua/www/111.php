<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
header('Content-type: text/html; charset=utf-8');
#include_once "basa/connection_db.php";
include_once 'basa/proba.php';

 //Подключаем файл всех составляющих в виде переменных
 include_once "implementer/implementer.php";

$a = '<p>Текст1</p> <p>Текст2</p>';
$b = htmlentities($a);

echo $a;
echo $b;

$c = html_entity_decode($b);
echo $c;



?>
