<?php
header('Content-type: text/html; charset=utf-8');
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================


?>
<html>
	<body>
		<form action="/Ajax_Form_POST/submit.php" method="POST">
		 <input type="text" name="email" placeholder="Email"><br>
		 <input type="text" name="name" placeholder="Имя"><br>
		 <input type="text" name="phone" placeholder="Телефон"><br>
		 <textarea name="message" placeholder="Сообщение" rows= "6" cols = "22"></textarea><br>
		 <input type="submit" value="Отправить сообщение">
		</form>
	</body>
</html>