<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
//  65 - Реализация каркаса ?>
Задача: есть строка в формате <?
//Formaat: dd-mm-yyyy  ?>
Необх.: <?
//Format Год 2015, месяц 11, день 21 ?>


Набираем в index.php <?
//Format: dd-mm-yyyy
$string = '21-11-2015';
// Год 2015, месяц 11, день 21
$pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
$replacement = 'Год $3, месяц $2, день $1';

//$3, $2 и $1 - спец. ссылки - символизируют подмаски из рег. выражения($1 - 1-я подмаска = ([0-9]{2}), 
//$2 = ([0-9]{2}), $3 = ([0-9]{4})  )
echo preg_replace($pattern, $replacement, $string);
die;  ?>

Используя подмаски, мы переставляем значения по своему усмотрению.


ДЕЛАЕМ ИНФОРМАЦИОННЫЙ РАЗДЕЛ - статьи, новости, книги...
Этот раздел состоит из 2 частей:
1 - список записей
2 - просмотр одной записи

Добавляем 2 екшена в контроллер - NewsController <?
class NewsController {
	public function actionIndex() {
		echo 'Список новостей';
		return true;
	}
	public function actionView() {
		echo 'Просмотр одной новости';
		return true;  }  }  ?>

Для того, чтобы ети екшены заработали - делаем опред. записи в Роутере.

Определим, что Список Новостей будет иметь такой адресс:
http://___php_start.ua/news/

Запишем такое правило в наши Роутеры(routes.php) <?
'news' => 'news/index', // actionIndex в NewsController ?>
(он у нас есть - удалим второе - products...)

Метод actionView() - как должен выглядеть адресс просмотра одной новости:
  http://___php_start.ua/news/15
  http://___php_start.ua/news/77,   где: 
  - /news/ - название раздела
  - 15 и 77 - идентификатор новости

  Запишем правила для етих адресов:
  (выглядеть они будут типа так): <?
  'news/77' => 'news/view',  
  'news/15' => 'news/view',
  'news' => 'news/index',  ?>
 Так как наш класс Роутер поочереди идет по етому массиву и применяет первое правило, в кот. совпадает запросс, правила 'news/77' и 'news/15' мы должны расположить выше.

 Проверяем в браузере:
  - при введении news/77 или news/15 - Просмотр одной новости
  - при введении news/ - Список новостей
  - при введении несуществ. идентификатора news/15647 - первое и второе правило работать не будут - сработает news/index.

 Но новостей на сайте может быть сотни-тысячи - писать такие правила на каждую новость в Роутах - не лучшая идея.
 Необх. исп. Рег.Выр. вместо идентификатора новости. <?
 'news/([0-9]+)' => 'news/view' ?> - в строке может содержаться любое число длиной от 1 символа и более.
Проверяем: - повводим любые числа - Просмотр одной новости.

actionView() - получаем одну новость из БД и отобразим на ее странице.
ДЛя етого нам нужен ее идентиф. - его необх. получить и модифицировать Роутер.


ПЕРЕДАЧА ПАРАМЕТРОВ ПРИ ИСПОЛЬЗОВАНИИ ЧПУ.
	При GET мы передавали параметры в строке запроса
	(id=1235&category=sport->$_GET) - при етом они попадали в суперглоб. массив $_GET и мы могли их получить по ключам: <?
	$_GET['id']
	$_GET['category']?>
При ЧПУ исп. адреса вида <http://___php_start.ua/news/sport/1235> - они красивее и удобнее пользователю, но менее удобны программеру.
Смысл - данные со строки не перед. в $_GET.
Решение - ф-ии работы со строками.

Рассмотрим этот процесс на примере такого адреса
	<http://___php_start.ua/news/sport/1235>
	Для него запишем опред. маршрут в Роутах <?
	'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2' ?>
Тут есть 2 парам., кот. соотв. категории и идентиф.:
1 - ([a-z]+)
2 - ([0-9]+)
Получим ети парам. и передадим их методу класса - екшену через $1 и $2 (сделаем ето а классе Роутер - т.к. именно там происходит обработка запроса)

