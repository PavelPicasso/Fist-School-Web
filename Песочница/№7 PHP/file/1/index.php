<?php
    echo "<h1>Перемещение файла</h1> <br> Если у нас в каталоге файла hello.txt имеется подкаталог subdir, то файл будет в него перемещен. Если файл был успешно перемещен, функция возвратит значение true.<br>";
    if (!rename("hello.txt", "subdir/hello.txt")) {
        echo "Ошибка перемещения файла";
    }
    else {
        echo "Файл перемещен";
    }

    echo "<h1>Копирование файла</h1>";
    if (copy("test.txt", "test_copy.txt")) {
        echo "Копия файла создана";
    }
    else {
        echo "Ошибка копирования файла";
    }

    echo "<h1>Удаление файла</h1>";
    if (unlink("test_copy.txt")) {
        echo "Файл удален";
    }
    else {
        echo "Ошибка при удалении файла";
    }
    
    echo "<h1>Создание каталога</h1>";
    if(mkdir("newdir"))
        echo "Каталог создан";
    else
        echo "Ошибка при создании каталога";

    echo "<h1>Удаление каталога</h1>";
    if(rmdir("newdir"))
        echo "Каталог удален";
    else
        echo "Ошибка при удалении каталога";

    echo "<h1>Операции с каталогами</h1>";
    $path = getcwd();
    echo $path . "<br>";

    $dir = getcwd(); // получаем текущий каталог
 
    if (is_dir($dir)) // является ли путь каталогом
    {
        if ($dh = opendir($dir)) // открываем каталог
        {
            // считываем по одному файл или подкаталогу
            // пока не дойдем до конца
            while (($file = readdir($dh)) !== false) // ($file = readdir($dh))
            {
                // пропускаем символы .. и .
                if($file=='.' || $file=='..')
                    continue;
                // если каталог или файл
                if(is_dir($file))
                    echo "каталог: $file <br>";
                else
                    echo "файл: $file <br>";
            }
            closedir($dh); // закрываем каталог
        }
    }
?>