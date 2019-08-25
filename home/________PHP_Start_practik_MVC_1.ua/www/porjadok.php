<?php
1. Создаем папки в основной папке:
 - controllers
 - models
 - views
2. Создаем файлы в основной папке:
    - .htaccess
    - index.php

3. Создаем файл Router.php в папке components
4. Создаем пустой класс Router в файле Router.php

5. Подключение файлов системы

//полный путь файла на диске при пом. ф-ии irname() и псевдоконстанты __FILE__
define('ROOT', dirname(__FILE__));
//подключение файла с классом Router
require_once(ROOT . '/components/Router.php');

6. В классе Routs создаем:
 -  свойство   private $routes;  - массив в кот. будут хранится маршруты
 -  пустой метод   public function __construct() { }
 - пустой метод public function run() {}, кот. будет принимать управление от фронтконтроллера с проверкой echo 'Class Router, method run';

  class Router 
  {  
  private $routes;
  public function __construct() { }
  public function run() { echo 'Class Router, method run';}
  }

7. В нашем фронтконтроллере (ФК) index.php создаем екземпляр класса Router и запускаем метод run(), передав на него управление

$router = new Router();
$router->run();
//выведет  'Class Router, method run'


8. Создаем папку config с файлом routes.php в кот. будут хранится роуты - представляют из себя пару в массиве и состоят из:
 - запроса - то, что набирает в адресной строке пользователь
 - и строку, по кот. мы узнаем, где обрабатывается запрос 

 return array(
    'news' => 'news/index',
    //будет вызван метод actionindex в NewsController
    'products' => 'products/list',
    //будет вызван метод actionList в ProductController
 );
 //тут мы сами решаем каакой метод и какого контроллера будет обрабатывать етот запрос на етапе разработки сайта
 

 9. Заставить класс Router прочитать маршруты и помнить на время выполнения кода
 В $routes; будут хранится маршруты
 В  public function __construct() {}  мы прочитаем и запомним роуты

 23.59 - пишем 2 строки...