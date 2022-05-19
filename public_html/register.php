<?php

	$login = $_POST['login'];
	$pass = $_POST['password'];
    $name = $_POST['name'];
    include 'connect.php';
    $checker = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login'");
  	
  	if(count($checker->fetch_assoc())==0){
    

        $pass = md5($pass."kasterqwe123456");

        $mysql->query("INSERT INTO `users`(`login`, `password`, `name`) VALUES ('$login', '$pass', '$name')");
		setcookie('user', $name, time() + 3600);
      	setcookie('login', $login, time() + 3600);
      
        header('Location: http://kast-test.ru');
	} else {
      	header('Location: http://kast-test.ru');
    }
$mysql->close();
    

