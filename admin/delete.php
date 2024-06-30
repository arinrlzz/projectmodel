<?php
// Подключение к базе данных (если оно еще не было выполнено)
include "admin.php";

// Получение имени таблицы и ID строки для удаления
$tableName = $_POST['table'];
$id = $_POST['id'];

// Создание запроса DELETE
$query = "DELETE FROM $tableName WHERE id = $id";

// Выполнение запроса к базе данных
if (mysqli_query($link, $query)) {
    echo "Запись успешно удалена.";
} else {
    echo "Ошибка: " . $query . "<br>" . mysqli_error($link);
}

// Закрытие соединения с базой данных
mysqli_close($link);
?>