<?php
	$id = $_POST['id'];
	$act = $_POST['action'];
	include 'connect.php';
	if($act == 'notRead'){
      	
      	$mysql->query("UPDATE books SET isRead = 'no' WHERE id = '$id'");
      	$mysql->close();
    } else if($act == 'yesRead'){
    	$mysql->query("UPDATE books SET isRead = 'yes' WHERE id = '$id'");
      	$mysql->close();
    } else if($act == 'delete'){
    	$mysql->query("DELETE FROM books WHERE id = '$id'");
      	$mysql->close();
    }
	
	