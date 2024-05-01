<?php 
session_start();
if ($_SESSION['user']) {
    $flag = 1;
}
$usname = $_SESSION['user']['login'];
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

    <div class="container">
    <div class="jumbotron-item">
    <div class="features-box">
        <h1 class="features-t">Информация</h1>

    <!-- Профиль -->
  <table class ='table_lk' align="center">
            <tr>
                <td>
                    <p class="text_lk_name">Профиль: <?= $_SESSION['user']['full_name'] ?></p>
                </td>
            </tr>
            <tr>
                <td align="left">
                    <div class="text_lk">Логин: <?= $_SESSION['user']['login'] ?></div>
                    <div class="text_lk">Почта: <?= $_SESSION['user']['email'] ?></div>
                    <div class="text_lk">Дата вашей регистрации на сайте: <?= $_SESSION['user']['date'] ?></div>
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
        <th>Удаление билета</th>
    </tr>
    <?php
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
        <td><a href="profile.php?DELbacket=' . $outserv[2] . '">Удалить</a></td>
        </tr>';
        $userNames = $outserv[1];
    }
        echo "</table>";

    $DELbacket  =  $_GET['DELbacket'];
    if($DELbacket > 0){
        mysqli_query($dp , "DELETE FROM  `cart` WHERE  `cart`.`user` = '$userNames' AND `cart`.`билеты` = '$DELbacket'");
        header("location:profile.php");
    }

    ?>
    </table>

    </table>
    </div>
    </div>
    </div>
	<br>
	<form action="profile.php" method="post">
	<div style="text-align:center">
                <input type="submit" name="make_order" value="Купить билеты" style = "padding: 10px; background: #e21a1a; border: unset; cursor: pointer; border-radius: 50px; width: 200px;">
	</div>
	</form>

	<?php
            		if(isset($_POST['make_order'])) {
                		mysqli_query($dp, "DELETE FROM `cart` WHERE `cart`.`user` = '$usname'");
			echo '<script>alert("Ваш(-и) билет(-ы) куплены!");window.location.href="profile.php";</script>'; 
            		}
            	?>

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
