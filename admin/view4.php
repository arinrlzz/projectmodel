
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
$sql = "SELECT f.name AS фотосессия, f.date AS дата, c.name AS клиент
        FROM Fotoses f
        JOIN Client c ON f.id = c.id
        WHERE f.id = '1'";

$stmt = $db->query($sql);
echo "<h1>Представление 4</h1>";
echo "<h2>Получить список всех фотосессий, проведенных с участием определенной модели.</h2>";

// Обработка результатов запроса
echo "<table>
        <tr>
            <th>Название фотосессии</th>
            <th>Дата фотосессии</th>
            <th>Имя клиента</th>
        </tr>";
while ($row = $stmt->fetch()) {
    echo "<tr>
            <td>" . $row['фотосессия'] . "</td>
            <td>" . $row['дата'] . "</td>
            <td>" . $row['клиент'] . "</td>
          </tr>";
}
echo "</table>";
?>
