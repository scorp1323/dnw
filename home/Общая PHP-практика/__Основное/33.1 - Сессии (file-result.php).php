<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=====================================

print_r($_POST);
// проверяем, есть ли что в $_POST
echo '<br>';

$answer3 = $_POST['answer3'];
// выводим это на екран (= ответ на 3-й вопрос)
	echo $answer3;
?>

<p>Ваш результат: </p>