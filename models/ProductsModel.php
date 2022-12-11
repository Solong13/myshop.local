<?php
/**
 * Модель для таблиці (products)
 *
 */

/**
 * Отримуємо останні додані товари
 *
 * @param integer $limit ліміт товарів
 * @return array|false масив товарів
 */
// по замовчуванні $limit = null тобто виведемо всі товари
function getLastProducts($limit = null){
    // сортуємо по айді, де DESC - означає,
    // що сортуємо з останнього айді
    $sql = "SELECT * FROM `products` ORDER BY id DESC";

    if($limit){
        $sql .= " LIMIT $limit";
    }
    $rs = mysql_query($sql);

    return creatSmartyRsArray($rs);
}

/**
 * Отримати продукти для категорії $itemId
 *
 * @param integer $catId айді категорії
 * @return array|false масив продуктів
 */
function getProductsByCat($catId){
    $catId = intval($catId);
    $sql = "SELECT * FROM products WHERE  
    category_id = '$catId'";

    $rs = mysql_query($sql);

    return creatSmartyRsArray($rs);
}

/**
 * Отримати дані продукта по id
 *
 * @param integer $itemId id продукта
 * @return array масив даних продукта
 */
function getProductById($itemId){
    $itemId = intval($itemId);

    $sql = "SELECT * FROM products WHERE id ='$itemId'";

    $rs = mysql_query($sql);
    return mysql_fetch_assoc($rs);
}
