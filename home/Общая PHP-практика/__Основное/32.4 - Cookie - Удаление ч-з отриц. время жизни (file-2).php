<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=================================================
if(isset($_COOKIE['name'])) {
	// setcookie('name', '');
	// удаление ч\з указание пустого имени '' 
			$name = $_COOKIE['name'];
	setcookie('name', $name, time() -7);
	// ч\з указание отрицательного времени жизни куки
			if ($name < 1) {
				$name = 'Гость';
			}
} else  {
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
	<a href="index.php">Страница index.php</a><br><br>
	<p>Привет, <? echo $name ; ?> </p>
</body>
</html>