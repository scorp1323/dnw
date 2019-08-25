<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=================================================

if (isset($_POST['submit'])) {
	// если переменная $_GET['submit'] существует, значит - форма отправлена
	
		echo '<pre>';
			print_r($_POST);
		echo '</pre>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>INPUT TYPES</title>
	<meta charset="UTF-8">
	<meta name='viewport' content='width-device-vidth', initial-scale='1.0'>
	
</head>
<body>
	<form action="index.php" method="post">
		<p>Введите имя и фамилию:</p>
		<!-- тип-текст (обычный текст) -->
		<input type="text" name="firstname"><br>
		<input type="text" name="lastname"><br>
		<input type="password" name="password"><br>

		<!-- тип-"checkbox" (выбор-галочка) -->
		<input type="checkbox" name="transport[]"
		value="Bike">Велосипед<br>
		<input type="checkbox" name="transport[]" value="Car">Машина<br>
		<input type="checkbox" name="transport[]" value="OneFeet">Пешком<br>


		<!-- тип-"radio" (выбор-точка) -->
		<input type="radio" name="gender" value="Male" checked >Мужчина<br>
		<input type="radio" name="gender" value="Female">Женщина<br>

		<!-- тип-"select" (выбор-список) -->
		<p>Выберите город</p>
		<select name="list">
			<option value="London">Лондон</option>
			<option value="Kiev">Киев</option>
			<option value="Odessa">Одесса</option>
		</select>
		<br>

		
		<!-- тип-"кнопки" (сбросс и отправка) -->
		<input type="reset" value="Очистить форму">
		<input type="submit" value="Отправить" name="submit"><br>

	</form>

<!-- тег <form></form> - парный - в него помещаются все поля и кнопки -->
<!-- параметр формы action - его цель - 'index.php' - файл, на кот будем отправлять данные -->
<!-- method - get или post, - у нас- get -->
<!-- input type='text' - означает, что это именно текст, поля ввода, а не др. -->
<!-- name='a' - имя поля, чтобы отличать в какое поле какие данные были записаны -->
<!-- input type='submit' - кнопка отправить -->
<!-- name='submit' - имя ввода, чтобы отличать если их несколько - его браузер отправляет на сервер -->
	
</body>
</html>