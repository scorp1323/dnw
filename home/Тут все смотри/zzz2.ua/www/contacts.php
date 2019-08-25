<?php


header('Content-Type: text/html; charset=utf-8');
// теперь можно писать на русском без кракозяблов
//======================================================

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
// так отображаются все ошибки
//=======================================================


include_once 'horisontell_meny.php';


?>


<a href="tel:0988991623" title="Позвонить на Киевстар"><img src="images/KS_onli_logo.svg" width="30" height="30" alt="Позвонить на Киевстар"></a><b>&nbsp KS</b>
<a title="Позвонить на Киевстар" href="tel:0988991623">(098)8-99-16-23</a><br>


<a href="tel:0953233984" title="Позвонить на MTS"><img src="images/MTS_logo.svg" width="30" height="30" alt="Позвонить на MTS"></a><b>&nbsp MTS</b>
<a title="Позвонить на MTS" href="tel:0953233984">(095)32-33-984</a><br>


<a href="tel:0631025222" title="Позвонить на Life"><img src="images/Life_logo.svg" width="30" height="30" alt="Позвонить на Life"></a><b>&nbsp Life</b>
<a title="Позвонить на Life" href="tel:0631025222">(063)102-52-22</a><br>


<a href="viber://chat?number=+380988991623" title="Viber с компьютера"><img src="images/viber-icon.svg" width="30" height="30" alt="Viber c компьютера"></a><b>&nbsp Viber c компьютера</b>
<a title="Viber с компьютера" href="viber://chat?number=+380988991623">Viber-PC</a><br>


<a href="viber://chat?number=+380988991623" title="Viber с компьютера"><img src="images/viber-icon.svg" width="30" height="30" alt="Viber c компьютера"></a><b>&nbsp Viber c телефона</b>
<a title="Viber с телефона" href="viber://add?number=380988991623">Viber-mob</a><br>


<a href="whatsapp://send?phone=+380988991623" title="WhatsApp-mob"><img src="images/whatsapp-icon.svg" width="30" height="30" alt="WhatsApp с телефона"></a><b>&nbsp WhatsApp</b>
<a title="Viber с телефона" href="viber://add?number=380988991623">WhatsApp</a><br>


<a href="mailto:scorp1323@gmail.com" title="Электронная почта"><img src="images/gmail-icon.svg" width="30" height="30" alt="Электронная почта"></a><b>&nbsp E-mail &nbsp</b>
<a title="Электронная почта" href="mailto:scorp1323@gmail.com">scorp1323@gmail.com</a><br>


<a href="skype:scorp1323?call" title="Skype-звонок"><img src="images/skype-icon.svg" width="30" height="30" alt="Skype-звонок"></a><b>&nbsp Skype</b>
<a title="Skype-звонок" href="skype:scorp1323?call">Позвонить</a><br>


<a href="skype:scorp1323?chat" title="Skype-Чат"><img src="images/skype-icon.svg" width="30" height="30" alt="Skype-Чат"></a><b>&nbsp Skype</b>
<a title="Skype-Чат" href="skype:scorp1323?chat">Чат</a><br>


<?php
include_once 'footer.php';
?>