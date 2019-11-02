<?php
include ('classes/loginclass.php');
$obj= new User;
if (isset($_POST['signup'])) {
	 $name=$_POST['username'];
	
	$password=$_POST['password'];

$obj->saveUser($name,$password);
  
}

  ?>

  <!DOCTYPE html>
  <html>
  <head>
  	<title>sign up </title>
  </head>
  <body>

  	<form method="POST" action="signup.php">
  		<center>
  			  	<h1><b>Sign_up</b></h1>
  			<label><b>Name</b></label>
  			<input type="text" name="username" placeholder="Enter the name"><br>
  		
  			<label><b>password</b></label>
  			<input type="password" name="password" placeholder="Enter the password"><br>
  			<button type="signup" name="signup">Sign Up</button>

  		</center>
  	</form>
  
  </body>
  </html>
