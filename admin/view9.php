
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

// Подготовка и выполнение SQL запроса
$sql = "SELECT f.name 
        FROM Fotoses f
        JOIN Client c ON f.id = c.id
        WHERE f.ID_model = '1'";

$stmt = $db->query($sql);

echo "<h1>Представление 9</h1>";
echo "<h2>Получить список всех фотосъёмок, связанных с определенной моделью.</h2>";

echo "<table>
        <tr>
            <th>Название фотосессии</th>
        </tr>";
while ($row = $stmt->fetch()) {
    echo "<tr>
            <td>" . $row['name'] . "</td>
          </tr>";
}
echo "</table>";
?>