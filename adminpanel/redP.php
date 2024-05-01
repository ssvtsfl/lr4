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
  





<!-- Изменение продуктов -->
    </br><h1 class="features-t">Изменение продуктов</h1>
<table align="center">
    <td>
<div class="navs-item" align="center"><a href="../adminpanel/profileA.php"><button class="btn txt-uppercase blue">Вернуться назад</button></a></div>
    </td><td>
<div class="navs-item" align="center"><a href="../pages/cart.php" target="_blank"><button class="btn txt-uppercase">Перейти на страницу продукции</button></a></div>
    </td>
</table>
    <?php
    $IDprod  =  $_GET ['IDprod'];
    $prod = mysqli_query($dp, "SELECT * FROM product");


    if($IDprod > 0)
    {
    $prods = mysqli_fetch_assoc((mysqli_query($dp, "SELECT * FROM product WHERE product.id = $IDprod")));
?>
</br><table align="center" class="cart-tables">
<form method="POST">
<tr><th align="center"><b>Обновление данных продукта</b></th>

    <tr><td> <p>Название:<b> <?php echo $prods['name']; ?></b></p>  
    <input  type= "text"  name= "new_prod_nazv"></p></td>

    <tr><td> <p>Цена:<b> <?php echo $prods['summa']; ?></b></p>  
    <input  type= "text"  name= "new_prod_sum"></p></td>

    <tr><td><input  type= "submit"  name = "update_prod" value= "Обновить" >
        <a href="redP.php">Отмена</a></td>


<!-- ЗАКАЗЫ -->

<?php 
    }else{
?>
    <table align="center" class="cart-tables" >
    <tr>
        <th>№</th>
        <th>Название</th>
        <th>Цена</th>
        <th colspan=3>Действие</th>
    </tr>
<?php
    while($OutPROD = mysqli_fetch_array($prod)){
    echo '<tr><td>' . $OutPROD['id'] . '</td>
        <td>' . $OutPROD['name'] . '</td>  
        <td>' . $OutPROD['summa'] . '</td>  
        <td><a href="redP.php?IDprod=' . $OutPROD['id'] . '">Редактировать</a></td>
        <td><a href="redP.php?DELprod=' . $OutPROD['id'] . '">Удалить</a></td>';
    }
?>
<form method="POST">
    </tr><td></td><td> <input  type= "text"  name= "add_prod_name" placeholder="Введите название">  </td>
    <td>  <input  type= "text"  name= "add_prod_summa" placeholder="Введите цену">  </td>
    <td colspan="2" align="center">  <input  type= "submit"  name = "add_prod" value= "Добавить">  </td>
</form>    
</table>
<?php 
    }
    # <!-- УДАЛЕНИЕ -->
    $DELprod =  $_GET ['DELprod'];
    if($DELprod > 0){
        mysqli_query($dp , "DELETE FROM  product WHERE  product.id = '$DELprod'");
    }

    if (isset($_POST["update_prod"])){
    $new_prod_nazv = $_POST["new_prod_nazv"];
    $new_prod_sum = $_POST["new_prod_sum"];
    
    if(!empty($new_prod_nazv)){
        mysqli_query($dp, "UPDATE product SET `name` = '$new_prod_nazv' WHERE product.id = '$IDprod'" );
    }
    if(!empty($new_prod_sum)){
        mysqli_query($dp, "UPDATE product SET `summa` = '$new_prod_sum' WHERE product.id = '$IDprod'" );
    }
    }

    if (isset($_POST["add_prod"])){
        $add_prod_name = $_POST["add_prod_name"];
        $add_prod_summa = $_POST["add_prod_summa"] . " руб";
        mysqli_query($dp , "INSERT INTO `product` (`id`, `name`, `summa`) VALUES (NULL, '$add_prod_name', '$add_prod_summa');");
    }
    ?>

    </table>
    </table>






    </div>
    </div>
    </div>



</body>
</html>
