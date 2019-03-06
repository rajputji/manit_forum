<?php
	session_start();
	include('connection.php');
	if(isset($_SESSION['logged_in']))
	{
		header("Location: Dashboard.php");
	}
	else
if (isset($_POST['stsignup'])){
	// receive all input values from the form
	$name = mysqli_real_escape_string($db, $_POST['name']);
	$scholarid = mysqli_real_escape_string($db, $_POST['scholarid']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$dob = mysqli_real_escape_string($db, $_POST['dob']);
	$branch = mysqli_real_escape_string($db, $_POST['branch']);
	$mobile = mysqli_real_escape_string($db, $_POST['mobile']);
	$sem = mysqli_real_escape_string($db, $_POST['semester']);
	$dob = substr($dob, 6, 4).'-'.substr($dob, 0, 2).'-'.substr($dob, 3, 2);

	//$find_query="SELECT Branch_ID from branch WHERE Branch_name='$branch'";
	//$result = mysqli_query($db, $find_query);
	//$branchid=mysqli_fetch_assoc($result);
  	$query = "INSERT INTO student(Student_ID, Student_Name, Branch_ID, DOB, Mobile_No, Email_ID, Password, Semester)VALUES ('$scholarid','$name','$branch','$dob','$mobile','$email','$password','$sem')";
  	if(mysqli_query($db, $query))
  	{
  		$q = "INSERT INTO profileimages(Email,image) VALUES ('$email','default.jpg')";
  		mysqli_query($db, $q);

				echo "<script type=\"text/javascript\">
     	alert('You have been registered !!!');
      </script>";

	}
	else
	{
				echo "<script type=\"text/javascript\">
     	alert('Sorry, You have not been registered !!!');
      </script>";
	}
  	//header('location: index.html');
}
?>
