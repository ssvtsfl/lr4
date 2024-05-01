<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profile.php');
}
include '../connect.php'; 
$CAPTCHA = mysqli_query($dp, "SELECT * FROM `captcha` ORDER BY RAND() LIMIT 2"); 
$outCAPTCHA = mysqli_fetch_array($CAPTCHA);
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
    <h1 class="features-t" id="Блог">Авторизация</h1>
<!-- Форма авторизации -->
    <h4 align="center">Перед регистрацией пройдите капчу</h4>
        <form method="post" class="raa">
        <div align="center"><img src=' <?php echo $outCAPTCHA[1] ?>' width="150" height="80"/></div>
    </br>

        <label>Ввод капчи</label>
        <input class="raa" type="text" name="CHECK_CAPTCHA" placeholder="Введите текст с картинки">
        <input class="raa" type="submit" name = "C_C" value="Проверить капчу">
       </form>



        <?php
    if($_POST['C_C']){
        $checkCAP = mysqli_query($dp, "SELECT * FROM `captcha` where text = '$_POST[CHECK_CAPTCHA]'"); 
        $outcheckCAP = mysqli_fetch_array($checkCAP);

        if(!empty($outcheckCAP)){
            $_SESSION['CAPTCHA'] = 1;
            $_SESSION['message'] = "Капча засчитана, продолжайте регистрацию!";
            }
        else{
            $_SESSION['CAPTCHA'] = 0; 
            $_SESSION['message'] = "Введите капчу!";
        }
    }
         ?>

    <form action="../RAA/signin.php" method="post" class="raa">
        <label>Логин</label>
        <input class="raa" type="text" name="login" placeholder="Введите свой логин">
        <label>Пароль</label>
        <input class="raa" type="password" name="password" placeholder="Введите пароль">
        <?php 
            if(!empty($_SESSION['CAPTCHA'])){
        ?>
        <button class="raa" type="submit">Войти</button>
        <?php } ?>
        <p>
            У вас нет аккаунта? - <a href="../pages/register.php" class="raa">зарегистрируйтесь</a><a href="../adminpanel/" class="raa">!</a>
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



