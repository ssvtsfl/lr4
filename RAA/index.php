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
	<title>Выбор А-сервиса: Информация</title>


	<!-- CSS -->
	<!-- Лого сайта -->
	<link rel="icon" type="image/png" href="./img/logo.png">

	

	<!-- Сзадний фон -->
	<link rel="stylesheet" type="text/css" href="./css/color-text.css">
	<!--Основа сайта-->
	<link rel="stylesheet" type="text/css" href="./css/style.css">
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
						<div class="navs-item notbtn"><a href="pages/car-services.php" class="txt-uppercase">Автосервисы</a></div>
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
						<span class="jumbotron-t">Ваш сайт с выбором автосервисов!</span>
						<p class="jumbotron-d">На сайте вы найдете информацию об автосервисах, блог и полезную информацию!</p>
					</div>
					<div class="jumbotron-item">
						<img src="./img/img1.png" alt="image">
					</div>
				</div>
			</div>
		</div>

	<!-- блог -->
	<?php $NEWS = mysqli_query($dp, "SELECT * FROM news ORDER BY RAND() LIMIT 2"); 
	$outblog = mysqli_fetch_array($NEWS);
	?>
	
	<div class="features-box">
		<h1 class="features-t" id="Блог">Блог</h1>
		<div class="container">
			<div class="features">
				<div class="feature">
					<iframe width="560" height="315" src="<?php echo $outblog[3]?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
					<div class="feature-info">
						<h2 class="feature-info-t"><?php echo $outblog[2]?></h2>
						<p class="feature-info-d"><?php echo $outblog[1]?></p>
					</div>
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