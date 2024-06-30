<?php
// Подключение к базе данных (если оно еще не было выполнено)
include "admin.php";

// Получение имени таблицы из формы
$tableName = $_POST['table'];

// Формирование запроса INSERT на основе введенных данных
$query = "INSERT INTO $tableName (";
$columns = array();
$values = array();
foreach ($_POST as $key => $value) {
    if ($key != 'table') {
        $columns[] = $key;
        $values[] = "'".mysqli_real_escape_string($link, $value)."'";
    }
}
$query .= implode(", ", $columns) . ") VALUES (" . implode(", ", $values) . ")";

// Выполнение запроса к базе данных
if (mysqli_query($link, $query)) {
    echo "Данные успешно добавлены в базу данных.";
} else {
    echo "Ошибка: " . $query . "<br>" . mysqli_error($link);
}

// Закрытие соединения с базой данных
mysqli_close($link);
?>