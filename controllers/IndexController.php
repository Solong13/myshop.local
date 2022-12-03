<?php
/**
 * Контролер головної сторінки
 */

//підключенння моделі
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';


function testAction(){
    echo 'IndexController.php > testAction';
}

/**
 * Формування головної сторінки сайта
 * 
 * @param object $smarty шаблонізатор
 */
function indexAction($smarty){
    //получення всіх головних категорій з їх дочірніми/Функція відпрацює в моделях де поверне
    // нам результат у вигляді масива
    $rsCategories = getAllMainCatsWithChildren();

    // функція виводить кількість останніх (16) доданих товарів
    $rsProducts = getLastProducts(16);

    // ініцілізація премінної pageTitle зі значенням Головна сторінка сайта,
    // яку передамо в шаблон і в потрібних місцях викликаємо
    $smarty->assign('pageTitle', 'Головна сторінка сайта');
    // виводити можемо на екрна в шаблонізаторі наші дані з бд
    $smarty->assign('rsCategories', $rsCategories);

    //
    $smarty->assign('rsProducts', $rsProducts);

    // 1 параметр це об'єкт смарті, 2 який шаблон потрібно викликати і опрацювати 
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}