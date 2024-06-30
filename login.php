<?php
session_start();

$db = mysqli_connect('localhost', 'root', '', 'model');

if ($db == false) {
    echo 'ошибка соединения';
    exit;
}

function getUserRole($db, $username, $passwordh)
{
    $sql = "SELECT role FROM users WHERE username = '$username' AND passwordh = '$passwordh'";
    $result = mysqli_query($db, $sql);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        return $row['role'] ?? null;
    }
    
    return null;
}

$username = $_POST['username'] ?? '';
$passwordh = $_POST['passwordh'] ?? '';

$role = getUserRole($db, $username, $passwordh);

if ($role === 'model') {
    $_SESSION['username'] = $username;
    $_SESSION['passwordh'] = $passwordh;

    $sqlModel = "SELECT * FROM models 
    WHERE id = (SELECT id_model FROM users WHERE username = '$username' AND passwordh = '$passwordh')";
    $resultModel = mysqli_query($db, $sqlModel);
    
    if ($resultModel) {
        $modelData = mysqli_fetch_assoc($resultModel);
        $_SESSION['modelData'] = $modelData; // Save model data in the session
        header('Location: lk.php'); // Redirect to the page with model data
        exit;
    } else {
        echo "Ошибка при получении данных модели";
        exit;
    }
} elseif ($role === 'administrator') {
    $_SESSION['username'] = $username;
    $_SESSION['passwordh'] = $passwordh;
    header('Location: admin/adminrole.php');
    exit;
}
?>