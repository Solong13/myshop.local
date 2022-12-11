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

    // Проаисуємо значення для цих змінних відразу null,
    // щоб уникнути warning php в подальшому виконанні коду
    // де обераємо які категорії завантажуються
    $rsChildCats = null;
    $rsProducts = null;

    // отримати категорію по її айді,
    // параметр ідентифікатор який нам прийшов
    // через гет. Обрати головні або дочірні товари
    // Повертає нам ассоціативний масив за значеннями [id] [parent_id] [name]
    $rsCategory = getCatById($catId);

    // якщо головна категорія, показуємо дочірні категорії,
    // інакше товар
    if($rsCategory['parent_id'] == 0){
        // виводимо дочірні категорії
        $rsChildCats = getChildrenForCat($catId);
    }else{
        // виводимо товари доічірніх категорій
        $rsProducts = getProductsByCat($catId);
    }

    // ініціалізація категорій для побудови нашого лівого меню
    // з основними та дочірніми категоріями
    $rsCategories = getAllMainCatsWithChildren();

    // товари категорій де буде виводитися наші всі категорії
    $smarty->assign('pageTtile', 'Товари категорій' . $rsCategory['name']);

    // головна категорія
    $smarty->assign('rsCategory', $rsCategory);
    // продукти які там лежать(опис обраного товару)
    $smarty->assign('rsProducts', $rsProducts);
    // і самі дочірні категорії
    $smarty->assign('rsChildCats', $rsChildCats);

    // передаємо $rsCategories для побудови нашого бокового меню
    $smarty->assign('rsCategories', $rsCategories);

    // заповнюємо самі шаблони
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'category');
    loadTemplate($smarty, 'footer');

}