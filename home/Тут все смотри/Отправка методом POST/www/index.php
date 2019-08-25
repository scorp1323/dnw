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
?>
<h2>Отправка методом POST</h2>







<form action="index.php" method="get">
	A: <input type="text" name="a"><br>
	B: <input type="text" name="b"><br>
	C: <input type="text" name="c"><br>
	<input type="radio"  name="gender" value="Male" checked>Мужчина<br>
	<input type="radio"  name="gender" value="Female">Женщина<br>


	<input type="checkbox"  name="trensport[]" value="Bike">Велосипед<br>
	<input type="checkbox"  name="trensport[]" value="Car">Машина<br>
	<input type="checkbox"  name="trensport[]" value="OnFeet">Пешком<br>


	<input type="password"  name="password">
	<input type="reset" value="Сброс" name="reset">
	<input type="submit" value="Тук-тук" name="submit">
</form>