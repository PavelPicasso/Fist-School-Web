<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul>
        <li>$_FILES['file']['name']: имя файла</li>

        <li>$_FILES['file']['type']: тип содержимого файла, например, image/jpeg</li>

        <li>$_FILES['file']['size']: размер файла в байтах</li>

        <li>$_FILES['file']['tmp_name']: имя временного файла, сохраненного на сервере</li>
        
        <li>$_FILES['file']['error']: код ошибки при загрузке</li>
    </ul>
    <h2>Загрузка файла</h2>
    <form method="post" enctype='multipart/form-data'>
        <label for="file">Выберите файл: </label>
        <input type='file' id="file" name='filename' size='10' /></br>
        <input type='submit' value='Загрузить'/>
    </form>
</body>
</html>

<?php
    if ($_FILES && $_FILES['filename']['error']== UPLOAD_ERR_OK)
    {
        $name = $_FILES['filename']['name'];
        move_uploaded_file($_FILES['filename']['tmp_name'], $name);
        echo "<p>Файл загружен</p>";
    }
?>