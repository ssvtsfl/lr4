<?php
session_start();

if ($_SESSION['ADMIN']) {
    header('Location: profileA.php');
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Выбор А-сервиса: Галерея</title>


    <!-- CSS -->
    <!-- Лого сайта -->
    <link rel="icon" type="image/png" href="../img/logo.png">

    

    <!-- Сзадний фон -->
    <link rel="stylesheet" type="text/css" href="../css/color-text.css">
    <!--Основа сайта-->
    <link rel="stylesheet" type="text/css" href="../css/style.css">
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
                </div>
            </div>
        </div>
        <!-- navbar end -->     

        <!-- jumbotron -->
<div class="raa">
<div class="container">
<div class="features-box">
    <h1 class="features-t" id="Блог">Вход в AdminPanel</h1>

<!-- Форма авторизации -->
    <form action="../adminpanel/signinA.php" method="post" class="raa">
        <input class="raa" type="text" name="login" placeholder="Логин администратора">
        <input class="raa" type="password" name="password" placeholder="Пароль администратора">
        <button class="raa" type="submit">Войти</button>

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
    <!-- НИЗ САЙТА -->
    <div class="footer">
        <div class="container">
            <div class="footer-items">
                <div class="footer-item">
                    <span></span>
                </div>              
                </div>
            </div>
        </div>
    </div>

</body>
</html>



