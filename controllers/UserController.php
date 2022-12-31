<?php
/**
 * Контроллер функцій користувача
 */

//підключення модулів
include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';

/**
 * AJAX реєстрація користувача
 * Ініціалізація змінної сесії ($_REQUEST['user'])
 *
 * @return json масив даних новго користувача
 */
function registerAction(){
    // $_REQUEST['email'] містить  собі дані $_GET i $_POST
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);

    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;

    // необов'язкові дані
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $name = trim($name);

    // перевірка обов'язкових даних

    // змінна в яку будемо складувати результати
    $resData = null;
    $resData = checkRegisterParams($email, $pwd1, $pwd2);

    // після функції вище  перевіряємо якщо немає $resData(а в нас вони є) перевіряємо далі checkUserEmail,
    // якщо такої пошти в базі немає створюємо далі пароль
    if (!$resData && checkUserEmail($email)){
        $resData['success'] = false;
        $resData['message'] = "Користувач з таким email '$email' уже зареєстрованний";
    }

    if(!$resData){
        // Возвращает MD5-хеш строки
        $pwdMD5 = md5($pwd1);

        $userData = registerNewUser($email, $pwdMD5, $name, $phone, $adress);

        // створення сесійної змінної для маніпуляції даними
        if($userData['success']){
            $resData['message'] = "Користувач успішно зареєструвався";
            $resData['success'] = 1;

            // спрощення запису інакше довеось б писати $userData[0]['name']
            $userData = $userData[0];
            // коли при реєстрації вводиться ім'я = імені, або пошті, також ці дані можливо виводити в боковому меню
            $resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
            // якщо введені лише пошта то присвоюємодані пошти
            $resData['userEmail'] = $email;

            // а сесія для того щоб мати дані про користувача
            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $resData['userName'] ;
        }else{
            $resData['success'] = 0;
            $resData['message'] = "Помилка реєстрації";
        }
    }
    //  $resData для маніпуляції цих даних в main.js
    // а сесія для того щоб мати дані про користувача
    // не звертаючись/ витягуючи дані постійно з БД
    //json_encode — Возвращает JSON-представление данных
    echo json_encode($resData);
}



