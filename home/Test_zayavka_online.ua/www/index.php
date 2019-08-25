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
  <input type="text" name="name" placeholder="Введите имя"><br>

  Телефон<br>
  <input type="text" name="phone" placeholder="Введите телефон"><br>

 

  <p>Коментарии<Br>
   <textarea resize="none" name="comment" cols="40" rows="3"></textarea></p>
 
<button ><img id="logoKS_svg" src="images/KS_onli_logo.svg" alt="Картинка" 
          style="vertical-align: middle"  type="submit" value="Отправить" > Отправить</button>

<button ><img id="logoKS_svg" src="images/KS_onli_logo.svg" alt="Картинка" 
          style="vertical-align: middle"  type="submit" value="Отправить" > Очистить</button>


 </form>




 </body><br>

	











<!-- ========================================== -->

<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>

