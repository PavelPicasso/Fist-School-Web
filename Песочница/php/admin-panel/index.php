<!-- 
**********************************************************************
        В этом файле происходит проверха наших методов
**********************************************************************
-->

<?php
require 'controller/user.php';

// $query_builder = new Query_builder();
// $response = $query_builder->query("SELECT * FROM `users` WHERE 1");
// $response = $query_builder->query("INSERT INTO `users`(`username`, `password`, `role`, `first_name`, `name`, `avatar`) VALUES ('qwe','qwe','0' ,'qwe','qwe','qwe')");
// var_dump($response);

// Данные с формы
$data = array (
    "username" => "qwerty",
    "password" => "qwerty",
    "re-password" => "qwerty"
);

$user = new User($data["username"], $data["password"], $data["re-password"]);
$result = $user->LogIn();
if($result) {
    echo "Мы вошли";
} else {
    echo "Неверный логин или пароль!";
}

// $result = $user->SignUp();

// if($result === 0) {
//     echo "не совподают пароли";
// } elseif($result === 1) {
//     echo "такой пользователь существует";
// } elseif($result === 2) {
//     echo "ошибка при создании"; 
// } elseif($result === true) {
//     echo "Зарегестрированы";
// }
?>