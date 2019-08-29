<?php
//=============================

В прошлом занятии мы реализовали ФронтКонтроллер и Роутер, теперь приступим к созданию Контроллеров, Моделей и Екшинов

Задача:
 - есть строка формата 
  //Format: dd-mm-yyyy
$string = '21-11-2019';
$string1 = '23 - 10 - 1980';
 - необходимо получить такую строку для удобства чтения
//год 2019 месяц 11, день 21
//'Month: 11, Day: 21, Year: 2019'

Решение:
1 - опишем строку 
$string = '21-11-2019';
$string1 = '23 - 10 - 1980';
регуляркой
$pattern = '/([0-9]{2}) - ([0-9]{2}) - ([0-9]{4})/';
// 2 цыфры - (дефис) - 2 цыфры - (дефис) - 4 цыфры

2 - опишем необх. результат
$replacement = 'Год $3, месяц $2, день $1';
$replacement1 = 'Month: $2, Day: $1, Year: $3';
$1, $2, и $3 - спец.ссылки = 'подмаски' - для перестановки значений местами
$1 - первая подмаска = '([0-9]{2})'
$2 - вторая подмаска = ('[0-9]{2})'
$3 - третья подмаска = '([0-9]{4})'

echo preg_replace($pattern, $replacement, $string);
echo preg_replace($pattern, $replacement1, $string1);
preg_replace() - ф-я, кот. выполняет поиск по строке '$string' по спец. регулярке '$pattern' - если совпадения найдены, ф-я изменяет содержимое строки '$replacement', при етом заменяет ссылки '$1, $2, и $3' на соотв. значения из подмасок регулярки '$pattern'


Типичная задача веб.програмирования - информационный раздел:
 - статьи
 - книги
 - новости...
 Етот раздел состоит из двух частей:
  1 - список записей
  2 - просмотр одной записи

Рассмотрим ети 2 задачи - для етого добавим 2 екшена в наш контроллер, кот. будет обрабатывать ети страницы.
Пусть ето будет 'NewsController' - 'NewsController.php' и екшены actionIndex() и actionView().

class NewsController {
  public function actionIndex() {
    echo 'Список новостей';
      return true;  }
  public function actionView() {
    echo 'Просмотр одной новости';
    return true;  } }

Для того, чтобы ети екшены заработали, необходимо сделять определенные записи в роуты.

Определим, что список новостей будет иметь такой адресс:      /news/ - (оставляем как у нас есть)

Определим адресс просмотра одной новости:
 - /news/15
 - /news/77

 Запишем правило в роуты:
  return array(
    'news/77' => 'news/view',
    'news/15' => 'news/view',
    //будет вызван метод actionView в NewsController
    
    'news' => 'news/index',
    //будет вызван метод actionindex в NewsController
    'products' => 'product/list',
    //будет вызван метод actionList в ProductController
 );
Важно:
 - так как Класс Роутер поочереди идет по массиву и применяет первое правило из совпавшего запроса, правила 'news/77' => 'news/view' и 'news/15' => 'news/view' необходимо расположить выше для того, чтоб они могли заработать.

 Проверка:
 а - вводим в строку адреса "/news/77" или "/news/15"
 а - выведет "Просмотр одной новости"
 б - вводим в строку адреса "/news/75" или "/news/24" ...
 б - выведет "Список новостей"

 Так как новостей может быть тысячи, заменим идентификатор новости регуляркой:
  return array(
    'news/([0-9])+' => 'news/view',
    // "+" - = от 1 до бесконечности
    //будет вызван метод actionView в NewsController
    
    'news' => 'news/index',
    //будет вызван метод actionindex в NewsController
    'products' => 'product/list',
    //будет вызван метод actionList в ProductController
 );

Проверка:
 - вводим после  /news/ 125, 456, 78524...
 - выводит "Просмотр одной новости"


В actionView() мы собираемся получить одну новость из БД и отобразить ее на странице - НО для етого нам нужен ее 'ID'
Для получения 'ID' новости необх. модифицировать Роутер.



Передача параметров при использовании ЧПУ.
ранее мы передавали параметры в строке запроса
"http://_php_start_practik_mvc_1.ua/news/?di=12345&category=sport"
При етом на сервере они попадоли в суперглоб. массив $_GET и мы могли их получить по ключам:
$_GET['id']
$_GTE['category']

Особенности ЧПУ - использование адресса вида
"http://_php_start_practik_mvc_1.ua/news/sport/1235" - они красивее и приятнее для пользователь, но менее удобные для програмиста.
При такой записи строки запроса, данные в ней тоже содержаться, однако они уже не будут попадать в массив $_GET/
Необх. исп. ф-ции работы со строкеми для получения этих данных.

Возьмем этот адресс как пример.
Запишем для него определенный маршрут в наших Роутах
 return array(
  'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
  //в етом адресе есть 2 параметра "news/([a-z]+)" = категория, и "([0-9]+)" = ID

 //остальные закоментируем
 );

Получим ети параметры "([a-z]+)" и "([0-9]+)" и передадим их методу класса - Екшену "$1/$2" в Классе "Router{}", так как именно там происходит обработка запроса - в 3 шага:
1-й - с нашего запроса, кот. описывается правилом
 'news/([a-z]+)/([0-9]+)' //news/sport/114,
 вырезать 2 параметра "sport/114" и подставить на места ссылок "$1/$2" - для того, чтоб передать их на нужный Екшен с помощью ф-ции preg_replace()
 $internalRoute = preg_replace("~$uriPattern~", $path, $uri);
В нашем запросе в строке запроса "news/sport/114" ищем параметры "sport" и "114" по шаблону "~$uriPattern~", кот. нах. в роутах и равен "([a-z]+)/([0-9]+)".
Если находим ети параметры = совпадения, - то в строку $path, кот. = "$1/$2" (из роутов), - подставляем ети парам. В итоге получим т.наз. 'Внутренний маршрут' - $internalRoute.
2-й - после определения 'внутреннего пути', можем определить Контроллер, Екшен и Параметры.
Контроллер и Екшен определяем с помощью старого кода.
Далее в массиве $segments после array_shift($segments) остануться только 'параметры', 


  public function run() {
   $uri = $this->getURI();
  foreach ($this->routes as $uriPattern => $path) {
  if (preg_match("~$uriPattern~", $uri)){
    //$uri - строка запроса
    //$uriPattern - данные с наших роутов
    //Если совпадение есть
    
  //Получаем внутренний путь из внешнего солгасно правилу
    $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

  //Определить Контроллер, Екшен, Параметры

    $segments = explode('/', $internalRoute);

    //определить, какой контроллер обр. запрос
    $controllerName = array_shift($segments) . 'Controller';
    //ф-я array_shift() удаляет первый елемент массива (с нашего пути) + добавляем слово Controller
    $controllerName = ucfirst($controllerName);
    //1-я буква имени контролера станет большой

    //определить, какой action обр. запрос
    $actionName = 'action' . ucfirst(array_shift($segments));
    echo '<br>controller name: ' .$controllerName;
    echo '<br>action name: ' .$actionName;
    $parameters = $segments;
      echo '<pre>';
      print_r($parameters);
      die;

Введем: '/news/sport/114'
Выведет:
'controller name: NewsController
action name: actionView
Array
(
    [0] => sport
    [1] => 114
)'
'Array([0] => sport [1] => 114)' - Параметры ,переданные в строку запроса