<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
// GET ALL DATA -> array($publications)
// Собрать все нужные нам данные (публикации) и поместить их в один массив array($publications), кот. мы будем исп. в файле publication.php для вывода информации

// подключаем классы
include_once "classes.php";

// объявляем массив с результатом
$publications = array();

// connect to database
$con = mysqli_connect("localhost", "root", "", "testsite2");

if (mysqli_connect_errno() ) {
	echo "Не могу связаться с MySQL: " . mysqli_connect_errno();
} // else 'Есть связь с базой!!!'

// make query
$result = mysqli_query($con, "SELECT * FROM publication");

// work with result
while ($row = mysqli_fetch_array($result)) {
				$publications[] = new $row['type']($row) ;
			}


