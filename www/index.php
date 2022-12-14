<?php

session_start();

// якщо в сесії немає масива корзини то створюємо її
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}

include_once '../config/config.php'; // Ініціалізація налаштувань
include_once '../config/db.php'; // Ініціалізація бази даних
include_once '../library/mainFunction.php'; // Основні функції
/*Одна унікальна сторінка з одним унікальним контентом*/

/*
В нашому проекті використовується модель MVC 
Окремо html code, 
Окремо підключення до бд, 
Окремо контролери які збирають все це в єдину структуру html -> яку повертає користувачу
*/

/*
При зверненню до нашого сайту спочатку відпрацьовує index.php?;
Де спочатку підключається config.php - де ми ініціалізуємо константи, зі шляхом , та перемінні для роботи зі Smarty,
Нижче створюємо самий об'єкт Smarty ініціалізуємо його значення.
Далі в index.php підключається mainFunction.php' з основними нашими функціями.
А саме загрузка сторінки і загрузка шаблона.
Далі в index.php оприділяємо назву контролера та його ім'я функції яка сформує нам сторінку.
І викликаємо loadPage() для формування сторінки, 1-об'єк смарті з config.php, 2 - ім'я контролера 3 - ім'я функції
В  mainFunction.php ми бачимо загрузку нашого контроллера виявлємо функцію та викликаємо її
В IndexAction.php, де в функції ініціалізуємо перемінну smarty для передачі її в шаблон,
І викликаємо функцію loadTemplate($smarty, 'index'); 2 - шаблон який потрібно загрузити index.tpl

В  mainFunction.php викликається повертає результат виконання IndexAction.php  функції loadTemplate
 і mainFunction.php резутат є, де функція loadPage викликається в index.php з отриманим резудьтатом та даними з бд
 які виведені в шаблонах

*/

// Тобто ми через _GET підключаємося до файла та якоїсь конкретної функції
// Виявляємо з яким контролером буде працювати
// ucfirst() - Перша буква заголовка буде з великої літери
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';
// Вирішуємо з якою функцією будемо працювати
$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';

// ініціалізація змінної шаблнізатора кількості елементів в корзині
$smarty->assign('cartCntItems', count($_SESSION['cart']));

// Створюємо сторінку $smarty об'єк шаблонізатора
loadPage($smarty, $controllerName, $actionName);








