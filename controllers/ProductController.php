<?php
/**
 *
 * Контролер відправки товара (/product/1) приклад URL
 *
 */

//підключення моделей
include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';

/**
 * Формувння сторінки доступа
 *
 * @param object $smarty шаблонізатор
 */
function indexAction($smarty){
    $itemId = isset($_GET['id']) ? $_GET['id'] : null;
    if($itemId == null) exit();

   // Отримати дані продукта
    $rsProduct = getProductById($itemId);

    // отримати дані категорії для формування головної сторінки сайта
    $rsCategories = getAllMainCatsWithChildren();

    // Ініціалізація перемінних $smarty
    $smarty->assign('pageTitle', '');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProduct', $rsProduct);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
}