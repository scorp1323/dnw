<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('default_charset','UTF-8');
header('Content-Type: text/html; charset=utf-8');
// так отображаются все ошибки
//============================

$folder = 'Shemi_Vasnetson_Marsel/';
$newFolder = 'Shemi_Vasnetson_Marsel_New/';








?>


<hr>
<?































//Дата и время на сервере
            $date = date('d F Y - H:i:s');
            $convert = array(
                'January' => 'января',
                'February' => 'февраля',
                'March' => 'марта',
                'April' => 'апреля',
                'May' => 'мая',
                'June' => 'июня',
                'July' => 'июля',
                'August' => 'августа',
                'September' => 'сентября',
                'October' => 'октября',
                'November' => 'ноября',
                'December' => 'декабря'
            );
            $server_date = strtr($date, $convert);





// ПОЛУЧАЕМ 
    $files = scandir($folder, $sorting_order = SCANDIR_SORT_ASCENDING);
    	
  ?><br><br>
  Сформировано: <b><?=$date?></b><br>



  В папке <?=$folder?> находятся такие файлы: <br><?

 foreach ($files as $file) {
    	echo '<pre>';
    	echo iconv ( "windows-1251", "utf-8",$file), '. ';

    	 if (!file_exists($newFolder)) {
    	 	mkdir($newFolder);
    	}
    	copy(($f = $folder.$file), ($f1 = $newFolder.$file) );
    	
    	 // }
    	// 1 - файл -> копировать с папка 1 в папка 2 
    	// 2 -  переименовать файл2
    	// $file1 = copy($file, $newFolder );
    	
    } 













?>
<HR>
 <?
// function showTree($folder, $space) {
//     $result = '';
//     // Получаем полный список файлов и каталогов внутри $folder
//     $files = scandir($folder, $sorting_order = SCANDIR_SORT_ASCENDING);
//     foreach($files as $file) {
 
 
 
//         // Отбрасываем текущий и родительский каталог
//         if (($file == '.') || ($file == '..')) continue;
//         $f0 = $folder.DIRECTORY_SEPARATOR.$file; //Получаем полный путь к файлу
 
 
 
//         //Если попадаются имена в Windows-1251 - кодируем их в UTF-8
// $charset = mb_detect_encoding($file);
// if ($charset == 'Windows-1251') {
// $file = iconv('Windows-1251', 'UTF-8', $file);
// }
 
//         //Преобразуем спецсимволы в именах в html-сущности:
//         $file = htmlspecialchars($file, ENT_QUOTES | ENT_SUBSTITUTE,'UTF-8');
//         // Если это директория
//         if (is_dir($f0)) {
//             // Выводим, делая заданный отступ, название директории
//             $result .= $space.$file.'&nbsp;&nbsp;<b><font color="#cc0000">&lt;DIR&gt;</font></b><br>'.PHP_EOL;
//             // С помощью рекурсии выводим содержимое полученной директории
//             $result .= showTree($f0, $space.'-');
//         }
//         // Если это файл, то просто выводим название файла
//         else $result .= $space.$file.'<br>'.PHP_EOL;
//     }
//     return $result;
// }
// // Запускаем функцию для текущего каталога, выводим верстку
// $data = showTree('.', '');
 
 
// //Дата и время на сервере
//             $date = date('d F Y - H:i:s');
//             $convert = array(
//                 'January' => 'января',
//                 'February' => 'февраля',
//                 'March' => 'марта',
//                 'April' => 'апреля',
//                 'May' => 'мая',
//                 'June' => 'июня',
//                 'July' => 'июля',
//                 'August' => 'августа',
//                 'September' => 'сентября',
//                 'October' => 'октября',
//                 'November' => 'ноября',
//                 'December' => 'декабря'
//             );
//             $server_date = strtr($date, $convert);
 
// $html_kode1 = "<html>
// <head>
// <meta http-equiv=\"content-type\" content=\"text/html; charset=UTF-8\">
// <title>viewing_contents_of_dir.php</title>
//     <!-- Запрещаем кеширование страницы: -->
//     <meta http-equiv=\"Cache-Control\" content=\"no-cache\">
//     <!-- Запрещаем индексировать страницу и переход по ссылкам: -->
//     <meta name=\"robots\" content=\"noindex, nofollow\"/>
// </head>
// <body alink=\"#000088\" bgcolor=\"#FFFFFF\" link=\"#0000FF\" text=\"#000000\"
// vlink=\"#FF0000\">
// Сформировано: " .$server_date."<br><br>
// <br>
// <h1>Дерево директорий и файлов:</h1><br><br>";
// $html_kode2 = " </body>
// </html>";
// $data2 = $html_kode1.$data.$html_kode2;
//  //Выводим в браузер содержимое страницы
// echo $data2;
// //Пишем в файл
// file_put_contents(__DIR__ . DIRECTORY_SEPARATOR . 'dir.html', $data2);