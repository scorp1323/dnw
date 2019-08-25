<?php
//так всегда начинается php код(файл)
//=====================================================
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//======================================================= 
$day = 8;

if ($day == 1) {
	echo 'Понедельник';
} elseif ($day == 2) {
	echo 'Вторник';
} elseif ($day == 3) {
	echo 'Среда';
} elseif ($day == 4) {
	echo 'Четверг';
} elseif ($day == 5) {
	echo 'Пятница';
} elseif ($day == 6) {
	echo 'Суббота';
} elseif ($day == 7) {
	echo 'Воскресенье';
} else {
	echo 'Неверный день';
}
echo '<hr>';

//=======================
//То же самое, но с switch-case
$day = 8;

switch ($day) {
	case 1: echo $day . '-'; echo 'Понедельник';  break;
	case 2: echo $day . '-'; echo 'Вторник'    ;  break;
	case 3: echo $day . '-'; echo 'Среда'      ;  break;
	case 4: echo $day . '-'; echo 'Четверг'    ;  break;
	case 5: echo $day . '-'; echo 'Пятница'    ;  break;
	case 6: echo $day . '-'; echo 'Суббота'    ;  break;
	case 7: echo $day . '-'; echo 'Воскресенье';  break;
	default : echo $day . '-' . 'Неверный день';
}