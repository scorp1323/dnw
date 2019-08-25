<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=================================================
function quadratic($a, $b, $c) {
	$d = ($b * $b) -  (4 * $a * $c);
		if ($d < 0) {
			return false;

		} elseif ($d == 0) {
			$x = -$b / (2 * $a);
			return $x;
		} elseif ($d > 0) {
			$x1 = (-$b - sqrt($d)) / (2 * $a);
			$x2 = (-$b + sqrt($d)) / (2 * $a);
		return array('x1' => $x1, 'x2' => $x2);
		}
}