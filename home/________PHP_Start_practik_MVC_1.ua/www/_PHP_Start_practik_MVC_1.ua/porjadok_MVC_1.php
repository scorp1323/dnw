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
    'products' => 'product/list',
    //будет вызван метод actionList в ProductController
 );
 //тут мы сами решаем каакой метод и какого контроллера будет обрабатывать етот запрос на етапе разработки сайта
 

 9. Заставить класс Router прочитать маршруты и помнить на время выполнения кода
 В $routes; будут хранится маршруты
 В  public function __construct() {}  мы прочитаем и запомним роуты (Router.php)
 23.59 - пишем 2 строки:
   public function __construct() {
    $routesPath = ROOT . '/config/routes.php';
    //1 - путь к роутам (через баз. директорию ROOT)
    $this -> routes = include($routesPath);
    //присваиваем свойтсву routes(без $ при обращении с $this) массив, кот. хранится в файле routes.php при помощи include(...);
  }
  теперь в наше свойство routes попадет нужный нам массив с роутами с routes.php
Проверяем свойство router, обратившись к нему в методе run() (Router.php):
public function run() {
    print_r($this->routes);
      echo 'Class Router, method run';  }
//выведет массив роутов и работу run() - Array ( [news] => news/index [products] => products/list ) Class Router, method run


10. Файл настроек .htaccess:

AddDefaultCharset utf-8
#Кодировка
RewriteEngine on
#Включить rewrite_module - перенаправление
RewriteBase /
#Записывает базовую директорию нашего сайта
RewriteRule ^(.*)$ index.php
#перенаправляем все запросы на файл "index.php

Проверка:
 - вводим через / любой адресс в адр. строку - если работает - остается на странице, если нет - "NOT FAUND"

