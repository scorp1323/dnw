<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=================================================
 // куки нельзя сохранить в виде массива, а можно только в виде строки
 // используем ф-ю serialize() для перевода  массива в интересную строку и ф-ю unserialize() для перевода интересной строки в массив
 $arr = ['name' => 'Sergiy', 'surname' => 'Taranov', 'sity' => "Odessa"];
 $result = serialize($arr);
 var_dump($result);
 // string(82) "a:3:{s:4:"name";s:6:"Sergiy";s:7:"surname";s:7:"Taranov";s:4:"sity";s:6:"Odessa";}"
 
 // так как это простая строка, - ее можно теперь сохранить в куки
setcookie('arr', $result);

?>
<p><a href="page.php">Страница page.php</a></p>
 
