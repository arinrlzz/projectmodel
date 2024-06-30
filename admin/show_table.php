
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kurale&display=swap">
</head>
<body>
    
</body>
</html>

<?php
// Подключение к базе данных (если оно еще не было выполнено)
include "admin.php";

// Получение значения параметра table из URL
$tableNumber = $_GET['table'];

// Формирование запроса к базе данных в зависимости от значения table
$tableName = '';
$query = '';

switch ($tableNumber) {
    case '1':
        $tableName = 'models';
        $query = "SELECT * FROM $tableName";
        break;
    case '2':
        $tableName = 'Kontract';
        $query = "SELECT * FROM $tableName";
        break;
    case '3':
        $tableName = 'Kasting';
        $query = "SELECT * FROM $tableName";
        break;
    case '4':
        $tableName = 'Fotoses';
        $query = "SELECT * FROM $tableName";
        break;
    case '5':
        $tableName = 'Client';
        $query = "SELECT * FROM $tableName";
        break;
    case '6':
        $tableName = 'Navik';
        $query = "SELECT * FROM $tableName";
        break;
    case '7':
        $tableName = 'users';
        $query = "SELECT * FROM $tableName";
        break;
    case '8':
        $tableName = 'anketui';
        $query = "SELECT * FROM $tableName";
        break;
}

// Выполнение запроса к базе данных
$result = mysqli_query($link, $query);

// Отображение таблицы
echo "<table><tr>";
// Получение имен столбцов из метаданных
$columns = array();
if ($result) {
    $finfo = mysqli_fetch_fields($result);
    foreach ($finfo as $val) {
        echo "<th>" . $val->name . "</th>";
        $columns[] = $val->name;
    }
    echo "<th>Действия</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        foreach ($columns as $col) {
            echo "<td>" . $row[$col] . "</td>";
        }
        // Добавление кнопок для изменения и удаления
        echo "<td>
                
                <form method='post' action='delete.php'>
                    <input type='hidden' name='table' value='$tableName'>
                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                    <input type='submit' value='Удалить'>
                </form>
            </td>";
        echo "</tr>";
    }
} else {
    echo "Ошибка выполнения запроса: " . mysqli_error($link);
}
echo "</table>";

// Форма для добавления данных
echo "<form method='post' action='add.php'>";
foreach ($columns as $col) {
    echo "<input type='text' name='$col' placeholder='$col'>";
}
echo "<input type='hidden' name='table' value='$tableName'>
      <input type='submit' value='Добавить'>
      </form>";

// Закрытие соединения с базой данных
mysqli_close($link);
?>