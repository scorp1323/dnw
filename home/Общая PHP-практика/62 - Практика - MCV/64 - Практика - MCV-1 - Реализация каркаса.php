<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
//  64 - Реализация каркаса ?>

FRONT CONTROLLER
1. Общие настройки
2. Подключение файлов системы
3. Установка соединения с БД
4. вызов Router


ПЕРЕД НАЧАЛОМ
Создаем структуру папок и файлов (есть в файле 61-Патерн MCV.php).
Если все ок - все запросы идут на index.php (проверь!!!)


//1. Общие настройки <?
ini_set('display_errors', 1);
ini_set('error_reporting', E_ALL); ?>


//2. Подключение файлов системы
1 - создаем папку components в основе сайта (рядом с папками controllers, models, views и файлами index.php и .htaccess)
2 - в папке components создаем файл Router.php
3 - в файле Router.php пишем класс Router <?
class Router {
  // код пиши тут
}   ?>
4 - в файле index.php добавляем 2 строки для подключения файлов: <?
    define('ROOT', dirname(__FILE__));
    //полный путь к файлу на диске с помощью ф-ии dirname() и псевдоконстанты __FILE__  ->  dirname(__FILE__)
    require_once(ROOT.'/components/Router.php'); ?>
Проверка: <?
echo ROOT; // Z:\home\___PHP_start.ua\www  ?>



//3. Установка соединения с БД - пока пропустим


//4. вызов Router
1 - кратко опишем роутер (Router.php) <?
class Router {  
  private $routes;// массив, в кот. будут хранится маршруты
  public function __construct() { } // пока пустой
  public function run() {
      // принимает управление от FC
      echo 'Класс Router, метод run';
      // сообщ. для проверки работы - удали после проверки
  }  } ?>
  Работа с FC закончена.
ПРОВЕРКА:
 - в FC(index.php) создаем екз. кл. Router и вызываем метод run(), передав на него управление  <?
     $router = new Router;
     $router -> run();  ?>
   Если правильно работает -> 'класс Router, метод run'

2 - Разбираемся с Роутером (Router.php)
2.1) Маршруты.
Хранятся в массиве $routes в отдельногм файле routes.php (удобно), который будем хранить в папке config(создаем)(рядом с components, controllers, models, views)
2.2) В файле routes.php пишем Роуты - являют собой пару в массиве и состоят из запроса news - то, что набирает в адресной строке пользователь, и строки news/index, по которой мы узнаем, где обрабатывается запрос <?
return array(
'news' => 'news/index', // actionIndex в NewsController
'products' => 'product/list', //actionList в ProductController
); ?>
Здесь мы использовали интересный прием - возвращаем в файле массив return array() - позже увидим, зачем...


Анализ запроса и определение обработчика:
 - с пом. наших роутов увидим, что запросу news соотв. строка news/index, кот. означает, что будет вызван метод actionIndex в контроллере NewsController
- точно также мы увидим, что запросу products соотв. строка product/list, кот. означает, что будет вызван метод actionList в контроллере ProductController.
    Тут мы сами решаем, какой контроллер и какой метод
 этого контроллера будет обрабатывать запрос - делаем это на етапе разработки сайта.
    Пока эти маошруты простые, позже - добавим в них детали
 для увелич. функционала



2.3) Маршруты есть - надо заставить Роутер прочитать их и помнить на время выполнения кода.
Для хранения маршрутов мы создали свойство класса $routes и конструктор public function __construct(), в кот. мы прочитаем и запомним Роуты.
В Router.php пишем 2 строки:  <?
public function __construct() {
  $routesPath = ROOT.'/config/routes.php';
      // указываем путь к роутам - путь к базовой директории ROOT и путь к созданому файлу с роутами config/routes.php
      $this->routes = include($routesPath);
      //присваиваем свойству routes массив, кот. хранится в файле routes.php - теперь наше свойство попадет в нужный нам массив
  }  ?>
