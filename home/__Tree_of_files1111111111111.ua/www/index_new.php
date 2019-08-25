<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('default_charset','UTF-8');
header('Content-Type: text/html; charset=utf-8');
// так отображаются все ошибки
//============================

$folder = 'new/';


    $files = scandir($folder, $sorting_order = SCANDIR_SORT_ASCENDING);
//scandir — Получает список файлов и каталогов, расположенных по указанному пути

 // foreach ($files as $file) {
 //        echo '<pre>';
 //        $a =  iconv ( "windows-1251", "utf-8",$file);
 //        // $fp = fopen($file, 'r');
 //        echo($a);
 //        fopen($folder.$a, 'rt');
        //copy ( string $file , string $file1 )
        //Копирует файл source в файл с именем dest.
        // fopen($folder.$file, 'rt');
// }

 
// $a1 = fopen($folder.$file, 'rt');
// var_dump($a1) ;

// $a1 = fopen(($folder.'1 - Стерилизация - ПРИМЕР'), 'rt');

        $b = $folder.'1 - steriliz';
        $a =  iconv ( "windows-1251", "utf-8",$b);
        echo $a, '<br>';
            $convert = array(
                'Sterilization' => 'Стерилизация',
                'EXAMPLE' => ' ПРИМЕР',
                'March' => 'Кастрация',
            
                'paraanal_sineus' => 'ПАС'
            );
          echo  ($data = strtr($a, $convert));


















 

 






?>