<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}

include '../connect.php'; 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>РЖД</title>


    <!-- CSS -->
    <!-- Лого сайта -->
    <link rel="icon" type="image/png" href="../img/logo.png">

    

    <!-- Сзадний фон -->
    <link rel="stylesheet" type="text/css" href="../css/color-text1.css">
    <!--Основа сайта-->
    <link rel="stylesheet" type="text/css" href="../css/style11.css">
    <!--Шрифт-->

    <link rel="stylesheet" type="text/css" href="../css/shadow.css">

    <!-- css end -->


</head>
<body>
        <!-- navbar -->
        <div class="navbar">
            <div class="container">
                <div class="navbar-nav">
                    <div class="navbar-brand">
                        <a href="../index.php"><img class="navbar-brand-png" src="../img/logo_main.png"><a>
                    </div>
                    <div class="navs" id="navs">
                        <div class="navs-item notbtn"><a href="galery.php" class="txt-uppercase">Галерея</a></div>
                        <div class="navs-item notbtn"><a href="flight.php" class="txt-uppercase">Рейсы</a></div>
                        <div class="navs-item"><a href="../pages/auth.php"><button class="btn txt-uppercase shadow-sm">Войти</button></a></div>
                        <div class="navs-item"><a href="../pages/register.php"><button class="btn txt-uppercase shadow-sm">Регистрация</button></a></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- navbar end -->     

        <!-- jumbotron -->
<div class="raa">
<div class="container">
<div class="features-box">
    <h1 class="features-t">Регистрация</h1>
    <!-- Форма регистрации -->

       

    <form action="../RAA/signup.php" method="post" enctype="multipart/form-data" class="raa">
        <label>ФИО</label>
        <input class="raa" type="text" name="full_name" placeholder="Только буквы и пробелы">

        <label>Логин</label>
        <input class="raa" type="text" name="login" required placeholder="Логин. Длина от 3 до 8">

        <label>Почта</label>
        <input class="raa" type="email" name="email" required placeholder="Требуются символ собачка (@) и точка (.)">

        <label>Пароль</label>
        <input class="raa" type="password" name="password" required placeholder="Пароль. Длина от 4 до 16.">

        <label>Подтверждение пароля</label>
        <input class="raa" type="password" name="password_confirm" required placeholder="Подтвердите пароль">
        <p><button class="raa" type="submit" name = "REGISTR">Зарегистрироваться</button>

        <p>
            У вас уже есть аккаунт? - <a href="../pages/auth.php" class="raa">авторизируйтесь</a>!
        </p>
        <?php
            if ($_SESSION['message']) {
                echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
            }
            unset($_SESSION['message']);
        ?>
    </form>
</div>
</div>
</div>


</body>
</html>