<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//============================
// Контроль типа аргумента (Type Hinting)

// создаем класс Student
class Student {
	public $name; //имя студента
	public $result; // массив оценок студента

	function __construct ($name, $result) {
		echo 'Студент - ' . $name . ':' . '<br>' ;
		foreach ($result as $subject => $item) {
			echo $subject . ' - '  . '  ' . $item . '&nbsp; &nbsp; ' ;
		}
		echo '<hr>';
	}
}

$student1 = new Student('Алеша Попович', array('Математика' => 5,'Биология' => 4));
$student2 = new Student('Добрыня Никитич', array('Математика' => 3,'Биология' => 5));  ?>

1 - Есть класс Student
2 - свойство $name хранит имя студента
3 - свойство $result хранит в массиве оценки студента
4 - создаем пару екземпляров класса Student и передаем
	в конструктор необх. аргументы (имя и массив с оценками)
5 - в конструкторе распечатываем успеваемость студентов.

А теперь создаем внештатную ситуацию:
	- создаем еще 1 екз. класса Student, но, типа, ошиблись и вместо массива передаем число...<?
	$student3 = new Student('Илья Муромец', 1);
	// Студент - Илья Муромец:
	// Warning: Invalid argument supplied for foreach()
	// Неверный аргумент, предоставленный в foreach(). ?>
Эту ситуацию можно исправить -  контроль типов
	 - заставлять параметры быть массивами или объектами.

	Меняем конструктор для указания того,
	 что аргумент ожидает массив:
<?  function __construct ($name, array $result){ }  ?>

Теперь при передаче аргумента, который не подходит нашему методу, мы получим ОТЛАВЛИВАЕМУЮ ОШИБКУ
<!-- Fatal error: Uncaught TypeError: Argument 2 passed to Student::__construct() must be of the type array, integer given -->
или по русски:
<!-- Неустранимая ошибка : Uncaught TypeError: Аргумент 2, передаваемый в Student :: __ construct (), должен иметь тип массива, заданное целое число --> 

<!-- ===================================================	 -->

             Этот же пример, но для объектов
<? // создаем класс User
class User {
	public $firstname;
	public $lastname;
}
function getFullname ($user) {
	return $user -> firstname . ' ' . $user -> lastname;
}
$user1 = new User;

$user1 -> firstname = 'Сергей';
$user1 -> lastname = 'Таранов';

echo getFullName($user1); // Сергей Таранов


//типо ошиблись, и 2-й раз вместо объекта класса User передаем строку
echo getFullName('string');
// Notice: Trying to get property of non-object
// Попытка получить свойство не-объекта  ?>

	Меняем ф-ю для того, что-б указать, что аргумент
		ожидает объект класса User <?

	function getFullName(User $user) {
		return $user -> firstname . ' ' . $user -> lastname ;
	}
// Сергей Таранов
// Fatal error: Uncaught TypeError: Argument 1 passed to getFullname() must be an instance of User, string given
// Отлавливаемая фатальная ошибка - аргумент, переданый в getFullName должен быть экземпляром класса User, а передается строка
?> 
Вместо екз. класса User в метод getFullName можно передавать екз. наследников класса User <?

class User {
	public $firstname;
	public $lastname;
}

function getFullName(User $user) {
		return $user -> firstname . ' ' . $user -> lastname;
	}
$user1 = new User;

$user1 -> firstname = 'Алена';
$user1 -> lastname = 'Остафьева';

echo getFullname($user1), '<br>';

class SuperUser extends User { }

$user2 = new SuperUser;

$user2 -> firstname = 'Алеша';
$user2 -> lastname = 'Попович';

echo getFullname($user2);
// Алена Остафьева 
// Алеша Попович  
?>
Вместо классов для контроля типов можно использовать интерфейсы.
