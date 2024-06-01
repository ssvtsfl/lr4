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
  





<!-- Изменение продуктов -->
    </br><h1 class="features-t">Обновление данных о рейсах</h1>
<table align="center">
    <td>
<div class="navs-item" align="center"><a href="../adminpanel/profileA.php"><button class="btn txt-uppercase blue">Вернуться назад</button></a></div>
    </td><td>
<div class="navs-item" align="center"><a href="../pages/flight.php" target="_blank"><button class="btn txt-uppercase">Перейти на страницу рейсов</button></a></div>
    </td>
</table>

 
    <?php
    $IDprod  =  $_GET ['IDprod'];
    $prod = mysqli_query($dp, "SELECT * FROM `билеты`");


    if($IDprod > 0)
    {
    $prods = mysqli_fetch_assoc((mysqli_query($dp, "SELECT * FROM `билеты` WHERE `билеты`.`№ Билета` = $IDprod")));
?>

</br>
<h1 class="features-t">Редактирование рейса</h1>
<table align="center" class="cart-tables">
<form method="POST">
    				<tr>
					<td colspan=2> 
					<p>Откуда:<b> <?php echo $prods['Откуда']; ?></b></p>  
    					<input  type= "text"  name= "new_prod_otkud"></p>
					</td>
    				</tr>
    				<tr>
					<td colspan=2> 
					<p>Куда:<b> <?php echo $prods['Куда']; ?></b></p>  
    					<input  type= "text"  name= "new_prod_kud"></p>
					</td>
    				</tr>
    				<tr>
					<td colspan=2> 
					<p>Дата и время отправления:<b> <?php echo $prods['Дата/Время отправления']; ?></b></p>  
    					<input  type= "text"  name= "new_prod_otpr"></p>
					</td>
    				</tr>
    				<tr>
					<td colspan=2> 
					<p>Дата и время прибытия:<b> <?php echo $prods['Дата/Время прибытия']; ?></b></p>  
    					<input  type= "text"  name= "new_prod_prib"></p>
					</td>
    				</tr>
    				<tr>
					<td colspan=2> 
					<p>Номер поезда:<b> <?php echo $prods['№ Поезда']; ?></b></p>  
    					<input  type= "text"  name= "new_prod_num"></p>
					</td>
    				</tr>
    				<tr>
					<td colspan=2> 
					<p>Цена:<b> <?php echo $prods['Цена']; ?></b></p>  
    					<input  type= "text"  name= "new_prod_sum"></p>
					</td>
    				</tr>
    				<tr>
					<td>
					<input  type= "submit"  name = "update_prod" value= "Обновить">
					</td>
					<td>
        					<a href="redP.php">Отмена</a>
					</td>
    				</tr>
				




<!-- ЗАКАЗЫ -->

<?php 
    }else{
?>


	<form method="POST">
<h1 class="features-t">Добавление нового рейса</h1>
    </tr><td> <input  type= "text"  name= "add_prod_otk" placeholder="Введите Откуда">  </td>
    <td>  <input  type= "text"  name= "add_prod_kud" placeholder="Введите Куда">  </td>
    <td>  <input  type= "text"  name= "add_prod_otpr" placeholder="Введите Д/В отправления">  </td>
    <td>  <input  type= "text"  name= "add_prod_prib" placeholder="Введите Д/В прибытия">  </td>
    <td>  <input  type= "text"  name= "add_prod_num" placeholder="Введите № поезда">  </td>
    <td>  <input  type= "text"  name= "add_prod_summa" placeholder="Введите цену">  </td>
    <td colspan="2" align="center">  <input  type= "submit"  name = "add_prod" value= "Добавить">  </td>
</form>
	<br>
  <div class="filter">
   <form action="" method="post">
     <select name="type">
       <option value="all">Все поезда</option>
       <option value="1">1</option>
       <option value="2">2</option>
       <option value="3">3</option>
       <option value="4">4</option>
       <option value="5">5</option>
     </select>
     <input type="submit" name="find" value="Найти">
   </form>
</div>
	<br>
    <table align="center" class="cart-tables" >
    <tr>
        <th>Откуда</th>
        <th>Куда</th>
        <th>Дата и время отправления</th>
        <th>Дата и время прибытия</th>
        <th>Номер поезда</th>
        <th>Цена</th>
        <th colspan=2>Действие</th>
    </tr>
<?php
	if(isset($_POST['find'])){
          				$filter_type = $_POST['type'];
          				$sql = mysqli_query($dp, "SELECT * FROM `билеты`");
				if($filter_type != 'all'){
            					$sql = mysqli_query($dp, " SELECT * FROM `билеты` WHERE `№ Поезда` = '$filter_type'");
				} 
				else {
          					$sql = mysqli_query($dp, "SELECT * FROM `билеты`");
        				}

    while($OutPROD = mysqli_fetch_array($sql)){
    echo '<tr><td>' . $OutPROD['Откуда'] . '</td>
        <td>' . $OutPROD['Куда'] . '</td>  
        <td>' . $OutPROD['Дата/Время отправления'] . '</td> 
        <td>' . $OutPROD['Дата/Время прибытия'] . '</td>  
        <td>' . $OutPROD['№ Поезда'] . '</td>   
        <td>' . $OutPROD['Цена'] . '</td>  
        <td><a href="redP.php?IDprod=' . $OutPROD['№ Билета'] . '">Редактировать</a></td>
        <td><a href="redP.php?DELprod=' . $OutPROD['№ Билета'] . '">Удалить</a></td>';
    }
			}
			else {
			while($OutPROD = mysqli_fetch_array($prod)){
  			echo '<tr><td>' . $OutPROD['Откуда'] . '</td>
        		<td>' . $OutPROD['Куда'] . '</td>  
        		<td>' . $OutPROD['Дата/Время отправления'] . '</td> 
        		<td>' . $OutPROD['Дата/Время прибытия'] . '</td>  
        		<td>' . $OutPROD['№ Поезда'] . '</td>   
        		<td>' . $OutPROD['Цена'] . '</td>  
        		<td><a href="redP.php?IDprod=' . $OutPROD['№ Билета'] . '">Редактировать</a></td>
        		<td><a href="redP.php?DELprod=' . $OutPROD['№ Билета'] . '">Удалить</a></td>';
    			}
			} 
?>
   
</table>
<?php 
    }
    # <!-- УДАЛЕНИЕ -->
    $DELprod =  $_GET ['DELprod'];
    if($DELprod > 0){
        mysqli_query($dp , "DELETE FROM `билеты` WHERE  `билеты`.`№ Билета` = '$DELprod'");
    }

    if (isset($_POST["update_prod"])){
    $new_prod_otkud = $_POST["new_prod_otkud"];
    $new_prod_kud = $_POST["new_prod_kud"];
    $new_prod_otpr = $_POST["new_prod_otpr"];
    $new_prod_prib = $_POST["new_prod_prib"];
    $new_prod_num = $_POST["new_prod_num"];
    $new_prod_sum = $_POST["new_prod_sum"];
    
    if(!empty($new_prod_otkud)){
        mysqli_query($dp, "UPDATE `билеты` SET `Откуда` = '$new_prod_otkud' WHERE `билеты`.`№ Билета` = '$IDprod'" );
    }
    if(!empty($new_prod_kud)){
        mysqli_query($dp, "UPDATE `билеты` SET `Куда` = '$new_prod_kud' WHERE `билеты`.`№ Билета` = '$IDprod'" );
    }
    if(!empty($new_prod_otpr)){
        mysqli_query($dp, "UPDATE `билеты` SET `Дата/Время отправления` = '$new_prod_otpr' WHERE `билеты`.`№ Билета` = '$IDprod'" );
    }
    if(!empty($new_prod_prib)){
        mysqli_query($dp, "UPDATE `билеты` SET `Дата/Время прибытия` = '$new_prod_prib' WHERE `билеты`.`№ Билета` = '$IDprod'" );
    }
    if(!empty($new_prod_num)){
        mysqli_query($dp, "UPDATE `билеты` SET `№ Поезда` = '$new_prod_num' WHERE `билеты`.`№ Билета` = '$IDprod'" );
    }
    if(!empty($new_prod_sum)){
        mysqli_query($dp, "UPDATE `билеты` SET `Цена` = '$new_prod_sum' WHERE `билеты`.`№ Билета` = '$IDprod'" );
    }
    }

    if (isset($_POST["add_prod"])){
        $add_prod_otk = $_POST["add_prod_otk"];
        $add_prod_kud = $_POST["add_prod_kud"];
        $add_prod_otpr = $_POST["add_prod_otpr"];
        $add_prod_prib = $_POST["add_prod_prib"];
        $add_prod_num = $_POST["add_prod_num"];
        $add_prod_summa = $_POST["add_prod_summa"] . " руб";
        mysqli_query($dp , "INSERT INTO `билеты` (`Тип вагона`, `Дата/Время отправления`, `Дата/Время прибытия`, `Откуда`, `Куда`, `Время в пути`, `Номер вагона`, `Место`, `Наличие багажа`, `Цена`, `№ Кассы`, `Код Пассажира`, `№ Поезда`) VALUES ('', '$add_prod_otpr', '$add_prod_prib', '$add_prod_otk', '$add_prod_kud', '', '12', '12', '', '$add_prod_summa', '1', '1', '$add_prod_num');");
    }
    ?>

    </table>
    </table>






    </div>
    </div>
    </div>



</body>
</html>
