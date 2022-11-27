<?php

/**
 * Формуванння сторінки при запиті 
 * 
 * @param string $controllerName назва контролера 
 * @param string $actionName назва функції обробки сторінки 
 */
function loadPage($smarty, $controllerName, $actionName = 'index'){
    // .. виходимо з паки на рівень вище
    // підключення контроллера
    include_once PathPrefix . $controllerName . PathPostfix;
    // Орієнтована функція підключення  повна назва

    $function = $actionName.'Action';
    $function($smarty);
}

/**
 * Загрузка шаблона 
 *
 * @param object $smarty об'єкт шаблонізатора
 * @param string $templateName назва файла шаблона
 */
function loadTemplate($smarty, $templateName){
    // це типу шлях назва та розширення 
    TemplatePrefix.$templateName .= TemplatePostfix;
    // викликаємо метод об'єкта і передаємо саме назву шаблона з розширенням .tpl
    $smarty->display($templateName);
}

/**
 * Функція відладки. Зупиняє роботу програми вводячи значення змінної $value
 *
 * @param variant $value - змінна для виводу її на сторінці
 * @param int $die
 */
// якщо $die = 1 то функція зупиняється
function d($value = null, $die = 1){
    echo 'Debug: <br /><pre>';
    // значення змынної
    print_r($value);
    echo '</pre>';

    if($die) die;
}