11. Реализуем метод Run() (отвечает за анализ запроса и передачу управления):
  //1 - Получить стоку запроса
  //2 - Проверить наличие такого запроса в routes.php
  //3 - Если совпадение есть - определить какой контроллер и какой action обрабатывает запрос
  //4 - подключить файл Класса-контроллера
  //5 - Создать обьект, вызвать метод(т.е.action)


 11.1 - Получить стоку запроса
   public function run() {
    print_r($this->routes);
      echo '<br><br>','Class Router, method run','<br><br>' ;
  //Получаем стоку запроса
  if(!empty($_SERVER['REQUEST_URI'])) {
    // с суперглобального массива $_SERVER[] по ключу ['REQUEST_URI'] получаем строку запроса
    $uri = trim($_SERVER['REQUEST_URI'], '/');
    //делим строку запроса по '/'
    
     echo $uri;
  }
 
//Проверка - после / вводим любые символы, например news, или news/view/23, - выведет news, или news/view/23


Зная ООП, используем его для того, чтобы сделать код понятнее и красивее - выносим код в отдельный метод:

private function getURI() {
//возвращает строку запроса
//реализуем инкапсуляцию, обьявляя метод приватным, так как обращаться к етму методу будем только из нашего Класса Router()

//Получить стоку запроса
  if(!empty($_SERVER['REQUEST_URI'])) {
    // с суперглобального массива $_SERVER[] по ключу ['REQUEST_URI'] получаем строку запроса
    return trim($_SERVER['REQUEST_URI'], '/');
    //делим строку запроса по '/'
}
}

  public function run() {
   $uri = $this->getURI();
   //обращаемся к етому методу внутри другого метода
       echo $uri;
  }

Проверка:
//1 - в Router.php остается код 
//Вызов Router
$router = new Router();
$router->run();
//2 - после / вводим любые символы, например news, или news/view/23, - выведет news, или news/view/23

11.2 Проверить наличие такого запроса в routes.php

public function run() {
   $uri = $this->getURI();
   //обращаемся к етому методу внутри другого метода
       echo $uri;

  //проверить наличие такого запроса в routes.php
  foreach ($this->routes as $uriPattern => $path) {
    echo "<br>$uriPattern -> $path";
  //для каждого маршрута, кот. нах. в массиве routes, помещаем переменную $uriPattern строку запроса из роутов  - 'news', а в переменную $path помещаем путь обработчика  => 'news/index',
  }
  }

  //введено news, выведет:
news/view/23
news -> news/index
products -> products/list


11.3 - Если совпадение есть - определить какой контроллер и какой action обрабатывает запрос
  //- сравниваем строку запроса и данные, содержащиеся в роутах с помощью ф-ии preg_match()
  // - Router.php


  //Сравниваем $uriPattern и $uri
  if (preg_match("~$uriPattern~", $uri)){
    //$uri - строка запроса
    //$uriPattern - данные с наших роутов
    echo '<br>', 'Есть совпадение по ' . $uri, '<br>';
  }


Вся ф-я run():

public function run() {
   $uri = $this->getURI();
   //обращаемся к етому методу внутри другого метода
       echo $uri;

  //проверить наличие такого запроса в routes.php
  foreach ($this->routes as $uriPattern => $path) {
    echo "<br>$uriPattern -> $path";
  //для каждого маршрута, кот. нах. в массиве routes, помещаем переменную $uriPattern строку запроса из роутов    'news', а в переменную $path помещаем путь обработчика  => 'news/index',
  
  //Сравниваем $uriPattern и $uri
  if (preg_match("~$uriPattern~", $uri)){
    //$uri - строка запроса
    //$uriPattern - данные с наших роутов
    echo '<br>', 'Есть совпадение по ' . $uri, '<br>';
  } } }

// если ввести news, - выведет:
news -> news/index
Есть совпадение по news
products -> products/list

// или если ввести products, - выведет: 
products
news -> news/index
products -> products/list
Есть совпадение по products


Если условие соблюдается, то в $path будет находится имя контроллера и екшена для обработки етого запроса.

  public function run() {
   $uri = $this->getURI();

  foreach ($this->routes as $uriPattern => $path) {
  
  //Сравниваем $uriPattern и $uri
  if (preg_match("~$uriPattern~", $uri)){
    //$uri - строка запроса
    //$uriPattern - данные с наших роутов
    echo $path;
  } } }
//вводим news, выведет news/index - имена, разделенные косой чертой.


Определить какой контроллер и какой action обрабатывает запрос с помощью ф-ции explode() для разделения строки на 2 части по '/'

  public function run() {
   $uri = $this->getURI();

  foreach ($this->routes as $uriPattern => $path) {
  
  //Сравниваем $uriPattern и $uri
  if (preg_match("~$uriPattern~", $uri)){
    //$uri - строка запроса
    //$uriPattern - данные с наших роутов
    
    $segments = explode('/', $path);
    echo '<pre>';
    print_r($segments);
    echo '</pre>';
  } } }


Ввести -  news
Выведет - 
  Array
(
    [0] => news
    [1] => index
)
Т.Е. получаем 2 елемента:
 - 1 - news - котносится к контроллеру
 - 2 - index - относится к екшену


11.4 - Подключить файл Класса-контроллера

public function run() {
   $uri = $this->getURI();

  foreach ($this->routes as $uriPattern => $path) {

  if (preg_match("~$uriPattern~", $uri)){
    
    $segments = explode('/', $path);

    //определить, какой контроллер обр. запрос
    $controllerName = array_shift($segments) . 'Controller';
    //array_shift() удаляет первый елемент массива (с нашего пути) + добавляем слово Controller
    $controllerName = ucfirst($controllerName);
    //1-я буква имени контролера станет большой
    echo $controllerName;
  } } }
  32.28


  11.5 Создать обьект, вызвать метод(т.е.action)

   public function run() {
   $uri = $this->getURI();
  foreach ($this->routes as $uriPattern => $path) {
  if (preg_match("~$uriPattern~", $uri)){
    $segments = explode('/', $path);
    $controllerName = array_shift($segments) . 'Controller';
    $controllerName = ucfirst($controllerName);

    //Создать обьект, вызвать метод(т.е.action)
    $actionName = 'action' . ucfirst(array_shift($segments));
      echo $actionName;
      //выведет actionList
  } } }

Еще раз проверяемся:
  public function run() {
   $uri = $this->getURI();
  foreach ($this->routes as $uriPattern => $path) {
  if (preg_match("~$uriPattern~", $uri)){
    $segments = explode('/', $path);
    $controllerName = array_shift($segments) . 'Controller';
    $controllerName = ucfirst($controllerName);
    $actionName = 'action' . ucfirst(array_shift($segments));
      echo '<br>Класс: '  . $controllerName;
      echo '<br>Метод: ' . $actionName;
  } } }
При введении в стр.з. product выведет:
  // Класс: ProductController
  // Метод: actionList
При введении в стр.з. news выведет:
  // Класс: NewsController
  // Метод: actionIndex
  

Осталось подключить нужный класс, создать его екземпляр и вызвать для етого екземпляра определенный метод.

Но сначала опишем несколько контроллеров, чтобы было что вызывать.
В файлы 'ProductController.php' и 'NewsController.php' добавим по 1 классу, они содержат по пустому методу с возвратом 'true'


 - файл   ProductController.php
 class ProductController {
  public function actionList() {
    return true; } }

 - файл   NewsController.php
class NewsController {
  public function actionIndex() {
      return true; } }

Подключить файл Класса-контроллера

  public function run() {
   $uri = $this->getURI();
  foreach ($this->routes as $uriPattern => $path) {
  if (preg_match("~$uriPattern~", $uri)){
    $segments = explode('/', $path);
    $controllerName = array_shift($segments) . 'Controller';
    $controllerName = ucfirst($controllerName);
    $actionName = 'action' . ucfirst(array_shift($segments));
      echo '<br>Класс: '  . $controllerName;
      echo '<br>Метод: ' . $actionName, '<br>';


      //подключить файл Класса-контроллера
      $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
      //проверка на существование
      if(file_exists($controllerFile)) {
        //подключаем
        include_once($controllerFile);
      } } } }



Создать обьект, вызвать метод(т.е.action)
 - Создаем обьект класса контроллера
 - вместо имени класса подставляем переменную $controllerName, кот. содержит строку етого Класса
 - для етого Обьекта $controllerObject вызываем метод $actionName() с пом. '->' - 'обращаемся к нему'
 - в наших методах (файлы 'NewsController.php' и 'ProductController.php') спецом писали 'retyrn true', чтоб можно было передать ето значение переменной ($result)
 - в рез. если метод сработал, обрываем цикл, кот. ищет совпадения в роутах

  public function run() {
   $uri = $this->getURI();
  foreach ($this->routes as $uriPattern => $path) {
  if (preg_match("~$uriPattern~", $uri)){
    $segments = explode('/', $path);
    $controllerName = array_shift($segments) . 'Controller';
    $controllerName = ucfirst($controllerName);
    $actionName = 'action' . ucfirst(array_shift($segments));
      echo '<br>Класс: '  . $controllerName;
      echo '<br>Метод: ' . $actionName, '<br>';
    $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
    if(file_exists($controllerFile)) {
        include_once($controllerFile); } 

      //Создать обьект, вызвать метод(т.е.action)
     //содзаем обьект класса Контроллера     
      $controllerObject = new $controllerName;

      //вызвать метод(т.е.action)
      $result = $controllerObject->$actionName();
        if ($result != null) {
          break;  } } } }


Добавим штрихи в методы ('NewsController.php' и 'ProductController.php'):

class NewsController {
  public function actionIndex() {
    echo 'NewsController actionIndex';
      return true; } }

class ProductController {
  public function actionList() {
    echo 'ProductController actionList';
    return true; } }

- убираем проверку в 'Router.php'
      echo '<br>Класс: '  . $controllerName;
      echo '<br>Метод: ' . $actionName, '<br>';

Проверяем еще раз:
 - вводим  'products'
    - выведет "ProductController actionList" - был запущен метод actionList()
 - вводим 'news' 
    - выведет "NewsController actionIndex" - был запущен метод actionIndex()
 -  вводим другой адресс - например, 'printer' - не получим ничего - так как такого адреса нет в таблице наших маршрутов.


 КОНЕЦ УРОК-1 MVC-1
 //==================================================