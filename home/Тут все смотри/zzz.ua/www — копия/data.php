<?php
//так всегда начинается php код(файл)
//=====================================================

header('Content-Type: text/html; charset=utf-8');
// теперь можно писать на русском без кракозяблов
//======================================================

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//======================================================= 
// GET ALL DATA -> array($publications
// Собрать все данные = публикации и поместить их в массив, кот.будем использовать в др.файле уже для вывода информации)

//подключаем файл с классами
require_once 'classes.php';

//обьявляем массив, кот.будет содержать результат(пока пустой)
$publications = array();


// connect to database
$con = mysqli_connect("localhost", "root", "", "testsite2");

if (mysqli_connect_errno() ) {
	echo "Не могу связаться с MySQL: " . mysqli_connect_errno();
}

// make query
// делаем запрос
$result = mysqli_query($con, "SELECT * FROM publication ");


//work with results
//работаем с результатами
while ($row = mysqli_fetch_array($result) ) {
	
	$publications[] = new $row['type']($row);
}

 


