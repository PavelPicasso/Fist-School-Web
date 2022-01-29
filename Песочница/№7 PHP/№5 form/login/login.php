<?php
    require 'constants.php';

    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database);

    if (!$link) {
        echo "<p>Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error() . "</p>";
    }

    $login = strip_tags($_POST['login']);
    $password = strip_tags($_POST['password']);

    // выполняем операции с базой данных
    $sql = "SELECT * FROM `users` WHERE `username` = '$login'"; // выбираем всех в таблице users
    $result = mysqli_query($link, $sql);

    if (!$result) {
        echo "<p>Произошла ошибка при выполнении запроса</p>";
    }
    else {
        $data = mysqli_fetch_array($result);
        
        if($data['username'] == $login && $data['password'] == md5($password)) {
            echo "Добро пожаловать: " . $data['username'];
        } else {
            echo "не верен логин или пароль";
        }
    }
?>