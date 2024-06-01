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
                            <div class="navs-item"><a href="../RAA/logout.php"><button class="btn txt-uppercase shadow-sm">Выход</button></a></div>
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
<table align="center">
    <td>
<div class="navs-item" align="center"><a href="../adminpanel/profileA.php"><button class="btn txt-uppercase blue">Вернуться назад</button></a></div>
    </td><td>
<div class="navs-item" align="center"><a href="../#" target="_blank"><button class="btn txt-uppercase">Перейти на страницу клиента</button></a></div>
    </td>
</table>
        
    <?php
    $IDclient  =  $_GET ['IDclient'];
    $ZAKclient  =  $_GET ['ZAKclient'];
    $CLIENTI = mysqli_query($dp, "SELECT * FROM `пассажиры`");


    if($IDclient > 0)
    {
    $CLIENTIS = mysqli_fetch_assoc((mysqli_query($dp, "SELECT * FROM `пассажиры` WHERE `пассажиры`.`Код Пассажира` = $IDclient")));
?>
</br><table align="center" class="cart-tables">
<form method="POST">
<tr><th align="center"><b>Обновление данных пассажира</b></th></tr>
            
    <tr><td><p>ФИО: <b><?php echo $CLIENTIS['ФИО Пассажира']; ?></b></p>    
    <input  type= "text"  name= "newFIO"></p></td></tr>

    <tr><td> <p>Логин:<b> <?php echo $CLIENTIS['login']; ?></b></p>  
    <input  type= "text"  name= "newLOGIN"></p></td></tr>

    <tr><td> <p>Почта:<b> <?php echo $CLIENTIS['Эл. почта']; ?></b></p>  
    <input  type= "text"  name= "newEMAIL"></p></td></tr>

    <tr><td><input  type= "submit"  name = "update" value= "Обновить" >
        <a href="redC.php">Отмена</a></td></tr>
<?php 
    }else if($ZAKclient > 0){
?>
    <table align="center" class="cart-tables" >
    <tr>
        <th>Откуда</th>
        <th>Куда</th>
        <th>Дата и время отправления</th>
        <th>Дата и время прибытия</th>
        <th>Номер поезда</th>
        <th>Цена</th>
        <th>Добавление в корзину</th>
    </tr>
    <?php
    $SEL = mysqli_fetch_array(mysqli_query($dp,"SELECT * FROM `пассажиры` where `пассажиры`.`Код Пассажира` = '$ZAKclient'"));
    $SERV = mysqli_query($dp, "SELECT * FROM `cart` where `cart`.`user` = '$SEL[2]'"); 
    while($outserv = mysqli_fetch_array($SERV))
    {
        echo '<tr>
        <td>'. mysqli_fetch_array(mysqli_query($dp, "SELECT `ФИО Пассажира` FROM `билеты` where `билеты`.`№ Билета` = $outserv[2]"))[0] . '</td>
        <td>'.mysqli_fetch_array(mysqli_query($dp, "SELECT `Цена` FROM `билеты` where `билеты`.`№ Билета` = $outserv[2]"))[0].'</td>
        <td>' .$outserv[3].'</td>
        </tr>';
    }
        echo "</table>"
    ?>
    </table>
    </br></br><div class="navs-item" align="center"><a href="redC.php"><button class="btn txt-uppercase shadow-sm blue">Назад</button></a></div>


<?php
    }else{
?>
    <table align="center" class="cart-tables" >
    <tr>
	<th>№</th>
        <th>ФИО Пассажира</th>
        <th>Логин</th>
        <th>Почта</th>
        <th>Дата регистрации</th>
        <th colspan=3>Действие</th>
    </tr>
<?php
    while($OutCL = mysqli_fetch_array($CLIENTI)){
    echo '<tr><td>' . $OutCL['Код Пассажира'] . '</td>
        <td>' . $OutCL['ФИО Пассажира'] . '</td>
        <td>' . $OutCL['login'] . '</td>  
        <td>' . $OutCL['Эл. почта'] . '</td>  
	<td>' . $OutCL['date'] . '</td>
        <td><a href="redC.php?IDclient=' . $OutCL['Код Пассажира'] . '">Редактировать</a></td>
        <td><a href="redC.php?DELclient=' . $OutCL['Код Пассажира'] . '">Удалить</a></td>
   
        <td><a href="prevCl.php?prevCID=' . $OutCL['Код Пассажира'] . '">Просмотр ЛК и заказов</a></td>';
    } 
    echo '</table>';
    }

    $DELclient  =  $_GET ['DELclient'];
    if($DELclient > 0){
        mysqli_query($dp , "DELETE FROM  `пассажиры` WHERE  `пассажиры`.`Код Пассажира` = '$DELclient'");
    }

    if (isset($_POST["update"])){
    $IDclient = $_GET['IDclient'];
    $newFIO = $_POST["newFIO"];
    $newLOGIN = $_POST["newLOGIN"];
    $newEMAIL = $_POST["newEMAIL"];
    
    if(!empty($newFIO)){
        mysqli_query($dp, "UPDATE `пассажиры` SET `ФИО Пассажира` = '$newFIO'WHERE `пассажиры`.`Код Пассажира` = '$IDclient'" );
    }
    if(!empty($newLOGIN)){
        mysqli_query($dp, "UPDATE `пассажиры` SET `login` = '$newLOGIN' WHERE `пассажиры`.`Код Пассажира` = '$IDclient'" );
    }
    if(!empty($newEMAIL)){
        mysqli_query($dp, "UPDATE `пассажиры` SET `Эл. почта` = '$newEMAIL' WHERE `пассажиры`.`Код Пассажира` = '$IDclient'" );
    }       
    }
    ?>

    </table>
    </table>



</body>
</html>
