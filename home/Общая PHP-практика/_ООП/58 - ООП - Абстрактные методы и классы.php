<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
//  Абстрактные методы и классы
?>
У нас был класс Publication и унаследованные от него 3 класса:
 - NewsPublication 
 - ArticlePublication
 - PhotoReportPublication

Но тут 2 большие проблемы:
    пр.№1 - у всез 3 классов был написан свой метод printItem(),
	        т.е. код был написан в расчете н6а то,
	        что в этих классах существует метод printItem().
	        А что, если он (printItem())не написан,
	        а мы попытаемся к нему обратится, (например, мы или др. програмист, кот. писал класс забыли его реализовать) -> -> ошибка на этапе выполнения.
	пр.№2 - сам класс Publication как общий класс
	        не должен иметь Реализации, но помагает реализовать
	        логическую модель системы.

Абстрактный класс - это базовый класс, кот. не предполагает
    создания екземпляров. Он содержит хар-ки сущности, кот.
    отличают его от др. сущностей.
Абстрактный класс - это базовый класс, объ. кот. не создаются,
    т.е. можно создавать только объ. наследников етого класса,
    но не самого класса.
Т.е., превратив наш класс Publication в абстрактный,
    мы запрещаем созд. объ. етого класса. При етом мы можем и должны унаследовать др. класс от него и создавать нужные объ. классов-наследников.

Для объявления класса абстрактным, необх. перед его опр. 
	добавить спец. слово "abstract".

Проверяем:
1 - В классе (classes.php) делаем абстрактным класс Publication  а в data.php создаем объ. класса Publication - $pub1 = new Publication; -  выдаст ошибку <!-- Fatal error: Uncaught Error: Cannot instantiate abstract class Publication -->

<!-- ============================================= -->
Абстрактный метод - это метод  - мотод класса, 
     реализация для которого отсуствует.

Пример с автомобилем:
	мы можем определенно точно сказать, что в любой машине будет руль, двинатель и коробка передач, но при этом мы не знаем, будет ли ето бензиновый или дизельный двигатель, с какой стороны у машины будет руль, ... эти детали зависят уже от конкретной машины, но, тем не менее, общее понятие МАШИНА предполагает наличие и руля, и двигателя и коробки передач.
Так же и с нашим примером - для класса Publication мы можем 
	обьявить, что классы-наследники должны реализовывать метод printInfo(). 
При етом, если у класса-наследника метод не будет реализован,
    то мы получим ошибку, но ее отличие - мы ее получим на этапе написания программы, а не выполнения, - мы сразу ее увидим и можем реализовать необходимый метод (printInfo() в даном случае)

Проверяем:
 - в classes.php класс Publication  делаем абстрактным <?
 			abstract class Publication {/*.. */}  ?>
 - добавляем абстрактный метод в класс Publication <?
 			abstract public function printItem(); ?>
 - создаем еще один класс AudiuPublication потомком Publication <?
 			class AudiuPublication extends Publication {} ?>
Выдаст ошибку: 
	<!-- Fatal error: Class AudiuPublication contains 1 abstract method and must therefore be declared abstract or implement the remaining methods (Publication::printItem) -->
	<!-- Неустранимая ошибка : класс AudiuPublication содержит 1 абстрактный метод и поэтому должен быть объявлен как абстрактный или реализовать оставшиеся методы (Publication :: printItem) -->
Прелесть такого подхода:
	- еще на этапе написания базоавого класса
	  (например, Publication), мы можем регламентировать,
	  какие методы должны быть реализованы в классах-наследниках.

<!-- ================================================ -->
Особенности абстрактных классов и методов:
	1 - сигнатуры методов класса-родителя
	    и класса-потомка (КЛ-Р и КЛ-П)
	    должны совпадать - т.е. контроль типов
	    (type hint) и к-во обязательных аргументов
	    должны быть одинаковыми
	2 - Абстрактные классы могут иметь
		обычные и абстрактные методы
	3 - если класс содержит хоть 1 абстрактный метод,
	    он должен быть обьявлен как Абстрактный


Пример-1: (исп. Абстрактного метода)
1 - Сигнатуры методов класса-родителя и класса-потомка
    (КЛ-Р и КЛ-П) должны совпадать - т.е. контроль типов
	    (type hint) и к-во обязательных аргументов
	    должны быть одинаковыми <?
	abstract class Human {
	abstract public function printHello();
}
class Student extends Human {
	public function printHello() {
		echo "Hello, student";
	}  }
$student1 = new Student;
$student1 -> printHello();  ?>

 - сигнатуры метода одинаковы
 - пример работает нормально <!-- Hello, student -->
 - если в объявлении Абст. метода скажем, что метод
   ждет какой-то арг. (printHello($name))
   а в унаследованом классе  при реализации
   этого метода мы не реализовали этот мех.
   (printHello()), то мы получим ошибку <?
   abstract class Human {
	abstract public function printHello($name);
}
class Student extends Human {
	public function printHello() {
		echo "Hello, student";
	} }
$student1 = new Student;
$student1 -> printHello();
// Fatal error: Declaration of Student::printHello() must be compatible with Human::printHello($name)
// объ. метода Student::printHello() и  Human::printHello($name) должны быть совместимы - т.е. их сигнатуры должны совпадать ?>

Исправляем: <?
abstract class Human {
	abstract public function printHello($name);
}
class Student extends Human {
	public function printHello($name) {
		echo "Hello, student $name";
	} }
$student1 = new Student;
$student1 -> printHello('Олег');
// Hello, student Олег  ?>


Если сделать наоборот - тоже ошибка: <?
abstract class Human {
	abstract public function printHello();
}
class Student extends Human {
	public function printHello($name) {
		echo "Hello, student $name";
	} }
$student1 = new Student;
$student1 -> printHello('Олег');
// Fatal error: Declaration of Student::printHello($name) must be compatible with Human::printHello()
// сигнатуры должны совпадать ?>


Но так случается тлько если арг. обязателен.
	Если его(арг.) присвоить в классе-потомке по умолчанию - ошибки не будет. <?
abstract class Human {
	abstract public function printHello();   }
class Student extends Human {
	public function printHello($name = 'Неизвесный') {
		echo "Hello, student $name";   	} }
$student1 = new Student;
$student1 -> printHello('Олег');
// Hello, student Олег
// ошибки нет ?>


А если так - тоже ошибка:  <?
abstract class Human {
	abstract public function printHello($name = 'Неизвесный');  }
class Student extends Human {
	public function printHello($name) {
		echo "Hello, student $name";
	} }
$student1 = new Student;
$student1 -> printHello('Олег');
// Fatal error: Declaration of Student::printHello($name) must be compatible with Human::printHello($name = 'Неизв...')
// сигнатуры не одинаковы!!!  ?>



Пример-2: (исп. Абстрактного метода)
2 - Абстрактные классы могут иметь обычные и абстрактные методы

Ничего нам не мешает написать обычный метд в абстракрном классе <?
abstract class Human {
	public function printHelloName($name) {
	echo "Hello, $name";
} }

class Student extends Human {
	public function printHello() {
		echo "Hello, student";
	}
}

$student = new Student;
$student -> printHello();
$student -> printHelloName('John'); ?>


3 - если класс содержит хоть 1 абстрактный метод,
	    он должен быть обьявлен как Абстрактный
