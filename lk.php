<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>account</title>
</head>
<body>
    <body>
        <nav>
            <ul>
                <li><a href="index.html"><img class="logoe" src="image/logo.svg"></a></li>
                <li><a href="index.html">О нас</a></li>
                <li><a href="index.html">Почему мы?</a></li>
                <li><a href="index.html">Отзывы</a></li>
                <li><a href="models.html">Модели</a></li>
                <li><a href="myaccount.html">Личный кабинет</a></li>
                <div class="strep1"></div>
            </ul>
        </nav>
        
        <?php
        require 'login.php';

// Check if the model data exists in the session
if (isset($_SESSION['modelData'])) {
    $modelData = $_SESSION['modelData'];
    // Now you can use $modelData to display the model information in HTML
    // For example:
    $modelName = $modelData['name'] ?? '';
    $modelPol = $modelData['pol'] ?? '';
    $modelVozrast = $modelData['vozrast'] ?? '';
    $modelRost = $modelData['rost'] ?? '';
    $modelVes = $modelData['ves'] ?? '';
    $modelOpit = $modelData['opit'] ?? '';
    $modelKontakt = $modelData['kontakt'] ?? '';
    $modelKategory = $modelData['kategory'] ?? '';
    $modelId = $modelData['id'] ?? ''; // Предполагается, что идентификатор модели хранится в данных

    // Определяем имя файла изображения на основе идентификатора модели
    $imageFilename = 'images/default.jpg'; // Изображение по умолчанию
    if ($modelId == 1) {
        $imageFilename = 'image/model1.svg'; // Замените на фактическое имя файла для модели 1
    } elseif ($modelId == 2) {
        $imageFilename = 'image/model2.svg'; // Замените на фактическое имя файла для модели 2
    } elseif ($modelId == 3) {
        $imageFilename = 'image/model3.svg'; // Замените на фактическое имя файла для модели 3
    } elseif ($modelId == 4) {
        $imageFilename = 'image/model4.svg'; // Замените на фактическое имя файла для модели 4
    } elseif ($modelId == 5) {
        $imageFilename = 'image/model5.svg'; // Замените на фактическое имя файла для модели 5
    } elseif ($modelId == 6) {
        $imageFilename = 'image/model6.svg'; // Замените на фактическое имя файла для модели 6
    }
    
   
} else {
    // If the model data doesn't exist, handle it appropriately
    // For example, redirect to the login page
    header('Location: index.html');
    exit;
}
?>
<div class="lk-cont">
<div class="lk-info">
    <div class="info">
        <a>Имя</a>
        <span><?php echo $modelName; ?></span>
    </div>
    <div class="info">
        <a>Пол</a>
        <span><?php echo $modelPol; ?></span>
    </div>
    <div class="info">
        <a>Возраст</a>
        <span><?php echo $modelVozrast; ?></span>
    </div>
    <div class="info">
        <a>Рост</a>
        <span><?php echo $modelRost; ?></span>
    </div>
    <div class="info">
        <a>Вес</a>
        <span><?php echo $modelVes; ?></span>
    </div>
    <div class="info">
        <a>Опыт</a>
        <span><?php echo $modelOpit; ?></span>
    </div>
    <div class="info">
        <a>Контакт</a>
        <span><?php echo $modelKontakt; ?></span>
    </div>
    <div class="info">
        <a>Категория</a>
        <span><?php echo $modelKategory; ?></span>
    </div>
</div>
<div class="sjsjss">
  <img src="<?php echo $imageFilename; ?>" alt="Model Image">   
</div>

</div>

        <div class="footer">
            <div class="menu-footer">
                <img class="logo-footers" src="image/logo.svg"> <br>
                <a  href="#logo">О нас</a> <br>
                    <a  href="#why">Почему мы?</a> <br>
                    <a  href="#otz">Отзывы</a> <br>
                    <a  href="models.html">Модели</a> <br>
                    <a  href="myaccount.html">Личный кабинет</a>
            </div>
            <div class="logo-footer">
                <img class="footer-logo" src="image/footer.svg">
            </div>
            <div class="contact-footer">
                <div class="contact">
                    <img class="con" src="image/inst.svg">
                    <img class="con" src="image/tg.svg">
                    <img class="con" src="image/vk.svg">
                </div>
                <a class="num">8-965-441-5247</a>
            </div>
        </div>
        <script src="js/main.js"></script>
</body>
</html>