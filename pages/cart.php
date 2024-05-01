<?php
    session_start();
    include '../connect.php'; 

    $user = $_SESSION['user']['login'];
    $prod = $_GET ['№ Билета'];
    $dates = date('Y-m-d H:i:s');

    mysqli_query($dp, "INSERT INTO `cart` (`№ Билета`, `user`, `билеты`, `date`) VALUES (NULL, '$user', '$prod', '$dates')");

    if ($_SESSION['user']) {
        $flag = 1;
    }
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
                        <div class="navs-item notbtn"><a href="#" class="txt-uppercase">Рейсы</a></div>
                        <? if($flag == 1){ ?>
                            <div class="navs-item"><a href="profile.php"><button class="btn  shadow-sm blue"><?= $_SESSION['user']['full_name'] ?></button></a></div>
                            <div class="navs-item"><a href="../RAA/logout.php"><button class="btn txt-uppercase shadow-sm">Выход</button></a></div>
                        <? }else{ ?>
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
        <h1 class="features-t">Поезда</h1>

        <table align="center" class="serv-tables" >
            <tr>
			<th>Номер поезда</th>
			<th>Тип поезда</th>
            </tr>

            <?php $SERV = mysqli_query($dp, "SELECT * FROM `поезда`"); 
            while($outserv = mysqli_fetch_array($SERV))
            {
                echo '<tr>
		<td>'.$outserv[0].'</td><td>'.$outserv[1].'</td>
		</tr>';
            }
            echo "</table>"
            ?>
        </table>
    </div>
    </div>
    </div>

        <!-- jumbotron -->
    <div class="container">
    <div class="jumbotron-item">
    <div class="features-box">
        <h1 class="features-t">Рейсы</h1>

        <table align="center" class="serv-tables" >
            <tr>
				<th>Откуда</th>
				<th>Куда</th>
				<th>Дата и время отправления</th>
				<th>Дата и время прибытия</th>
				<th>Номер поезда</th>
				<th>Цена</th>
            <? if($flag == 1){ ?>
                <th>Действие</th>
            <? } ?>
            </tr>

            <? $PROD = mysqli_query($dp, "SELECT * FROM билеты"); 
            while($outprod = mysqli_fetch_array($PROD))
            {
                echo '<tr>
		<td>'.$outprod[4].'</td><td>'.$outprod[5].'</td><td>'.$outprod[2].'</td><td>'.$outprod[3].'</td><td>'.$outprod[13].'</td><td>'.$outprod[10].'</td>';
		if($flag == 1){ 
                ?>
                <td>
                    <a href="cart.php?id=<?=$outprod[0]?>" class="btn blue">Добавить</a>
                </td>
                <?
                }
                echo '</tr>';
            }
            echo "</table>"
            ?>
        </table>
    </div>
    </div>
    </div>

    <div class="features">
        <?  $carts = mysqli_query($dp, "SELECT * FROM `билеты` where `билеты`.`№ Билета` = $prod"); 
            $outcart = mysqli_fetch_array($carts)?>
        <p class="text_lk">Билеты <? echo $outcart[1]; ?> добавлены в корзину!</p>
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