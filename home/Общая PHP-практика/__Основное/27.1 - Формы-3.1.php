<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=================================================

include_once 'function.php';




if (isset($_GET['submit'])) {
	// если переменная $_GET['submit'] существует, значит - форма отправлена
	
	$a = $_GET['a']; 
	$b = $_GET['b'];
	$c = $_GET['c']; 

	if(!empty($a) && !empty($b) && !empty($c)) {
		$result = quadratic($a, $b, $c);
			if ($result != false) {
				print_r($result);
				echo '<br>';
			} else {
				echo 'Корней нет!! <br>';
			}
	}
		echo "Форма отправлена! <br> a = $a, b = $b, c = $c <br/>";
}

?>

<form action='index.php' method='get'>
	A: <input type='text' name='a'><br>
	B: <input type='text' name='b'><br>
	C: <input type='text' name='c'><br>
	<input type='submit' value='Отправить' name='submit'>
</form>
<!-- тег <form></form> - парный - в него помещаются все поля и кнопки -->
<!-- параметр формы action - его цель - 'index.php' - файл, на кот будем отправлять данные -->
<!-- method - get или post, - у нас- get -->
<!-- input type='text' - означает, что это именно текст, поля ввода, а не др. -->
<!-- name='a' - имя поля, чтобы отличать в какое поле какие данные были записаны -->
<!-- input type='submit' - кнопка отправить -->
<!-- name='submit' - имя ввода, чтобы отличать если их несколько - его браузер отправляет на сервер -->