<?php 
	$login = $_COOKIE['login'];
	$bookName = $_POST['bookName'];
	$bookAuthor = $_POST['author'];
	$pages = $_POST['pages'];
	$read = $_POST['read'];

	include 'connect.php';
		

	$mysql->query("INSERT INTO `books`(`login`, `name`, `author`, `pages`, `isRead`) VALUES ('$login', '$bookName', '$bookAuthor','$pages','$read')");
	$mysql->close();
