<?php 
session_start();
if ($_SESSION['user']) {
    $flag = 1;
}
include 'connect.php'; 

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>РЖД</title>


	<!-- CSS -->
	<!-- Лого сайта -->
	<link rel="icon" type="image/png" href="./img/logo.png">

	

	<!-- Сзадний фон -->
	<link rel="stylesheet" type="text/css" href="./css/color-text1.css">
	<!--Основа сайта-->
	<link rel="stylesheet" type="text/css" href="./css/style11.css">
	<!--Шрифт-->

	<link rel="stylesheet" type="text/css" href="./css/shadow.css">

	<!-- css end -->


</head>
<body>
		<!-- navbar -->
		<div class="navbar">
			<div class="container">
				<div class="navbar-nav">
					<div class="navbar-brand">
						<a href="#"><img class="navbar-brand-png" src="./img/logo_main.png"><a>
					</div>
					<div class="navs" id="navs">
						<div class="navs-item notbtn"><a href="pages/galery.php" class="txt-uppercase">Галерея</a></div>
						<div class="navs-item notbtn"><a href="pages/flight.php" class="txt-uppercase">Рейсы</a></div>
						<? if($flag == 1){ ?>
    						<div class="navs-item"><a href="pages/profile.php"><button class="btn  shadow-sm blue"><?= $_SESSION['user']['full_name'] ?></button></a></div>
    						<div class="navs-item"><a href="RAA/logout.php"><button class="btn txt-uppercase shadow-sm">Выход</button></a></div>
						<? }else{ ?>
						<div class="navs-item"><a href="pages/auth.php"><button class="btn txt-uppercase shadow-sm">Войти</button></a></div>
						<div class="navs-item"><a href="pages/register.php"><button class="btn txt-uppercase shadow-sm">Регистрация</button></a></div>
 						<? } ?> 
					</div>
				</div>
			</div>
		</div>
		<!-- navbar end -->		





		<!-- jumbotron -->
		<div class="jumbotron">
			<div class="container">
				<div class="jumbotron-items">
					<div class="jumbotron-item">
						<span class="jumbotron-t">Ваш сайт для приобритения билетов онлайн!</span>
						<p class="jumbotron-d">На сайте вы найдете информацию о рейсах, блог и полезную информацию!</p>
					</div>
					
				</div>
			</div>
		</div>

	<!-- блог -->

	<div class="features-box">
		<h1 class="features-t" id="Блог">Блог</h1>
		<div class="container">
			<div class="features">
				<div class="feature">
	<iframe style="display: block; margin: 0 auto;" width="500" height="290" src="../img/sapsan.mp4" type="video/mp4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture></iframe>

	
</div>

			</div>
		</div>
	</div>
<!-- блог end -->
	

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