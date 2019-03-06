<?php

  include('include/adminServerLogin.php');
  include('include/header.php');
  if(isset($_SESSION['admin_logged_in']))
  {
    header("Location: admin.php");
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Sign In</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Admin Login</h2>
  </div>

  <form method="POST">

	<div class="input-group">
		<label>Email ID</label>
		<input type="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Invalid Email.">
	</div>

	<div class="input-group">
  		<label>Password</label>
  		<input type="password" name="password" required pattern=".{5,}" title="Five or more characters required.">
  	</div>

	<div class="input-group">
  		<button type="submit" class="btn" name="admin">Login</button>
  	</div>

	<p>Forgot Password? <a href="abcd.php">Click Here</a></p>
  </form>
</body>
</html>
