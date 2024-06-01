<?php 
include '../connect.php'; 

$id  =  $_GET ['prevCID'];
$check_user = mysqli_query($dp, "SELECT * FROM `пассажиры` WHERE `Код Пассажира` = '$id'");
$user = mysqli_fetch_assoc($check_user);
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
                        <a href="../index.php"><img class="navbar-brand-png" src="../img/logo_main.png"><a>
                    </div>
                    <div class="navs" id="navs">
                        <div class="navs-item notbtn"><a href="galery.php" class="txt-uppercase">Галерея</a></div>
                        <div class="navs-item notbtn"><a href="flight.php" class="txt-uppercase">Рейсы</a></div>
                        <?php 
                            if($flag == 1){
                        ?>
                            <div class="navs-item"><a href="#"><button class="btn  shadow-sm blue"><?= $_SESSION['user']['full_name'] ?></button></a></div>
                            <div class="navs-item"><a href="../RAA/logout.php"><button class="btn txt-uppercase shadow-sm">Выход</button></a></div>
                        <?
                            }else{
                         ?>
                        <div class="navs-item"><a href="auth.php"><button class="btn txt-uppercase shadow-sm">Войти</button></a></div>
                        <div class="navs-item"><a href="register.php"><button class="btn txt-uppercase shadow-sm">Регистрация</button></a></div>
                        <? } ?> 
                    </div>
                </div>
            </div>
        </div>
        <!-- navbar end -->     

        <!-- jumbotron -->

<div class="navs-item" align="center"><a href="../adminpanel/redC.php"><button class="btn txt-uppercase blue">Вернуться назад</button></a></div>

    <div class="container">
    <div class="jumbotron-item">
    <div class="features-box">
        <h1 class="features-t">Информация</h1>

    <!-- Профиль -->
  <table class ='table_lk' align="center">
            <tr>
                <td>
                    <p class="text_lk_name">Профиль: <?= $user['ФИО Пассажира'] ?></p>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <div class="text_lk">Логин: <?= $user['login'] ?></div>
                    <div class="text_lk">Почта: <?= $user['Эл. почта'] ?></div>
                    <div class="text_lk">Дата вашей регистрации на сайте: <?= $user['date'] ?></div>
                </td>
            </tr>

    </table>
    </div>
    </div>
    </div>


    <div class="container">
    <div class="jumbotron-item">
    <div class="features-box">
        <h1 class="features-t">Выбранные билеты</h1>

    <!-- Корзина -->
    <table align="center" class="cart-tables" >
    <tr>
	<th>Откуда</th>
	<th>Куда</th>
	<th>Дата и время отправления</th>
	<th>Дата и время прибытия</th>
	<th>Номер поезда</th>
	<th>Цена</th>
        <th>Дата добавления</th>
    </tr>
    <?php
    $usname = $user['login'];
    $SERV = mysqli_query($dp, "SELECT * FROM `cart` where `cart`.`user` = '$usname'"); 
    while($outserv = mysqli_fetch_array($SERV))
    {
        echo '<tr>
        <td>'. mysqli_fetch_array(mysqli_query($dp, "SELECT `Откуда` FROM `билеты` where `билеты`.`№ Билета` = $outserv[2]"))[0] . '</td>
        <td>'.mysqli_fetch_array(mysqli_query($dp, "SELECT `Куда` FROM `билеты` where `билеты`.`№ Билета` = $outserv[2]"))[0].'</td>
        <td>'.mysqli_fetch_array(mysqli_query($dp, "SELECT `Дата/Время отправления` FROM `билеты` where `билеты`.`№ Билета` = $outserv[2]"))[0].'</td>
        <td>'.mysqli_fetch_array(mysqli_query($dp, "SELECT `Дата/Время прибытия` FROM `билеты` where `билеты`.`№ Билета` = $outserv[2]"))[0].'</td>
        <td>'.mysqli_fetch_array(mysqli_query($dp, "SELECT `№ Поезда` FROM `билеты` where `билеты`.`№ Билета` = $outserv[2]"))[0].'</td>
        <td>'.mysqli_fetch_array(mysqli_query($dp, "SELECT `Цена` FROM `билеты` where `билеты`.`№ Билета` = $outserv[2]"))[0].'</td>
        <td>' .$outserv[3].'</td>
        </tr>';
    }
        echo "</table>"
    ?>
    </table>

    </table>
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
