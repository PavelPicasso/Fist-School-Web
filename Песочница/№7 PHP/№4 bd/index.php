<?php
    require 'constants.php';

    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database);
    if (!$link){
        echo "<p>Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error() . "</p>";
        return 0;
    }
    else {
        echo "<p>Соединение установлено успешно</p>";
    }


    function query($link, $sql) {
        $result = mysqli_query($link, $sql);

        if (!$result) {
            echo "<p>Произошла ошибка при выполнении запроса</p>";
        } {
            echo "<p>Запрос выполненен успешно</p>";
        }

        return $result;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bd</title>
</head>

<body>
    <h1>Работа с MySQL в PHP</h1>
    
    <?php
        
        // выполняем операции с базой данных
        $sql = "SELECT * FROM users"; // выбираем всех в таблице users
        $result = query($link, $sql);

        if ($result != 0) {
            $rows = mysqli_num_rows($result); // количество полученных строк
            echo "<p>количество полученных строк = " . $rows . "</p>";

            echo "<table>
                    <tr>
                        <th>id</th>
                        <th>username</th>
                        <th>password</th>
                    </tr>"
            ;
            for ($i = 0; $i < $rows; $i++) {
                // mysqli_fetch_array получает строку из таблицы
                $row = mysqli_fetch_row($result); // получить действительные данные
                echo "<tr>";
                    for ($j = 0; $j < count($row); $j++) {
                        echo "<td>$row[$j]</td>";
                    }
                echo "</tr>";
            }
            echo "</table>";

            // mysqli_free_result($result); // очистка
        }

        $sql = "SELECT * FROM users Where `username` = 'test'"; // выбираем из всей таблице users одного
        $result = mysqli_query($link, $sql);

        if (!$result) {
            echo "<p>Произошла ошибка при выполнении запроса</p>";
        }
        else {
            $data = mysqli_fetch_row($result);
            echo "
                <ul>
                    <li><b>Нашли одного конкретного</b></li>
                    <li><b>id</b> $data[0]</li>
                    <li><b>username</b> $data[1]</li>
                    <li><b>password</b> $data[2]</li>
                </ul>
            ";
            
        }

        // закрываем подключение
        mysqli_close($link);
    ?>

</body>
</html>