Проверяемнаше свойство routes, обратившись к нему в методе run() (Router.php) <?
  public function run() {
      print_r ($this->routes);
      // Проверяемнаше свойстао routes
      // Array ( [news] => news/index [products] => product/list )
      // принимает управление от FC
      echo 'Класс Router, метод run<br>';
      // сообщение для проверки работоспособности
  }   ?>


Реализуем метод run():
Отвечает за анализ запроса и передачу управления.
1 - получить строку запроса
2 - проверить наличие такого запроса в routers.php
3 - если есть совпадение, определить, какой контроллер и action обрабатывают запрос
4 - подключить файл класса-контроллера
5 - создать объ., вызвать метод (т.е. action)

1 - получить строку запроса.

В файле routes.php пишем Роуты - являют собой пару в массиве и состоят из запроса news - то, что набирает в адресной строке пользователь, и строки news/index, по которой мы узнаем, где обрабатывается запрос <?
return array(
'news' => 'news/index', // actionIndex в NewsController
'products' => 'product/list', //actionList в ProductController
); ?>
Здесь мы использовали интересный прием - возвращаем в файле массив return array() - позже увидим, зачем...

Анализ запроса и определение обработчика:
 - с пом. наших роутов увидим, что запросу news соотв. строка news/index, кот. означает, что будет вызван метод actionIndex в контроллере NewsController
- точно также мы увидим, что запросу products соотв. строка product/list, кот. означает, что будет вызван метод actionList в контроллере ProductController.
    Тут мы сами решаем, какой контроллер и какой метод
 этого контроллера будет обрабатывать запрос - делаем это на етапе разработки сайта.
    Пока эти маошруты простые, позже - добавим в них детали
 для увелич. функционала


2 - проверить наличие такого запроса в routers.php

Маршруты у нас есть, теперь нужно заставить класс Router прочитать их и помнить на время выполнения кода.(23:46)
  Для хранения маршрутов у нас создано свойство скасса $routes(class Router, Router.php) и конструктор function __construct() { }, в кот. прочитаем и запомним Роуты.
Пишем 2 строки: <?
public function __construct() {
  //указываем путь к Роутам
  $routesPath = ROOT. '/config/routes.php';
    // ROOT - путь к базовой директории
    // '/config/routes.php' - путь к созданому файлу с роутами
    
      $this -> routes = include($routesPath);
        // Присваиваем свойству $routes массив, кот. хранится в файле routes.php при пом. include - теперь в наше свойство попадет нужный нам массив

}  ?>
echo 'класс Router, метод run';
    // сообщ. для проверки работы - удаляем

