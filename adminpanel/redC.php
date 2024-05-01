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
    $CLIENTI = mysqli_query($dp, "SELECT * FROM users");


    if($IDclient > 0)
    {
    $CLIENTIS = mysqli_fetch_assoc((mysqli_query($dp, "SELECT * FROM users WHERE users.id = $IDclient")));
?>
</br><table align="center" class="cart-tables">
<form method="POST">
<tr><th align="center"><b>Обновление данных клиента</b></th>
            
    <tr><td><p>ФИО: <b><?php echo $CLIENTIS['full_name']; ?></b></p>    
    <input  type= "text"  name= "newFIO"></p></td>

    <tr><td> <p>Логин:<b> <?php echo $CLIENTIS['login']; ?></b></p>  
    <input  type= "text"  name= "newLOGIN"></p></td>

    <tr><td> <p>Почта:<b> <?php echo $CLIENTIS['email']; ?></b></p>  
    <input  type= "text"  name= "newEMAIL"></p></td>

    <tr><td><input  type= "submit"  name = "update" value= "Обновить" >
        <a href="redC.php">Отмена</a></td>
<?php 
    }else if($ZAKclient > 0){
?>
    <table align="center" class="cart-tables" >
    <tr>
        <th>Услуга</th>
        <th>Цена услуги</th>
        <th>Добавление в корзину</th>
    </tr>
    <?php
    $SEL = mysqli_fetch_array(mysqli_query($dp,"SELECT * FROM users where users.id = '$ZAKclient'"));
    $SERV = mysqli_query($dp, "SELECT * FROM cart where cart.user = '$SEL[2]'"); 
    while($outserv = mysqli_fetch_array($SERV))
    {
        echo '<tr>
        <td>'. mysqli_fetch_array(mysqli_query($dp, "SELECT name FROM product where product.id = $outserv[2]"))[0] . '</td>
        <td>'.mysqli_fetch_array(mysqli_query($dp, "SELECT summa FROM product where product.id = $outserv[2]"))[0].'</td>
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
        <th>Клиент</th>
        <th>Логин</th>
        <th>Почта</th>
        <th>Дата регистрации</th>
        <th colspan=4>Действие</th>
    </tr>
<?php
    while($OutCL = mysqli_fetch_array($CLIENTI)){
    echo '<tr><td>' . $OutCL['id'] . '</td>
        <td>' . $OutCL['full_name'] . '</td>
        <td>' . $OutCL['login'] . '</td>  
        <td>' . $OutCL['email'] . '</td>  
        <td><a href="redC.php?IDclient=' . $OutCL['id'] . '">Редактировать</a></td>
        <td><a href="redC.php?DELclient=' . $OutCL['id'] . '">Удалить</a></td>
        <td><a href="redC.php?ZAKclient=' . $OutCL['id'] . '">Заказы</a></td>
        <td><a href="prevCl.php?prevCID=' . $OutCL['id'] . '">Предварительный просмотр ЛК</a></td>';
    } 
    echo '</table>';
    }

    $DELclient  =  $_GET ['DELclient'];
    if($DELclient > 0){
        mysqli_query($dp , "DELETE FROM  `users` WHERE  `users`.`id` = '$DELclient'");
    }

    if (isset($_POST["update"])){
    $newFIO = $_POST["newFIO"];
    $newLOGIN = $_POST["newLOGIN"];
    $newEMAIL = $_POST["newEMAIL"];
    
    if(!empty($newFIO)){
        mysqli_query($dp, "UPDATE `users` SET `full_name` = '$newFIO'WHERE `users`.`id` = '$IDclient'" );
    }
    if(!empty($newLOGIN)){
        mysqli_query($dp, "UPDATE `users` SET `login` = '$newLOGIN' WHERE `users`.`id` = '$IDclient'" );
    }
    if(!empty($newEMAIL)){
        mysqli_query($dp, "UPDATE `users` SET `email` = '$newEMAIL' WHERE `users`.`id` = '$IDclient'" );
    }       
    }
    ?>

    </table>
    </table>



</body>
</html>
