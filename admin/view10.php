
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

// Подготовка и выполнение второго SQL запроса
$sql2 = "SELECT m.name
         FROM models m
         JOIN Kontract k ON m.id = k.id
         WHERE '2020-12-05' BETWEEN k.date_start AND k.date_finish";

$stmt2 = $db->query($sql2);

echo "<h1>Представление 10</h1>";
echo "<h2>Получить список всех моделей, у которых активен контракт на определенную дату.</h2>";

echo "<table>
        <tr>
            <th>Имя модели</th>
        </tr>";
while ($row = $stmt2->fetch()) {
    echo "<tr>
            <td>" . $row['name'] . "</td>
          </tr>";
}
echo "</table>";
?>