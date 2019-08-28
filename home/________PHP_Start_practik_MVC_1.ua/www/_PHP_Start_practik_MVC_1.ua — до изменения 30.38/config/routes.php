 <?php
 
 return array(
  'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
  //в етом адресе есть 2 параметра "news/([a-z]+)" = категория, и "([0-9]+)" = ID



 //'news/([0-9])+' => 'news/view',
    // "+" - = от 1 до бесконечности
    //будет вызван метод actionView в NewsController
    
 //'news' => 'news/index',
    //будет вызван метод actionindex в NewsController
 //'products' => 'product/list',
    //будет вызван метод actionList в ProductController
 );