Типы носителей:
 - all -  Все типы ( по умолчанию)
 - aural  - речевые синтезаторы, программы для воспр. текста вслух. 
 - braille - устройства, основанные на системе Брайля
 - handheld - наладонные компьютеры и аналоги
 - print  - принтера.
 - projection - проектор.
 - screen - екран монитора
 - tv - телевизор


 В CSS для указания типа носителей применяются команды @import и @media.

<style>
    @import "/style/main.css" screen; /* Стиль для вывода результата на монитор */
    @import "/style/smart.css" print, handheld; /* Стиль для печати и смартфона */
  </style>


Команда @media позволяет указать тип носителя для глобальных или связанных стилей и в общем случае имеет следующий синтаксис.
@media тип носителя 1 {
  Описание стиля для типа носителя 1 }
@media тип носителя 2 {
  Описание стиля для типа носителя 2 }

<style>
   @media screen { /* Стиль для отображения в браузере */
    BODY { font-family: Arial, Verdana, sans-serif; /* Рубленый шрифт */
     font-size: 90%; /* Размер шрифта */
     color: #000080; /* Цвет текста */    }
    H1 {  background: #faf0e6; /* Цвет фона */
     border: 2px dashed maroon; /* Рамка вокруг заголовка */
     color: #a0522d; /* Цвет текста */
     padding: 7px; /* Поля вокруг текста */  }
    H2 {  color: #556b2f; /* Цвет текста */
     margin: 0; /* Убираем отступы */   }
    P {   margin-top: 0.5em; /* Отступ сверху */  }
   }
   @media print { /* Стиль для печати */ 
    BODY { font-family: Times, 'Times New Roman', serif; /* Шрифт с засечками */ }
    H1, H2, P {  color: black; /* Чёрный цвет текста */ }
   }
  </style>



  <title>Разные носители</title>
  <link media="print, handheld" rel="stylesheet" href="print.css">
  <link media="screen" rel="stylesheet" href="main.css"> 


  <style media="handheld">
   BODY { width: 320px; /* Ширина страницы */ } 
  </style>