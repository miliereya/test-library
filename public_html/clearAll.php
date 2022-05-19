<?php
	$login = $_COOKIE['login'];

	include 'connect.php';
	
	$mysql->query("DELETE FROM books WHERE login = '$login'");
	$mysql->close();
	header('Location: http://kast-test.ru');