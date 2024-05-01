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

    <!-- jumbotron -->
    <div class="container">
    <div class="jumbotron-item">
    <div class="features-box">

<!-- Изменение новостей -->
    <h1 class="features-t">Изменение новостей</h1>

<table align="center">
    <td>
<div class="navs-item" align="center"><a href="../adminpanel/profileA.php"><button class="btn txt-uppercase blue">Вернуться назад</button></a></div>
    </td><td>
<div class="navs-item" align="center"><a href="../index.php" target="_blank"><button class="btn txt-uppercase">Перейти на страницу новостей</button></a></div>
    </td>
</table>
    <?php
    $IDnews  =  $_GET ['IDnews'];
    $news = mysqli_query($dp, "SELECT * FROM news");


    if($IDnews > 0)
    {
    $newss = mysqli_fetch_assoc((mysqli_query($dp, "SELECT * FROM news WHERE news.News_id = $IDnews")));
?>
</br><table align="center" class="cart-tables">
<form method="POST">
<tr><th align="center"><b>Обновление данных новостного блога</b></th>
            
    <tr><td><p>Текст: <b><?php echo $newss['Ntext']; ?></b></p>    
    <input  type= "text"  name= "newTEXT"></p></td>

    <tr><td> <p>Оглавление:<b> <?php echo $newss['Ntitle']; ?></b></p>  
    <input  type= "text"  name= "newTITLE"></p></td>

    <tr><td> <p>Ссылка:<b> <?php echo $newss['Nurl']; ?></b></p>  
    <input  type= "text"  name= "newURL"></p></td>

    <tr><td><input  type= "submit"  name = "update_news" value= "Обновить" >
        <a href="redN.php">Отмена</a></td>

<?php 
    }else{
?>
    <table align="center" class="cart-tables" >
    <tr>
        <th>Текст новости</th>
        <th>Заголовок</th>
        <th>Ссылка на видео</th>
        <th colspan=3>Действие</th>
    </tr>
<?php
    while($OutNEWS = mysqli_fetch_array($news)){
    echo '<tr><td>' . $OutNEWS['Ntext'] . '</td>
        <td>' . $OutNEWS['Ntitle'] . '</td>  
        <td>' . $OutNEWS['Nurl'] . '</td>  
        <td><a href="redN.php?IDnews=' . $OutNEWS['News_id'] . '">Редактировать</a></td>
        <td><a href="redN.php?DELnews=' . $OutNEWS['News_id'] . '">Удалить</a></td>';
    }
?>
<form method="POST">
    </tr><td> <input  type= "text"  name= "add_news_text" placeholder="Введите описание к новости">  </td>
    <td>  <input  type= "text"  name= "add_news_title" placeholder="Введите оглавление новости">  </td>
    <td>  <input  type= "text"  name= "add_news_url" placeholder="Введите ссылку">  </td>
    <td colspan="2" align="center">  <input  type= "submit"  name = "add_news" value= "Добавить">  </td>
</form>    
</table>
<?php 
    }
    # <!-- УДАЛЕНИЕ -->
    $DELnews =  $_GET ['DELnews'];
    if($DELnews > 0){
        mysqli_query($dp , "DELETE FROM  news WHERE  news.News_id = '$DELnews'");
    }

    if (isset($_POST["update_news"])){
    $newTEXT = $_POST["newTEXT"];
    $newTITLE = $_POST["newTITLE"];
    $newURL = $_POST["newURL"];
    
    if(!empty($newTEXT)){
        mysqli_query($dp, "UPDATE news SET `Ntext` = '$newTEXT' WHERE news.News_id = '$IDnews'" );
    }
    if(!empty($newTITLE)){
        mysqli_query($dp, "UPDATE news SET `Ntitle` = '$newTITLE' WHERE news.News_id = '$IDnews'" );
    }
    if(!empty($newURL)){
        mysqli_query($dp, "UPDATE news SET `Nurl` = '$newURL' WHERE news.News_id = '$IDnews'" );
    }
    }

    if (isset($_POST["add_news"])){
        $add_news_per1 = $_POST["add_news_text"];
        $add_news_per2 = $_POST["add_news_title"];
        $add_news_per3 = $_POST["add_news_url"];
        mysqli_query($dp , "INSERT INTO `news` (`News_id`, `Ntext`, `Ntitle`, `Nurl`) VALUES (NULL, '$add_news_per1', '$add_news_per2', '$add_news_per3');");

    }
    ?>

    </table>
    </table>
</div>
</div>
</div>
</body>
</html>
