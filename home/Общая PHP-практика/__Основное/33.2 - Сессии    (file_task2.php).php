<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=====================================

session_start();
// $_SESSION

$answer1 = $_POST['answer1'];
	echo $answer1;
// получ. рез. вопроса №1 от task1.php, отправленного ч\з post и присваиваем ему $answer1, но когда мы перейдем к вопросу №3, то это значение будет потеряно. ДЛя этого сохраняем его в сессии
// сессия открывается (если уже есть) или создается (если ее еще нет)

$_SESSION['answer1'] = $answer1 ;

?>

<p>Вопрос-2:</p>
<p> 3 * 5 = ? </p>

<form action="task3.php" method ="post">
	<input type="text" name="answer2" />
	<input type="submit" />
</form>