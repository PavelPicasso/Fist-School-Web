<?php
    require 'constants.php';
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
        // подключаемся к серверу
        $link = mysqli_connect($host, $user, $password, $database);

        if (!$link){
            echo "<p>Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error() . "</p>";
        }
        else {
            echo "<p>Соединение установлено успешно</p>";
        }

        // выполняем операции с базой данных
        $sql = "SELECT * FROM users"; // выбираем всех в таблице users
        $result = mysqli_query($link, $sql);

        if (!$result) {
            echo "<p>Произошла ошибка при выполнении запроса</p>";
        }
        else {
            $rows = mysqli_num_rows($result); // количество полученных строк
            echo "<p>количество полученных строк = " . $rows . "</p>";

            echo "<table>
                    <tr>
                        <th>Id</th>
                        <th>first_name</th>
                        <th>last_name</th>
                        <th>middle_name</th>
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

        $sql = "SELECT * FROM users Where `first_name` = 'test'"; // выбираем всех в таблице users
        $result = mysqli_query($link, $sql);

        if (!$result) {
            echo "<p>Произошла ошибка при выполнении запроса</p>";
        }
        else {
            $data = mysqli_fetch_row($result);
            echo "
                <ul>
                    <li><b>id</b> $data[0]</li>
                    <li><b>first_name</b> $data[1]</li>
                    <li><b>last_name</b> $data[2]</li>
                    <li><b>middle_name</b> $data[3]</li>
                </ul>
            ";
            
        }

        // закрываем подключение
        mysqli_close($link);
    ?>

</body>
</html>