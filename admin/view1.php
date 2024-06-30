
<?php
// Connection to the database (using PDO)
$dsn = 'mysql:host=localhost;dbname=model';
$username = 'root';
$password = '';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}

// Getting the 'table' parameter from the URL
$table = isset($_GET['table']) ? $_GET['table'] : 1;

// Preparation and execution of the SQL query
$sql3 = "SELECT 
    m.name, 
    m.pol, 
    m.vozrast, 
    m.rost, 
    m.ves
    FROM 
    models m
    WHERE 
    m.rost = :height 
    AND m.ves = :weight";

$stmt3 = $db->prepare($sql3);
$stmt3->execute(array(':height' => 178, ':weight' => 55));

// Handling the results of the query
echo "<h1>Представление 1</h1>";
echo "<h2>Получить список всех моделей с определенными физическими параметрами</h2>";


echo "<table>
<tr>

<th>Имя</th>
<th>Пол</th>
<th>Возраст</th>
<th>Рост</th>
<th>Вес</th>
</tr>";
while ($row = $stmt3->fetch()) {
    echo "<tr>
    <td>" . $row['name'] . "</td>
    <td>" . $row['pol'] . "</td>
    <td>" . $row['vozrast'] . "</td>
    <td>" . $row['rost'] . "</td>
    <td>" . $row['ves'] . "</td>
    </tr>";
}
echo "</table>";
?>

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