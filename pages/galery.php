<?php 
session_start();
if ($_SESSION['user']) {
    $flag = 1;
}
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
						<? if($flag == 1){ ?>
    						<div class="navs-item"><a href="profile.php"><button class="btn  shadow-sm blue"><?= $_SESSION['user']['full_name'] ?></button></a></div>
    						<div class="navs-item"><a href="RAA/logout.php"><button class="btn txt-uppercase shadow-sm">Выход</button></a></div>
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
		<h1 class="features-t">Фото поездов</h1>


			<?php $GAL = mysqli_query($dp, "SELECT * FROM galery"); 
			while($outgal = mysqli_fetch_array($GAL))
			{
				echo '<img src="'.$outgal[1]. '" width="240" height="160">	';
			}
			?>

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