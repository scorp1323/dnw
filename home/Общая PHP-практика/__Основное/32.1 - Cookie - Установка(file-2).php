<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=================================================
if(isset($_COOKIE['name'])) {
	$name = $_COOKIE['name'];
} else {
	$name = 'Гость';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Страница page.php</title>
</head>
<body>
	<h1>Страница page.php</h1>
	<a href="index.php">Страница index.php</a>
	<p>Привет, <? echo $name ; ?> </p>
</body>
</html>