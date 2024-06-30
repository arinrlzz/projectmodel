<?php
// Подключение к базе данных (если оно еще не было выполнено)
include "admin.php";

// Получение параметров из POST запроса и экранирование значений
$tableName = mysqli_real_escape_string($link, $_POST['table']);
$id = mysqli_real_escape_string($link, $_POST['id']);

// Проверка наличия имени таблицы в списке допустимых таблиц
$allowedTables = array("models", "Kontract", "Kasting", "Fotoses", "Client", "Navik"); // список допустимых таблиц
if (in_array($tableName, $allowedTables)) {
    // Запрос на выборку данных для редактирования без использования подготовленного запроса
    $query = "SELECT * FROM $tableName WHERE id = '$id'";
    $result = mysqli_query($link, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            // Здесь можно использовать $row для работы с полученными данными
        } else {
            echo "Нет данных для отображения.";
        }
    } else {
        echo "Ошибка выполнения запроса: " . mysqli_error($link);
    }
} else {
    echo "Недопустимая таблица.";
}

// Закрытие соединения с базой данных
mysqli_close($link);
?>

