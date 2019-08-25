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
include_once '../horisontell_meny.php';



echo "<link rel='stylesheet' href='style.css'>";

if(count($_POST) > 0) {
	$name = trim($_POST['name']);
	$phone = trim($_POST['phone']);
	$dt = date("Y-m-d H:I:s");

	if(strlen($name) < 4 ) {
		$msg = 'Нужно имя подлинее';
	}


	elseif(strlen($phone) < 7 ) {
		$msg = 'Нужно цыфр подлиннее, потерялось пару!!';
	}


	elseif(!is_numeric($phone)) {
				$msg = 'Поле с номером телефона - тольцо цыфры!!';
		}
		else{ 
	# mail("scorp1323@gmail.com", "My Subjekt", "Line 1\nLine 2\nLine 3");
	# скрипт отправки на почту, его надо проверить
	file_put_contents('apps.txt', "$dt - | - $name - | - $phone\n", FILE_APPEND);
	$msg = 'Ваша заявка принята, ожидайте звонка!';
}
}
		else{
			$name = '';
			$phone = '';
			$msg = 'Привет! Заполни поля и нажми кнопку Отправить';
			# если человек пришел методом GET - получает сообщение $msg 
		}
?>


<form method="post">
	Имя<br>
	<input type="text" name="name" placeholder="Введите имя" class="с_3" value="<?php echo $name;?>"><br>
	Телефон<br>
	<input type="text" name="phone" placeholder="Введите телефон" class="с_3" value="<?php echo $phone; ?>"><br>
	<input type="submit" value="Отправить" class="B_2">
	<input type="reset" value="Сбросс" id="a_1">
	</form> 


<?
echo $msg;

include_once '../footer.php';
?>


