<?php
require './bd/mysqli-builder.php';

class User {
    private $username, $password, $re_password;

    public function __construct($username, $password, $re_password) {
        $this->username = $username;
        $this->password = md5($password);
        $this->re_password = md5($re_password);
    }

    public function LogIn() {
        $query_builder = new Query_builder();
        $response = $query_builder->query("SELECT * FROM users Where `username` = \"$this->username\"");

        if($response) {
            if($response[0][2] === $this->password) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function SignUp() {
        $query_builder = new Query_builder();
        $data = [
            'username' => $this->username,
            'password' => $this->password   
        ];

        // дальше вам нудно проверить:
        // 1) совподают ли пароли
        // 2) существует ли такой пользователь
        // 3) если все ок, то занести данные в бд
    }
}
?>