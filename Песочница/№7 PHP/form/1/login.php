<?php
    $login = "Не известно";
    $password = "Не известно";
    if(isset($_POST['login']) && isset($_POST['password'])) {
        $login=strip_tags($_POST['login']);
        $password = strip_tags($_POST['password']);
    }
        
    echo "Ваш логин: $login  <br> Ваш пароль: $password";
?>