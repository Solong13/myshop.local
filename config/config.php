<?php
// Зберінаються загальні дані, функції для всього сайта

// функції для оптимізації загрузки сторінок 
// константи для звернення до контроллера
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');


// В нас буде два шаблона 1 стандартний default і Smarty

//> Викорстовуємо шаблон
$template = 'default';

// шлях до файла шаблонів (*.tpl)
define ("TemplatePrefix", "../views/$template/");
define ("TemplatePostfix", ".tpl");

//шлях до файлів в вебпросторі тобто в папці www
define ("TemplateWebPath", "/templates/$template/");
//<


//>Ініціалізація шаблонізатора Smarty
// put full path to Smarty.class.php
require("../library/Smarty/libs/Smarty.class.php");
// створюємо екземпляр  об'єкт смарт
$smarty = new Smarty();

// Ініціалізація його головних властивойстей 

// говоримо об'єкту де знаходяться файли шаблона 
$smarty->setTemplateDir(TemplatePrefix);
// говоримо куди складувати зкомпільовані шаблони
$smarty->setCompileDir("../tmp/smarty/templates_c");
// файли для кешування 
$smarty->setCacheDir("../tmp/smarty/cache");
// системні налаштування 
$smarty->setConfigDir("../library/Smarty/configs");

//  пераша  змінна своя не смарті., для своїх ручних змін
$smarty->assign("templateWebPath", TemplateWebPath);
//<