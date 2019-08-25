<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
ini_set('default_charset','UTF-8');
header('Content-Type: text/html; charset=utf-8');
// так отображаются все ошибки
//============================

$folder = 'Shemi_Vasnetson_Marsel/';








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

    	 
    	
    	 // }
    	// 1 - файл -> копировать с папка 1 в папка 2 
    	// 2 -  переименовать файл2
    	// $file1 = copy($file, $newFolder );
    	
    } 













?>