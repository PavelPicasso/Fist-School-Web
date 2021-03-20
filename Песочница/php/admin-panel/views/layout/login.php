<?php
require '../../controller/user.php';

if (isset($_POST['btn'])) {
    $user = new User($_POST['login'], $_POST['password'], $_POST['password']);
    
    $result = $user->LogIn();
    if($result) {
        echo " <script>window.location.href = document.location.origin + \"/admin-panel/views/layout/admin.php\"</script>";
    } else {
        echo "<script>alert(\"Неверный логин или пароль!\");</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>

    <link rel="stylesheet" href="../../static/css/normalize.css">
    <link rel="stylesheet" href="../../static/css/style.css">
    <link rel="stylesheet" href="../../static/css/main.css">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <form action="login.php" id="loginform" method="post" name="loginform">
        <label for="">login</label>
        <input type="text" name="login" id="">

        <label for="">password</label>
        <input type="password" name="password" id="">

        <input type="submit" name="btn" value="Вход">
    </form>
</body>
</html>