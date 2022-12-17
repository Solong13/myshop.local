<?php
/**
 * контролер роботи з корзиною (/cart00/)
 */


//підключення модулів
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Додавання товарів в корзину
 *
 * @param integer id GET параметр - ID додання продукта
 * @param json інформація про операції (успіх,кількість в корзині)
 */
function addtocartAction(){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if(! $itemId) return false;

    // дані які при додавати в корзину
    $resData = array();

    // якщо значення не знайдене, ми його додаєм
    if(isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false) {
        $_SESSION['cart'][] = $itemId;
        // вивід кількості товарів в корзині
        $resData['cntItems'] = count($_SESSION['cart']);
        // функція відпрацювала - товар доданий
        $resData['success'] = 1;
     } else{
        $resData['success'] = 0;
    }

    // Возвращает JSON-представление данных , а потім будемо передавати їх в JS
    echo  json_encode($resData);
}

/**
 * Видалення продукта з корзини
 *
 * @param  integer id GET параметр - ID видаленого із корзини продукта
 * @return  json інформацію про оперцацію (успіх, кількість елементів в корзині)
 */
function removefromcartAction(){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if(! $itemId) exit();

    $resData = array();
    $key = array_search($itemId, $_SESSION['cart']);
    if($key !== false){
        unset($_SESSION['cart'][$key]);
        $resData['success'] = 1;
        $resData['cntItems'] = count($_SESSION['cart']);
    } else{
        $resData['success'] = 0;
    }

    echo json_encode($resData);
}

