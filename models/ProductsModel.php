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
