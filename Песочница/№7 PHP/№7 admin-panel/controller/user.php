<?php
require 'bd/mysqli-builder.php';

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
                session_start();
                $_SESSION['session_username'] = $this->username;
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // 0 - не совподают пароли
    // 1 - такой пользователь существует
    // 2 - ошибка при создании
    public function SignUp() {
        $query_builder = new Query_builder();

        $response = $query_builder->query("SELECT * FROM users Where `username` = \"$this->username\"");
        if($response) {
            return 1;
        } else {
            if($this->password === $this->re_password) {
                $response = $query_builder->query("INSERT INTO `users`(`username`, `password`) VALUES (\"$this->username\", \"$this->password\")");
                if($response) {
                    return true;
                } else {
                    return 2;
                }
            } else {
                return 0;
            }
        }
    }
}
?>