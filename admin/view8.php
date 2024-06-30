
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
    $db = new PDO($dsn, $username, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
    exit();
}
$table = isset($_GET['table']) ? $_GET['table'] : 4;
// Подготовка и выполнение SQL запроса

// Подготовка и выполнение второго SQL запроса
$sql = "SELECT name
         FROM models
         WHERE opit = 'средний'";

$stmt = $db->query($sql);

// Обработка результатов второго запроса
echo "<h1>Представление 8</h1>";
echo "<h2>Получить список всех моделей, у которых определенный уровень опыта</h2>";

echo "<table>
        <tr>
            <th>Имя модели</th>
        </tr>";
while ($row = $stmt->fetch()) {
    echo "<tr>
            <td>" . $row['name'] . "</td>
          </tr>";
}
echo "</table>";
?>