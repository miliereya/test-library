<?php

	$login = $_POST['login'];
	$pass = md5($_POST['password']."kasterqwe123456");
    include 'connect.php';
    $checker = $mysql->query("SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$pass'");
	$mysql->close();
  	$result = $checker->fetch_assoc();
  	if(count($result)==0){
        header('Location: http://kast-test.ru');
	} else {
      	setcookie('user', $result['name'], time() + 3600);
      	setcookie('login', $result['login'], time() + 3600);
      	echo($res='find');
    }

    