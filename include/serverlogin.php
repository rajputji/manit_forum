<?php
  include('connection.php');
  session_start();
  if(isset($_SESSION['logged_in']))
  {
          header("Location: Dashboard.php");
  }
  else if (isset($_POST['login_user']))
  {
  	$email = mysqli_real_escape_string($db, $_POST['email']);
  	$password = mysqli_real_escape_string($db, $_POST['password']);
  	$query = "";
  	if($_POST['user']=="student")
    {
  		$query = "SELECT * FROM student WHERE Email_ID='$email' AND Password='$password'";
  	}
  	else if($_POST['user']=="faculty")
    {
  		$query = "SELECT * FROM faculty WHERE Email_ID='$email' AND Password='$password'";
  	}
  	$results = mysqli_query($db, $query);
  	if ($_POST['user']=="student" && mysqli_num_rows($results) == 1)
    {
  		$_SESSION['email'] = $email;
  		$_SESSION['logged_in'] = true;
  	  $_SESSION['success'] = "You are now logged in";
      $_SESSION['user'] = "student";

  	  header('location: Dashboard.php');
  	}
  	else if($_POST['user']=="faculty" && mysqli_num_rows($results) == 1)
    {
  		$_SESSION['logged_in'] = true;
  		$_SESSION['email'] = $email;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: Dashboard.php');

      $_SESSION['user'] = "faculty";
  	}
  	else
    {
  		echo "<script type=\"text/javascript\">
      alert('Sorry, You are not registered... Please register first.!!!');
            </script>";
  	}
  }
  /*else if(isset($_POST['admin']))
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
	}*/
?>
