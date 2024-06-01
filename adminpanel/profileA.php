<?php 
session_start();
if ($_SESSION['ADMIN']) {
    $flag = 1;
}
$usname = $_SESSION['ADMIN']['login'];
include '../connect.php'; 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>AdminPANEL</title>

    <!-- CSS -->
    <!-- Лого сайта -->
    <link rel="icon" type="image/png" href="../img/logo.png">

    <!-- Сзадний фон -->
    <link rel="stylesheet" type="text/css" href="../css/color-text1.css">
    <!--Основа сайта-->
    <link rel="stylesheet" type="text/css" href="../css/style111.css">
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
                        <a href="profileA.php"><img class="navbar-brand-png" src="../img/logo_main.png"><a>
                    </div>
                    <div class="navs" id="navs">
                            <form method="post"class="raa">
                            <div class="navs-item"><input class="btn txt-uppercase shadow-sm" type="submit" name = "exitA" value="Выход"></div>
                            </form>
                            <?php 
                                if($_POST['exitA']){
                                    unset($_SESSION["ADMIN"]);
                                    header("location:../RAA/logout.php");
                                }
                            ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- navbar end -->     

        <!-- jumbotron -->

    <div class="container">
    <div class="jumbotron-item">
    <div class="features-box">
        <h1 class="features-t">Информация об администраторе</h1>

    <!-- Профиль -->
  <table class ='table_lk' align="center">
            <tr><td>
                    <p class="text_lk_name">Профиль: <?= $_SESSION['ADMIN']['full_name'] ?></p>
            </td></tr><tr><td align="left">
                    <div class="text_lk">Логин: <?= $_SESSION['ADMIN']['login'] ?></div>
            </td></tr>

    </table></div></div></div>


    <div class="container">
    <div class="jumbotron-item">
    <div class="features-box">


<h1 class="features-t">Редактирование данных</h1>
<!-- Работа с данными клиентов -->
<div class="navs-item" align="center"><a href="../adminpanel/redC.php"><button class="btn txt-uppercase">Работа с данными пассажиров</button></a></div>
</br>

<div class="navs-item" align="center"><a href="../adminpanel/redP.php"><button class="btn txt-uppercase">Работа с данными рейсов</button></a></div>

</body>
</html>
