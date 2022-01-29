<?php
    $phones[0] = "Nokia N9";
    $phones[1] = "Samsung Galaxy ACE II";
    $phones[2] = "Sony Xperia Z3";
    $phones[3] = "Samsung Galaxy III";
    $num = count($phones);

    for($i = 0; $i < $num; $i++)
        echo "$phones[$i] <br />";
    echo "Колличесво элементов в массиве = $num <br>";

    echo "<br>";
    print_r($phones);
    echo "<br>";

    // получим элемент по ключу 1
    $myPhone = $phones[1];
    echo "$myPhone <br />";
    // присвоение нового значения
    $phones[1] = "Samsung X650";
    echo "$phones[1] <br />";

    $phones["nokia"] = "Nokia N9";
    $phones["samsumg"] = "Samsung Galaxy III";
    $phones["sony"] = "Sony Xperia Z3";
    $phones["apple"] = "iPhone5";
    echo $phones["samsumg"] . "<br>";

    echo "<h1>Оператор array</h1><br>";
    $phones = array('iPhone', 'Samsung Galaxy S III', 'Nokia N9', 'Sony XPeria Z3');
    echo $phones[1];

    $phones = array(
        "apple" => "iPhone5",
        "samsumg" => "Samsung Galaxy III", 
        "nokia" => "Nokia N9",
        "sony" => "Sony XPeria Z3"
    );
    echo $phones["samsumg"]  . "<br>";

    echo "<h1>Перебор ассоциативных массивов</h1>";
    $phones = array(
        "apple"=>"iPhone5", 
        "samsumg"=>"Samsung Galaxy III", 
        "nokia" => "Nokia N9", 
        "sony" => "Sony XPeria Z3"
    );
    foreach($phones as $item)
        echo "$item <br />";

    echo "<br>";
    $phones = array(
        "apple"=>"iPhone5", 
        "samsumg"=>"Samsung Galaxy III", 
        "nokia" => "Nokia N9", 
        "sony" => "Sony XPeria Z3"
    );
    foreach($phones as $key=>$value)
    echo "$key => $value <br />";

    echo "<h1>Многомерные массивы</h1><br>";
    $phones = array(
        "apple"=> array("iPhone5", "iPhone5s", "iPhone6") , 
        "samsumg"=>array("Samsung Galaxy III", "Samsung Galaxy ACE II"),
        "nokia" => array("Nokia N9", "Nokia Lumia 930"), 
        "sony" => array("Sony XPeria Z3", "Xperia Z3 Dual", "Xperia T2 Ultra"));
    foreach ($phones as $brand => $items)
    {
        echo "<h3>$brand</h3>";
        echo "<ul>";
        foreach ($items as $value)
        {
            echo "<li>$value</li>";
        }

        echo "</ul>";
    }


    echo "<h1>Функция is_array</h1>";
    $isar = is_array($technics);
    echo ($isar) ? "это массив" : "это не массив";

    echo "<h1>Функции count/sizeof</h1>";
    $number = count($technics);
    // то же самое, что
    // $number = sizeof($technics);
    echo "В массиве technics $number элементов";

    echo "<h1>Функции shuffle</h1>";
    $os = array("Windows 95", "Windows XP", "Windows Vista", "Windows 7", "Windows 8", "Windows 10");
    shuffle($os);
    print_r($os);
    // один из возможных вариантов
    // Array ( [0] => Windows 95 [1] => Windows 7 [2] => Windows Vista [3] => Windows XP [4] => Windows 10 [5] => Windows 8)

    echo "<h1>Функции compact</h1>";
    $model = "Apple II";
    $producer = "Apple";
    $year = 1978;
    
    $data = compact('model', 'producer', 'year');
    print_r($data);
    // получится следующий вывод
    // Array ( [model] => Apple II [producer] => Apple [year] => 1978 ) 

    echo "<h1>Сортировка массивов</h1>";
    $tablets = array(
        "lenovo" => "Lenovo IdeaTab A3500", 
        "samsung" => "Samsung Galaxy Tab 4",
        "apple" => "Apple iPad Air"
    );

    /*
        SORT_REGULAR: автоматический выбор сортировки

        SORT_NUMERIC: числовая сортировка

        SORT_STRING: сортировка по алфавиту
    */

    asort($tablets, SORT_STRING);
    
    echo "<ul>";
    foreach ($tablets as $key => $value)
    {
        echo "<li>$key : $value</li>";
    }
    echo "</ul>";

    arsort($tablets);
    echo "<ul>";
    foreach ($tablets as $key => $value)
    {
        echo "<li>$key : $value</li>";
    }
    echo "</ul>";

    ksort($tablets, SORT_STRING);
    echo "<ul>";
    foreach ($tablets as $key => $value)
    {
        echo "<li>$key : $value</li>";
    }
    echo "</ul>";

    // krsort в обратном порядке для ключей
?>