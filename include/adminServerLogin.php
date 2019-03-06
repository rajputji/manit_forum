<?php
 include('connection.php');
 session_start();
 if(isset($_SESSION['admin_logged_in']))
 {
   header("Location: admin.php");
 }
  if(isset($_POST['admin']))
  {
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password = mysqli_real_escape_string($db, $_POST['password']);
		$query = "SELECT * FROM admin WHERE Email_ID='$email' AND Password='$password'";
		$results = mysqli_query($db, $query);
		if(mysqli_num_rows($results) == 1)
    {
  		$_SESSION['admin_logged_in'] = true;
			$_SESSION['email'] = $email;
			$_SESSION['success'] = "You are now logged in";
			header('location: admin.php');
		}
		else
    {
			echo "<script type=\"text/javascript\">
			alert('Sorry, Please enter correct email id and password.!!!');
		  </script>";
		}
	}
