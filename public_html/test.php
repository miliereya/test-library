<?php
	
	echo $login;
	function index(){
      	$login = $_COOKIE['login'];
        include 'connect.php';
        $result = $mysql->query("SELECT id, name, author, pages, isRead FROM books WHERE `login` = '$login'");
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        print_r($row);
      	return $row;
      	
    }
	echo json_encode(index());
	$mysql->close;
	