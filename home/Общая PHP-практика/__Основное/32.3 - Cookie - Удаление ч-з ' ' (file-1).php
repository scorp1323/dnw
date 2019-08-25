<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=================================================
if (isset($_POST['name']) && (!empty($_POST['name']))) {
	$name  = $_POST['name'];

	setcookie('name', $name, time() + 7000);
} elseif(isset($_COOKIE['name'])) {
	$name = $_COOKIE['name'];
} else {
	$name = 'Гость';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Страница index.php</title>
	<meta charset="UTF-8">
</head>
<body>
	<h1>Страница index.php</h1>
	<a href="page.php">Страница page.php</a><br><br>
	<p>Привет, <? echo $name ; ?> </p>
<form method="post">
	<input type="text" name="name" />
	<input type="submit">
</form>
</body>
</html>