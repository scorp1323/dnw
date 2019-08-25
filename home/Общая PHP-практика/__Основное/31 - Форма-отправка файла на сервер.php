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
	echo '<pre>';
		print_r($_FILES);
	echo '</pre>';
}

//  Получим:
// массив
// (
//     [отправить] => Отправить
// )
// массив
// (
//   [файл] => Массив
//     (
//       [имя] => favicon.ico - имя файла
//       [type] => image / x-icon - тип файла
//       [tmp_name] => Z: \ tmp \ php3176.tmp - временное имя,  с которым файл загружен на сервер и адресс, где его можна найти - этот адресс можно использовать - перемещать, переназывать, копировать, пересохранять, обрезать, изменять...
//       [error] => 0 - ошибок при загрузке
//       [размер] => 4582 - размер файла
//     )

// )

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>INPUT TYPES</title>
	<meta charset="UTF-8">
	<meta name='viewport' content='width-device-vidth', initial-scale='1.0'>
	
</head>
<body>
	<form action="index.php" method="post" enctype="multipart/form-data">
	<!-- обязательное условие - указать enctype="multipart/form-data"  - говорит браузеру, что, кроме текста, могут быть переданы и файлы-->
		<p>Загрузить фото:</p>
		<input type="file" name="file"><br>


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