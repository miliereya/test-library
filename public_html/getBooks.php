<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

    function index()
    {
      	$login = $_COOKIE['login'];
    	include 'connect.php';
		
        $result = $mysql->query("SELECT id, name, author, pages, isRead FROM books WHERE login = '$login'");
      	
      	$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
      	
      	
      	return $row;
    }
	
  	http_response_code(200);
	
    echo json_encode(index());
	$mysql->close;
  
