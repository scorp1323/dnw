<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=====================================
?>

<p>Вопрос-1:</p>
<p> 2 + 2 = ? </p>

<form action="task2.php" method ="post">
	<input type="text" name="answer1" />
	<input type="submit" />
</form>