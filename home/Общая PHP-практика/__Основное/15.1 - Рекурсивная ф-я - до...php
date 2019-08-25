<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//======================================================= 
 $arr = array(
 	'Автотехника' => array(              // lvl-1
 		'Вело' => array(				 // lvl-2
 			'Велосипеды' => array(		 // lvl-3
 			'(товар) Extrime' => 10,     // lvl-4
 			'(товар) Autor' => 4,		 // 4
 		),
 			'Самокаты' => 12,            // 3
 			),
 			'Авто' =>array(              // 2
 				'Opel' => array(         // 3
 					'(товар) Vivaro' => 5, // 4
 				),
 				'(товар) Honda' => 10,   // 3
 				'(товар) Audi' => 11,    // 3
 				),
 				'(товар) Аксесуары' => 7, //2
 			),
 			'Фототтехника' => array(      // 1
 				'(товар) Фотокамеры' => 6, // 2
 				'(товар) Видеокамеры' => 3, // 2
 			),
 			'(товар) Другое' => 3,       // 1
 		);

// var_dump(is_array($arr));
// echo '<br>';
// var_dump(is_array(55));
// echo '<br><br>';
$S = 0;

foreach ($arr as $lvl_1) {
	if (is_array($lvl_1)) {
		foreach ($lvl_1 as $lvl_2) {
			if (is_array($lvl_2)) {
				foreach ($lvl_2 as $lvl_3) {
					if (is_array($lvl_3)) {
						foreach ($lvl_3 as $lvl_4) {
							if (is_array($lvl_4)){
								echo '<pre>';
								print_r($lvl_4);
								echo '<pre>';
						} else {
							$S += $lvl_4;
						}
					}
					} else {
						$S += $lvl_3;
					}
				}
			} else {
				$S +=$lvl_2;
			}
		}
	} else {
		$S += $lvl_1;
	}
}
echo  '<hr>' . $S ;