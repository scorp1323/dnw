<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
//  Сигнатура метода - это имя метода, число аргументов и типы аргументов (при исп. контроля типа)  ?>

Пример:
1 - <? public function hello($time, array $user) { } ?>
2 - <? public function hello($time, User $user) { } ?>

Сигнатура:
1 - для 1-го метода сигнатура это:
		а - название - hello
		б - к-во арг. - 2 ($time, array $user)
		в - тип 2-го арг. (array)
2 - для 2-го метода сигнатура это:
		а - название - hello
		б - к-во арг. - 2 ($time, User $user)
		в - тип 2-го арг. (объ. класса User(User $user))
