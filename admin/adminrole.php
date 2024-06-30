<?php 
include "admin.php";
$result = mysqli_query($link, "SELECT * FROM `models`");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kurale&display=swap">

    <title>VLmodels</title>
</head>
<body>
       <div class="container">
            <div class="row">
                <div class="menu">
                    <ul>   
                        <li><a href="show_table.php?table=1">модели</a></li>
                        <li><a href="show_table.php?table=2">контракты</a></li>
                        <li><a href="show_table.php?table=3">кастинги</a></li>
                        <li><a href="show_table.php?table=4">фотосессии</a></li>
                        <li><a href="show_table.php?table=5">клиенты</a></li>
                        <li><a href="show_table.php?table=6">навыки</a></li>
                        <li><a href="show_table.php?table=7">пользователи</a></li>
                        <li><a href="show_table.php?table=8">анкеты</a></li>
                    </ul>
                </div>
            </div>
       </div>
       <div class="container">
            <div class="row">
                <div class="menu">
                    <ul>   
                        <li><a href="view1.php?table=1">представление 1</a></li>
                        <li><a href="view2.php?table=2">представление 2</a></li>
                        <li><a href="view3.php?table=3">представление 3</a></li>
                        <li><a href="view4.php?table=4">представление 4</a></li>
                        <li><a href="view5.php?table=5">представление 5</a></li>
                        <li><a href="view6.php?table=5">представление 6</a></li>
                        <li><a href="view7.php?table=7">представление 7</a></li>
                        <li><a href="view8.php?table=8">представление 8</a></li>
                        <li><a href="view9.php?table=9">представление 9</a></li>
                        <li><a href="view10.php?table=10">представление 10</a></li>
                    </ul>
                </div>
            </div>
       </div>
       
    </body>
</html>