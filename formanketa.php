<?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "model";

$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fio = $_POST["full-name"];
    $vozrast = $_POST["age"];
    $rost = $_POST["height"];
    $ves = $_POST["weight"];

    // Подготовленный запрос для вставки данных в таблицу
    $stmt = $conn->prepare("INSERT INTO anketui (FIO, vozrast, rost, ves) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siii", $fio, $vozrast, $rost, $ves);

    // Выполнение подготовленного запроса
    if ($stmt->execute()) {
        echo "Спасибо за заявку! Мы обязательно рассмотрим вашу анкету и свяжемся.";
    } else {
        echo "Ошибка при отправке данных в базу данных: " . $conn->error;
    }

    // Закрытие подготовленного запроса и соединения с базой данных
    $stmt->close();
    $conn->close();
}
?>