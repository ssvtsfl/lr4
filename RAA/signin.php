<?php

    session_start();
    include '../connect.php'; 
    
    $login = mysqli_real_escape_string($dp, $_POST['login']);
    $password = mysqli_real_escape_string($dp, $_POST['password']);
  

    $check_user = mysqli_query($dp, "SELECT * FROM `пассажиры` WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($check_user) > 0) {

        $user = mysqli_fetch_assoc($check_user);

        $_SESSION['user'] = [
            "id" => $user['Код Пассажира'],
            "full_name" => $user['ФИО Пассажира'],
            "email" => $user['Эл. почта'],
            "login" => $user['login'],
            "date" => $user['date']
        ];

        header('Location: ../pages/auth.php');

    } else {
        $_SESSION['message'] = 'Не верный логин или пароль';
//	$_SESSION['message'] = $login;
	$_SESSION['message'] = $password;
        header('Location: ../pages/auth.php');
    }
    ?>
