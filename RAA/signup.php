<?php

    session_start();
    include '../connect.php'; 

    function convert($text){
        $text = trim($text);
        $text = stripcslashes($text);
        $text = strip_tags($text);
        $text = htmlspecialchars($text);
        return $text;
    }

    function checklength($text, $min, $max){
        $check = (mb_strlen($text) >= $min && mb_strlen($text) <= $max);
        return $check;
    } 

	try{
    $full_name = convert($_POST['full_name']);
    $login = convert($_POST['login']);
    $email = convert($_POST['email']);
    $password = convert($_POST['password']);
    $password_confirm = convert($_POST['password_confirm']);
    $dates = date('H:i d-m-Y');

	if (!$dp) {
          		throw new Exception('Не удалось подключиться к базе данных.');
      	}

    $CheckUser = mysqli_fetch_array(mysqli_query($dp, "SELECT *  FROM `пассажиры` where login = '$login'"));


    if(empty($CheckUser)){
        if(!checklength($login, 3, 8))
        {
            header('Location: ../pages/register.php');
            $_SESSION['message'] = "Длина логина должна быть 3 - 8 символов!";
	throw new Exception($_SESSION['message']);
        }
        elseif (!checklength($password, 4, 16))
        {
            header('Location: ../pages/register.php');
            $_SESSION['message'] = "Длина пароля должна быть 4 - 16 символов!";
	throw new Exception($_SESSION['message']);
        }
        else
        {
            if ($password === $password_confirm) {
            //    $password = md5($password);

                    mysqli_query($dp, "INSERT INTO `пассажиры` (`ФИО Пассажира`, `Пол`, `Дата рождения`, `Паспорт`, `Номер телефона`, `Эл. почта`, `login`, `password`, `date`) VALUES ('$full_name', '', '', '', '', '$email', '$login', '$password', '$dates')");
                    header('Location: ../pages/auth.php');

                } else {
                    $_SESSION['message'] = 'Пароли не совпадают';
		throw new Exception($_SESSION['message']);
                    header('Location: ../pages/register.php');
                }
        }

    }else{
        $_SESSION['message'] = 'Аккаунт с данным логином уже существует в системе';
	throw new Exception($_SESSION['message']);
        header('Location: ../pages/register.php');
    }
	} 
	catch (Exception $e) {
      		header('Location: ../pages/register.php');
      	exit();
  	}
?>