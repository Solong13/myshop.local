<?php
/**
 * Модель для таблиці  користувачів (users)
 */

/**
 * Реєстрація нового користувача
 *
 * @param string $email пошта
 * @param string $pwdMD5 пароль зашифрований в MD5
 * @param string $name ім'я користувача
 * @param string $phone телефон
 * @param string $adress адреса користувача
 * @return  array масив нового користувача
 */
function registerNewUser($email, $pwdMD5, $name, $phone, $adress){

    // mysqli_real_escape_string - екранує спец символи, htmlspecialchars - перетворює в html сущності
    $email = htmlspecialchars(mysql_real_escape_string($email));
    $name = htmlspecialchars(mysql_real_escape_string($name));
    $phone = htmlspecialchars(mysql_real_escape_string($phone));
    $adress = htmlspecialchars(mysql_real_escape_string($adress));

    // `` - щоб не було помилки з зарезервованими іменами mysql
    $sql = "INSERT INTO users (`email`, `pwd`, `name`, `phone`, `adress`) 
    VALUES ('$email', '$pwdMD5', '$name', '$phone', '$adress')";

    $rs = mysql_query($sql);

    // Перевірка якщо запрос був успішний
    // то ми робимо вибірку з таблиці users
    // і забираємо дані користувача в ту функцію яка визвала registerNewUser
    // LIMIT 1 вивід 1 записі
    if($rs){
        $sql = "SELECT * FROM users WHERE 
            (`email` = '$email' and `pwd` = '$pwdMD5') LIMIT 1";


        $rs = mysql_query($sql);
        $rs = creatSmartyRsArray($rs);

        // якщо є дані в масиві -  ['success'] = 1 (true)
        if(isset($rs[0])){
            $rs['success'] = 1;
        }else{
            $rs['success'] = 0;
        }
    }else{
        $rs['success'] = 0;
    }
    return $rs;
}

/**
 * Перевірка параметрів для реєстрації користувачів
 *
 * @param string $email email
 * @param string $pwd1 пароль
 * @param string $pwd2 повтор пароль
 * @return array результат
 */
function checkRegisterParams($email, $pwd1, $pwd2){
    $res = null;

    // $res['success'] = false; для оптимізації
    if(!$email){
        $res['success'] = false;
        $res['message'] = 'Введіть пошту';
    }

    if(!$pwd1){
        $res['success'] = false;
        $res['message'] = 'Введіть пароль';
    }

    if(!$pwd2){
        $res['success'] = false;
        $res['message'] = 'Введіть повторно пароль';
    }

    if($pwd1 != $pwd2){
        $res['success'] = false;
        $res['message'] = 'Паролі не співпадають';
    }

    return $res;
}

/**
 * Перевірка почти (чи є email адрес в БД)
 *
 * @param string $email
 * @return array|false масив - рядок з таблиці users, або пустий масив
 */
function checkUserEmail($email){
    // Экранирует специальные символы в строках для использования в выражениях SQL
    $email = mysql_real_escape_string($email);
    $sql = "SELECT id FROM users WHERE email = '$email'";

    $rs = mysql_query($sql);
    $rs = creatSmartyRsArray($rs);

    return $rs;
}
