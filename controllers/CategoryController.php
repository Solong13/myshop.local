<?php
/**
 * Контролер сторінки категорій (/category/1)
 */

// Підключення моделі з якими ми будемо працювати
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Формування сторінки катагорій
 * @param object $smarty шаблонізатор
 */
function indexAction($smarty){
    // потрібно перехватити айді, взяти його значення
    $catId = isset($_GET['id']) ? $_GET['id'] : null;
    if($catId == null) exit();

    // отримати категорію по її айді, параметр ідентифікатор який нам прийшов через гет
    $rsCategory = getCatById($catId);
    d($rsCategory);
}