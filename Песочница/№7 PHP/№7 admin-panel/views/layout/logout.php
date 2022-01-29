<?php
session_start();

unset($_SESSION['session_username']);
session_destroy();

header('Location: /admin-panel/views/layout/login.php');
?>