<?php
	

    $mysql = new mysqli('localhost', 'ci55045_library1', 'Kast3228', 'ci55045_library1');
	if(mysqli_connect_errno()) {
         printf("Connection failed: %s\n", mysqli_connect_error());
         exit();
     }
?>
