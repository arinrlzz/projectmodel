
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

// Preparation and execution of the SQL query
$sql = "SELECT 
    m.name, 
    m.pol, 
    m.vozrast
    FROM 
    models m
    WHERE 
    m.pol = :gender 
    AND m.vozrast = :age";

$stmt = $db->prepare($sql);
$stmt->execute(array(':gender' => 'ж', ':age' => 20));

// Handling the results of the query
echo "<h1>Представление 2</h1>";
echo "<h2>Получить список моделей по определенному полу и возрасту</h2>";


echo "<table>
<tr>
<th>Имя</th>
<th>Пол</th>
<th>возраст</th>
</tr>";
while ($row = $stmt->fetch()) {
    echo "<tr>
    <td>" . $row['name'] . "</td>
    <td>" . $row['pol'] . "</td>
    <td>" . $row['vozrast'] . "</td>
    </tr>";
}
echo "</table>";
?>