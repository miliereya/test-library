<?php 
	setcookie('user', $result['name'], time() - 3600);
	setcookie('login', $result['login'], time() - 3600);
	header('Location: http://kast-test.ru');
