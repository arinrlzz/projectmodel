
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
$table = isset($_GET['table']) ? $_GET['table'] : 6;

// Подготовка и выполнение второго SQL запроса
$sql2 = "SELECT kategory AS category, COUNT(*) AS model_count
         FROM models
         GROUP BY kategory";

$stmt2 = $db->query($sql2);

// Обработка результатов запроса 2
echo "<h1>Представление 6</h1>";
echo "<h2>Получить список общего количества моделей в каждой категории.</h2>";

echo "<table>
        <tr>
            <th>Категория</th>
            <th>Количество моделей</th>
        </tr>";
while ($row = $stmt2->fetch()) {
    echo "<tr>
            <td>" . $row['category'] . "</td>
            <td>" . $row['model_count'] . "</td>
          </tr>";
}
echo "</table>";

?>