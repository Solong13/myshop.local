<?php
/**
 * Модель для таблиці категорій
 */


/**
 * Отримати дочірні категорії для категорій $catId
 *
 * @param integer $catId ID категорії
 * @return array масив дочірніх категорій
 */
function getChildrenForCat($catId){
    $sql = "SELECT * FROM categories WHERE parent_id = '$catId'";

    $rs = mysql_query($sql);

    // щоб повернути дані в асоціативному масиві
    return creatSmartyRsArray($rs);
}

/**
 * Отримати головгні категорії з прив'язками дочірніх
 *
 * @return array масив категорій
 */
function getAllMainCatsWithChildren(){
    // вибрка головних категорій
    $sql = 'SELECT * FROM categories WHERE parent_id = 0';
    // підготовка запита і звернення до MYSQL
    $rs = mysql_query($sql);

    // куди будемо складати масив даних з бд
    $smartyRs = array();
    while ($row = mysql_fetch_assoc($rs)){
        // для кожної головнлї категорії обираємо
        // її дочірні
        $rsChildren = getChildrenForCat($row['id']);

        if($rsChildren){
            // створюємо ще один масив з ключем
            // і наділяємо його масивом з дочірніми елементами
            $row['children'] = $rsChildren;
        }

        $smartyRs[] = $row;
    }

    return $smartyRs;

}

