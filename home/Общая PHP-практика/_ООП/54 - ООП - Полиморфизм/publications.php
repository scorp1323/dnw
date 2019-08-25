<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
//1 - подключаем файл "data.php", с которого получим массив с публикацией (и в него подключен файл с классами)
require_once "data.php";

// 2 - исп. для вывода массива  foreach
   foreach ($publications as $item) {
   		//в цикле для каждого объекта вызываем метод printitem()
   		$item -> printItem();
   		
   	
   }