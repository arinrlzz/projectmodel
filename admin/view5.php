
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
// Подключение к базе данных
$dsn = 'mysql:host=localhost;dbname=model';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
    exit();
}
$table = isset($_GET['table']) ? $_GET['table'] : 4;
// Подготовка и выполнение SQL запроса
$sql = "SELECT m.name AS модель
        FROM models m
        JOIN Navik n ON m.id = n.id
        WHERE n.name = 'каталог'";

$stmt = $db->query($sql);
echo "<h1>Представление 5</h1>";
echo "<h2>Получить список всех моделей, у которых определенные навыки (например, каталог или показ мод).</h2>";

// Обработка результатов запроса
echo "<table>
        <tr>
            <th>Модель</th>
        </tr>";
while ($row = $stmt->fetch()) {
    echo "<tr>
            <td>" . $row['модель'] . "</td>
          </tr>";
}
echo "</table>";
?>