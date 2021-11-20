<?php

session_start();

unset($_SESSION['session_username']);
session_destroy();
// header('Location: /builder/login.php');
?>