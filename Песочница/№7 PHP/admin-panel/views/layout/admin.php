<?php
require '../../controller/bd/mysqli-builder.php';

session_start();
if (isset($_SESSION["session_username"])) {
    $query_builder = new Query_builder();
    $user = $_SESSION['session_username'];
    $result = $query_builder->query("SELECT * FROM `users` WHERE `username` = '$user'");
} else {
    echo "<script>alert(\"Вам сюда нельзя!\");</script>";
    echo " <script>window.location.href = document.location.origin + \"/admin-panel/views/layout/login.php\"</script>";
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <link rel="stylesheet" href="../../static/css/normalize.css">
    <link rel="stylesheet" href="../../static/css/style.css">
    <link rel="stylesheet" href="../../static/css/header.css">
    <link rel="stylesheet" href="../../static/css/main.css">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <header>
        <img src="../../static/img/logo-height-101.png" alt="Admin Panel">
        <h1>PHP CRUD GENERATOR</h1>

        <a href="logout.php" class="profile">
            <span class="material-icons">person</span>
            <span class="username"> <?php echo $result[0][1]?> </span>
            <span class="material-icons">keyboard_arrow_right</span>
        </a>
    </header>

    <main>
        <!-- Table -->
    </main>




    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
</body>
</html>