<?php
header('Content-Type: text/html; charset=utf-8');
// теперь можно писать на русском без кракозяблов
//======================================================

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=======================================================

// 0 - яблок
// 1 - яблоко
// 2 - яблока
// 3 - яблока
// 4 - яблока
// 5 - яблок
// 6 - яблок
// 7 - яблок
// 8 - яблок
// 9 - яблок
// 10 - яблок
// 11 - яблок
// 12 - яблок
// 13 - яблок
// 14 - яблок
// 15 - яблок
// 16 - яблок
// 17 - яблок
// 18 - яблок
// 19 - яблок
// 20 - яблок
// 21 - яблоко
// 22 - яблока
// 23 - яблока
// 24 - яблока
 // $ = ['яблок', 'яблока', 'яблоко'];
// переменная $m равна к-ву яблок




// $apl = 0;
// $apl_1 = $apl % 10;
// if (($apl == 0) && (20 >= $apl) && ($apl >= 5) ) {
// 	$res = 'яблок';
// } elseif (($apl == 1) && ($apl_1 ==1)) {
// 	$res = 'яблоко';
// } else {
// 	$res = 'яблока';
// }


$apl = 0;
while($apl <= 100){


$apl_1 = $apl % 10;
if (($apl == 0) && (20 >= $apl) && ($apl >= 5) ) {
	$res = 'яблок';
} elseif (($apl == 1) && ($apl_1 ==1)) {
	$res = 'яблоко';
} else {
	$res = 'яблока';
}




	echo $apl.'<br>';
	$apl++;
}
echo $res;