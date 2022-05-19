<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>library</title>
	<link rel="stylesheet" href="http://kast-test.ru/main48.css">
  	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  	<script src="libraryKst.js"></script>
</head>
<body>
  	<div class="container">
    <header>
		<h1>library</h1>
      	<?php
  			if($_COOKIE['user'] != ''):
      	?>
      	<div class="display__user">
  			<h3>User: <?php echo $_COOKIE['user']; ?> | <a href="clearAll.php" class="link"> Clear All</a> | <a class="link" href="exit.php">Exit</a></h3>
          
    	</div>
      	<?php endif; ?>
    </header> 
    
  	<?php
  		if($_COOKIE['user'] == ''):
  	?>
    <div class="reg-wrapper">
        <div class="dflex" id="signBlock">
            <input name="login" type="text" id="login" placeholder="Login">
            <input name="pass" type="password" id="pass" placeholder="Password">
            <input name="name" type="text" id="nickname" placeholder="Name">
            <button onclick="signChecker()">Sign Up</button>
            <button onclick="changeMod('toEnt')">Already have an account? Log in here</button>
        </div>
        <div class="dnone" id="entBlock">
            <input name="login" type="text" id="loginEnt" placeholder="Login">
            <input name="pass" type="password" id="passEnt" placeholder="Password">
            <button onclick="loginChecker()">Log In</button>
            <button onclick="changeMod('toSign')">Don't have an account? Sign up here</button>
        </div>
    </div>
  	<?php else: ?>
  	
	<section class="mainSection" id='mainSection'>
    <div class="create-book">
		<input id="bookName" placeholder="Name" class="add-input" type="text">
		<input id="author" placeholder="Author" class="add-input" type="text">
        <input id="pages" placeholder="Pages" class="add-input" min="1" type="number">
      	<div class="read-span">
        	<span>Read?</span>
        	<input id="read" name="read" type="checkbox">
      	</div>
		<button onclick="addBook()">Add Book</button>
    </div>
    </section>
  </div>
  <script>getAllBooks()</script>
<?php endif; ?>
	
	
</body>
</html>