Проверяем свойство $routes, обратившись к нему в методе run() <?
  public function run() { 
     print_r($this->routes);
     echo 'Класс Router, метод run()';
      //Проверяем свойство $routes, обратившись к нему в методе run()?>
Выведет - Array ( [news] => news/index [products] => product/list ) Класс Router, метод run()  (24:42)

Удаляем строки проверки.

Реализуем сам метод run(). <?
public function run() {     
  // 1 - получить строку запроса
  if (!empty($_SERVER['REQUEST_URI'])) {
    $uri = trim($SERVER['REQUESR_URI'], '/');
  }
  echo $uri;
  // 2 - проверить наличие такого запроса в routers.php
  // 3 - если есть совпадение, определить, какой контроллер и action обрабатывают запрос
  // 4 - подключить файл класса-контроллера
  // 5 - создать объ., вызвать метод (т.е. action)
  }  ?>

// 1 - Получить строку запроса  



<?
public function run() {
   // 1 - получить строку запроса
  if (!empty($_SERVER['REQUEST_URI'])) {
    $uri = trim($_SERVER['REQUEST_URI'], '/');
  } echo $uri;  }
//Выведет то же, что введем в строку запроса ?>

 Проверяем - в строку запроса вводим что-то - получаем на выходе тоже, но без "/".
 Так как знаем ООП - делаем красивее - выносим этод код в отдельный приватный метод для реализации инкапсуляции, так как обращаться к этому методу будем только из класса Router <?
//метод возвращает строку запроса
  private function getURI() {
    if (!empty($_SERVER['REQUEST_URI'])) {
    return trim($_SERVER['REQUEST_URI'], '/');
  } } ?>
И обратимся к етому методу в run() <?
public function run() {
  $uri = $this -> getURI();
    echo $uri;  }
// Выведет то же, что и пред код - строку запроса?>
getURU() сделали приватным, так как обращ. к нему будем только в пределах класса - run()  28:20

// 2 - проверить наличие такого запроса в routers.php
(проверяем запрос, кот.  = $uri ) циклом <?
public function run() {
  $uri = $this -> getURI();
    echo $uri;
        // 2 - проверить наличие такого запроса в routers.php

foreach ($this->routes as $uriPattern => $path) {
  echo "<br>$uriPattern -> $path";
}
// ffgc./ergwerg - строка запроса
// news -> news/index
// products -> product/list ?>
для каждого маршрута в нашем массиве помещаем в переменную $uriPattern строку запроса 'news' из роута (routes.php), а в переменную $path помещаем путь обработчика 'news/index' 


Теперь Сравниваем строку запроса $uriPattern и данные, кот. содерж. в Роутах - $uri  <?
if (preg_match("~$uriPattern~", $uri)) {
  echo '+';
}////////Выглядит так: (еще удаляем echo $uri)

public function run() {
  $uri = $this -> getURI();
foreach ($this->routes as $uriPattern => $path) {
  if (preg_match("~$uriPattern~", $uri)) {
  echo '+';
} } }  ?>

// 3 - Если есть совпадение, определить, какой контроллер и action обрабатывают запрос, 
для етого исп. explode() (вместо   echo $path;) <?
$segments = explode('/', $path);
  echo '<pre>';
  print_r($segments);
  echo '<pre>';
// Array
// (
//     [0] => product
//     [1] => list
// )  ?>
Т.е. мы разделили строку на 2 части по '/' :
  1-й - принадлежит контроллеру
  2-й принадлежит екшену

Получаем имя контроллера:  <?
$controllerName = array_shift($segments).'Controller';
//array_shift — извлекает первый элемент массива ?>
Проверяем:  <?
echo $controllerName; 
//productController  ?>
получили название, но с малой буквы - а надо с большой!!
Сделаем привод к большой с пом. ucfirst()  <?
$controllerName = ucfirst($controllerName);  ?>

Получаем назв. Екшена:  <?
$actionName = 'action'.ucfirst(aray_shift($segments));
//actionList  ?>

Меняем проверки: <?
echo '<br>Класс: '.$controllerName;
echo '<br>Метод: '.$actionName;
//Класс: ProductController
//Метод: actionList  ?>

Проверяем еще раз /news и /products <?
//Класс: ProductController  Метод: actionList
//Класс: NewsController  Метод: actionIndex ?>

Описываем еще несколько методов, что-бы было что вызывать:
В файлах NewsController и ProductController добавляем по классу с методами с возвратом true <?php
//В файле NewsController.php
class NewsController {
  public function actionIndex() {
    return true;
  }
}
//В файле ProductController.php
class ProductController {
  public function actionList() {
    return true;
  }
}  ?>

Продолжаем работу над роутером.(34;25)
// 4 - подключить файл класса-контроллера <?
$controllerFile = ROOT . '/controllers/' . $controllerName . '.php'  ;
//определяем файл, кот. необх. подключить = КОРЕНЬ(ROOT).ПУТЬ.ИМЯ_КЛАССА.PHP)
if (file_exists($controllerFile)) {
  //если существует файл класса-контроллера - подключаем его
  include_once($controllerFile);
}  ?>


// 5 - создать объ., вызвать метод (т.е. action)
Создаем обьект класса-контроллера <?

$controllerObject = new $controllerName;
//вместо имени класса подст. $, кот. содержит строку с его именем
$result = $controllerObject -> $actionName();
//для етого обь. вызываем метод, кот. содержится в строке с назв.нужного метода
if ($result != null) {
  break;
}






