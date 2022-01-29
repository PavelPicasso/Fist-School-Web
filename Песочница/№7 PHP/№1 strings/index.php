<?php
    $input = 'This is the end'; 
    $search = 'is';
    $position = strpos($input, $search); // 2
    if($position)
    {   
        echo "Позиция подстроки '$search' в строке '$input': $position<br>";
    } else {
        echo "ничего не найдено <br>";
    }

    $input = 'Мама мыла раму'; 
    $search = 'мы';
    $position = strpos($input, $search); // 9
    echo "Позиция подстроки '$search' в строке '$input': $position<br>";

    $position = mb_strpos($input, $search); // 5
    echo "Позиция подстроки '$search' в строке '$input': $position<br>";

    $input = 'This is the end'; 
    $search = 'is';
    $position = mb_strrpos($input, $search);
    echo "Позиция подстроки '$search' в строке '$input': $position<br>";

    $input = '  Мама мыла раму    ';
    $input = trim($input); 
    echo $input . '<br>';

    $input = 'The World is Mine';
    echo $input . " | " . mb_strtolower($input) . " | " . mb_strtoupper($input) . "<br>";

    $input = 'Мама мыла раму';
    $num = mb_strlen($input);
    echo "В слове '$input' количество букв = $num<br>";

    // для кириллици mb_substr()
    $input = 'The world is mine!';
    $subinput1 = substr($input, 2);
    $subinput2 = substr($input, 2, 6);
    echo $input . " | " . $subinput1 . " | " . $subinput2 . "<br>";

    $input = 'Мама мыла раму'; 
    $input = str_replace("мы", "ши", $input);
    echo $input;


    $input = '<h1>Header</h1>';
    echo $input . strip_tags($input) . "<br>";
	
    echo "<br><a href=\"https://metanit.com/php/tutorial/4.1.php\">Работа со строками</a><br>";
    echo "<a href=\"https://www.php.net/manual/ru/ref.strings.php\">Все функции строк</a>";
?>