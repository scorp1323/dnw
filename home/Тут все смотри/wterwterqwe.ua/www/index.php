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

echo "<link rel='stylesheet' href='style.css'>"; 

if(count($_POST) > 0) {
	$name = trim($_POST['name']);
	$phone = trim($_POST['phone']);

	$comment = trim($_POST['comment']);

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

		elseif(strlen($comment) < 7 )
		{
				$msg = 'Распишите подробнее коментарий (или, если есть,проблему)!!';
		}


		else{ 
	# mail("scorp1323@gmail.com", "My Subjekt", "Line 1\nLine 2\nLine 3");
	# скрипт отправки на почту, его надо проверить
	file_put_contents('apps.txt', "$dt - | - $name - | - $phone - | -  $comment\n", FILE_APPEND);
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

<div class="OnlineCallOrder">
<form method="post">
	Имя<br>
	<input type="text" name="name" placeholder="Введите имя" class="с_3" value="<?php echo $name;?>"><br>

	Телефон<br>
	<input type="text" name="phone" placeholder="Введите телефон" class="с_3" value="<?php echo $phone; ?>"><br>
	<input type="submit" value="Отправить" class="B_2">
	<input type="reset" value="Сбросс" id="a_1">

	<p>Коментарии<Br>
   <textarea name="comment" resize="none" placeholder="Опишите проблему или цель обращения"
  value="<?php echo $comment ?>" cols="40" rows="3"></textarea></p>

	</form> 
</div>







<?
echo $msg;
?>
<?
include('stat.php');
?>
<!-- ========================================== -->

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

