<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//======================================================= 
function howManyTimes() {
	  $a = 0;
	echo ++$a, '<br>';
}
howManyTimes(); //выведет 1
howManyTimes(); //выведет 1
howManyTimes(); //выведет 1
echo '<hr>';
// выведет 1 1 1, так как $a каждый раз уничтожается и вызывается заново при новом вызове ф-ии
//==================================

function countFuncColl() {
	static $b = 0;
	echo ++$b, '<br>';
}
countFuncColl();
countFuncColl();
countFuncColl();
// выведет 1 2 3, так как $a статична - сохраняется, а не уничтожается