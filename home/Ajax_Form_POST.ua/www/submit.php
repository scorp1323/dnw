<?php
header('Content-type: text/html; charset=utf-8');
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
if (!empty($_POST['name']) AND !empty($_POST['email']) AND !empty($_POST['message']) AND !empty($_POST['phone'])) {

		$headers = 'From: Таранов Сергей' . '\r\n' .
								'Replay-To: scorp1323@gmail.com' . '\r\n' .
								'X-Mailer: PHP/' . phpversion();

		$email = 'scorp1323@gmail.com';

		$theme = 'Новая тема';

		$letter = 'Привет, это проверочное письмо - если оно тебе пришло - Сережа МОЛОДЕЦ - научился отправлять письма с PHP';
		$letter .= 'Имя:'. $_POST['name'] . '\r\n';
		$letter .= 'Email:'. $_POST['email'] . '\r\n';
		$letter .= 'Телефон:'. $_POST['phone'] . '\r\n';
		$letter .= 'Сообщение:'. $_POST['message'] . 'r\n';

	if ( mail($email, $theme, $letter, $headers)){
			header('Location:/Ajax_Form_POST/thankyou.php');
	} else {
				header('Location:/');
	}
} else {
		header('Location:/');
}