1 - из запроса <? /news/sport/114 ?> вырезать 2 рапам. -  sport и 114 и подставить на места ссылок $1 и $2 для передачи их на нужный екшен.


МЕНЯЕМ в Router.php метод run() 11:10 <?
public function run() {
	$uri = $this -> getURI();
    // 2 - проверить наличие такого запроса в routers.php

foreach ($this->routes as $uriPattern => $path) {
  //Сравниваем $uriPattern и $uri
  if (preg_match("~$uriPattern~", $uri)) {
//-------------------------------------
echo '<br>Где ищем (запрос, кот. набрал пол-ль): '.$uri;
echo '<br>Что ищем(совпадения из правила): '.$uriPattern;
echo '<br>Кто обрабатывает: '.$path;
//Получаем внутренний путь из внешнего согласно правилу
$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
echo '<br><br>Нужно сформировать: '.$internalRoute;
//------------------------------------------
// 3 - если есть совпадение, определить,
// какой контроллер и action обрабатывают запрос
$segments = explode('/', $path);  ?>

Тут исп. ф-ю <? 
preg_replace("~$uriPattern~", $path, $uri) ?>.
В нашем запросе - в строке запроса <? /news/sport/114 ?> - ищем парам. ( sport и 114 ) по опред. шаблону (<? $uriPattern  ?> = <? 'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2' ?> )/
Если находим ети парам. - то в строку $path, кот. описывается $1 и $2, мы их подставляем.
В итоге - получим т.н. ВНУТРЕННИЙ МАРШРУТ.
Проверяем:
 - вводим в адресс. строку 
     http://___php_start.ua/news/sport/114

Выведет:
Где ищем (запрос, кот. набрал пользователь): news/sport/114
Что ищем(совпадения из правила): news/([a-z]+)/([0-9]+)
Кто обрабатывает: news/view/$1/$2

Нужно сформировать: news/view/sport/114
Просмотр одной новости

2 - после получения внутреннего пути - опред. контроллер, екшин и парам.
Контроллер и екшен опред. при помощи старого кода <?

$segments = explode('/', $path);
//  Получаем имя контроллера:
$controllerName = array_shift($segments).'Controller';
//array_shift — извлекает первый элемент массива
$controllerName = ucfirst($controllerName);
// привод к большой букве с пом. ucfirst()
$actionName = 'action'.ucfirst(array_shift($segments));
?>
Далее в нашем масс. $segments остануться параметры.



Удаляем проверки, останется:  <?
 if (preg_match("~$uriPattern~", $uri)) {

//Получаем внутренний путь из внешнего согласно правилу
$internalRoute = preg_replace("~$uriPattern~", $path, $uri);

//Определить контроллер, action, параметры

$segments = explode('/', $path);

//  Получаем имя контроллера:
$controllerName = array_shift($segments).'Controller';
//array_shift — извлекает первый элемент массива
$controllerName = ucfirst($controllerName);
// привод к большой букве с пом. ucfirst()

$actionName = 'action'.ucfirst(array_shift($segments));

echo '<br>Имя Контроллера: '.$controllerName;
echo '<br>Имя action`а: '.$actionName;
$parameters = $segments;
  echo '<pre>';
  print_r($parameters);

die;

// 4 - подключить файл класса-контроллера
$controllerFile = ROOT . '/controllers/' . $controllerName . '.php';  ?>


Вводим строку  http://___php_start.ua/news/sport/1235
Выведет: 
Имя Контроллера: NewsController
Имя action`а: actionView
Array (
    [0] => sport
    [1] => 114  )

-> далее остануться параметры...
Спецом исп. ф-ю array_shift(), кот. исп. из массива названия екшена и удаляет его. В итоге - в массиве ост. только параметры (роверка была перед етим).
Array - параметры, кот. передали в строку запроса - их 2 и распол. в порядке передачи.
Если добавить еще парам. ч\з '/' - они будут добавлены в массив.
ПРОВЕРЯЕМ:
- добавим /snowbord/77
ВЫВЕДЕТ:
Array (
    [0] => sport
    [1] => snowbord 
    [2] => 77 )        ( 12:57 )



3 - ВЫЗВАТЬ ЕКШЕН С ПАРАМЕТРАМИ
для этого у нас  есть все необх. данные:
- назв. контоллера
- назв. екшена
- массив с параметрами
Этот массив мы можем просто передать нашему екшену, используя ранее написанный код.(удалим лишнее) <?
$segments = explode('/', $internalRoute);
//  Получаем имя контроллера:
$controllerName = array_shift($segments).'Controller';
//array_shift — извлекает первый элемент массива
$controllerName = ucfirst($controllerName);
// привод к большой букве с пом. ucfirst()
$actionName = 'action'.ucfirst(array_shift($segments));
$parameters = $segments;
// 4 - подключить файл класса-контроллера
$controllerFile=ROOT.'/controllers/'.$controllerName.'.php'  ;
if (file_exists($controllerFile)) {
  include_once($controllerFile);  }
// 5 - создать объ., вызвать метод (т.е. action)
$controllerObject = new $controllerName;
$result = $controllerObject -> $actionName($parameters);  ?> ( 13:20 )

Переменной резалт, присваиваем значение которое возвращает результат функции с двумя параметрами, первый из которых массив в который заносятся два параметра имя объекта и имя метода который есть внутри этого объекта, во втором параметре вписываем наш массив, таким образом, с помощью данной функции вместо массива, в качестве параметра, мы передаём 2 элемента.


При етом, для того, чтоь получить параметры в екшене (NewsKontriller.php) (public function View()) исп. массив, обращаясь в его елементу, - теперь номер елемента в массиве будет отвечать его позиции в запросе.  <?
public function actionView($params) {
  echo '<br>'.$params[0];
  echo '<br>'.$params[1];

  return true;
}   ?>
Если в строке запроса добавит еще несколько елементов, они тоже появляются в массиве и мы можем их распечатать  <?
  echo '<br>'.$params[0];
  echo '<br>'.$params[1];
  echo '<br>'.$params[2];  ?>
  Но тут есть недостаток - надо запоминать имане индексов массива.
  Делаем хитрее - (Router.php) исп. ф-ю call_user_func_array()  <?
  $result = call_user_func_array(array($controllerObject,$actionName), $parameters); ?>
Тут параметры в массив будут переданы как переменные, доступ к ним можем получать по переменным <?
public function actionView($category, $id) {
  echo '<br>'.$category;
  echo '<br>'.$id;
return true; }  ?>

Добавляем Модель для Новостей (News.php в /models)
<?php  class News {
  //Возврат одной новости с своим id
  //@param integer $id
  public function getNewsItemById($id) {
    //Запрос к БД  
  }
  public function getNewsList() {
    //Запрос к БД
  }  } ?>

Для исп. модели News в контроллере, ее необх. подключить(<? NewsController.php ?>) <?
include_once ROOT. '/models/News.php';
class NewsController {
  public function actionIndex() {
    echo '<br>Список новостей';
    return true;
  }
  public function actionView($category, $id) {
      echo 'Просмотр одной новости';
  return true; } }  ?> (16:32)

Теперь можем исп. в наших екшенах методы модели News  (<? NewsController.php ?>)
  <?php
include_once ROOT. '/models/News.php';

class NewsController {
  public function actionIndex() {
    $newsList = array();
    $newsList = News::getNewsList();

    echo '<pre>';
      print_r($newsList);
    echo '</pre>';
    return true;
  }
  public function actionView($id) {
      if ($id) {
        $newsItem = News::getNewsItemById($id);
          echo '<pre>';
            print_r($newsItem);
          echo '</pre>';

          echo 'actionView';
      }
   }
    }  ?>
Будем обращ. к ним статически, т.к. это стат. методы, получать от них данные и печатать рез.

Также нужно обновить Роуты для соответствия екшенам (routes.php) <?
return array(
  'news/([0-9]+)' => 'news/view/$1',//actionView в NewsController
  'news' => 'news/index',// actionIndex в NewsController
); ?>



Реализуем метод getNewslist() модели News (News.php) <?
  public function getNewsList() {
    //Запрос к БД
     $host = 'localhost';
     $dbmname = 'mvc_site';
     $user = 'root';
     $password = '';
     $db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);

     $newsList = array();

     $result = $db -> query('SELECT id, title, date, short_content ' . 'FROM news ' . 'ORDER BY date DESC ' . 'LIMIT 10');

  $i = 0;
     while ($row = $result -> fetch()) {
      $newsList[$i]['id'] = $row['id'];
      $newsList[$i]['title'] = $row['title'];
      $newsList[$i]['date'] = $row['date'];
      $newsList[$i]['short_content'] = $row['short_content'];
     }
     return $newsList;  } ?>

В цикле записываем полученные данные в массив результата и возвращ. этот массив  return $newsList;.
В контроллере мы уже обратились к контроллеру News::getNewsList();
При введении news в строку запроса -> массивы статей.


Метод getNewsItemById()
<?
public static function getNewsItemById($id) {
  $id = intval($id);

  if($id) {
     $host = 'localhost';
     $dbname = 'mvc_site';
     $user = 'root';
     $password = '';
     $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);

     $result = $db -> query('SELECT * from news WHERE id='.$id);

     $news = $result -> fetch();
     return $newsItem;
  }
}  ?>
Проверяем:
 - при введении в стр. запр. news/5 - должен вывести статью №5, и так любую по №.
 Но тут дублируются ключи - названия колонок и позиции колонок - это из-за fetch()/

 Исправляем: <?
 $result = setFetchMode(PDO::FETCH_ASSOC);
 $result = setFetchMode(PDO::FETCH_NUM);  ?>


 МОДЕЛЬ - необх. улучшить :
  - повторяется вызов БД
  - тяжело менять (пароль к БД...)
Вся задача кода <?
     $host = 'localhost';
     $dbname = 'mvc_site';
     $user = 'root';
     $password = '';
     $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);  ?>
сводится к получению обьекта класса PDO.
Скрываем все ети строки в методе статическом getConnection() <?
$db = Db::getConnection(); ?> (класс напишем и перенесем в него этот код - папка components, создаем файл Db.php рядом с Router.php)  <?
class Db {
  public static function getConnection() {
    $paramsPath = ROOT . '/config/db_params.php';
    $params = include($paramsPath);
    $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
    $db = new PDO($dsn, $params['user'], $params['password']);
    return $db;   }  }  ?>


Класс Db нах. в папке components и относится непосредственно к нашему каркасу.
Стат. метод static function getConnection() - в нем получаем парам. соед. - кот. выносим в отдельный файл db_params.php в папке config рядом с routes.php  <?
return array(
'host' => 'localhost',
'dbname' = 'mvc_site',
'user' = 'root',
'password' = '',
);   ?>
Содержит массив.(24:24)
Далее получ. массив с этого файла <? 
    $params = include($paramsPath); ?>
  Создаем обьект класса PDO <?
  $db = new PDO($dsn, $params['user'], $params['password']); ?>
  (разбили код на 2 части, но можно в 1)
Возвращаем обь. класса PDO <? return $db;  ?>


Так же поступаем и с методом getNewsList()(News.php)
 и подключаем класс Db в нашем FC (index.php) <?
 require_once(ROOT.'/components/Db.php');  ?>


Это были принципы построения моделей в системе5. Остальные модели строятся так же.(24:35)


ПРЕДСТАВЛЕНИЯ(визуализация) (24:50)
На данный момент у нас уже есть контроллер (NewsList), в кот. уже есть нужные данные для страницы.
  Смысл Представлений - отделить HTML  <?
  public function actionIndex() {
    $newsList = array();
    $newsList = News::getNewslist();

    require_once(ROOT. '/views/news/index.php');

    return true;
  }
public function actionView($id) {
  if($id) {
    $newsItem = News::getNewsItemById($id);

    echo '<pre>';
      print_r($newsItem);
    echo '</pre>';

    echo 'actionView';
  }
  return true;
}