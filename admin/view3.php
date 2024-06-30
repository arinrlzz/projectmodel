
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
$table = isset($_GET['table']) ? $_GET['table'] : 3;
// Подготовка и выполнение SQL запроса
$sql = "SELECT DISTINCT c.name AS client_name, c.kontact AS client_contact
        FROM Client c
        JOIN Kontract k ON c.id = k.id";

$stmt = $db->query($sql);

echo "<h1>Представление 3</h1>";
echo "<h2>Получить список всех клиентов, сотрудничающих с модельным агентством.</h2>";

echo "<table>
        <tr>
            <th>Имя клиента</th>
            <th>Контакт клиента</th>
        </tr>";
while ($row = $stmt->fetch()) {
    echo "<tr>
            <td>" . $row['client_name'] . "</td>
            <td>" . $row['client_contact'] . "</td>
          </tr>";
}
echo "</table>";
?>
