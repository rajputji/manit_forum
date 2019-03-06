<?php
include('connection.php');

if (isset($_POST['fsignup'])) {
  // receive all input values from the form
	$desig = mysqli_real_escape_string($db, $_POST['desig']);
	$name = mysqli_real_escape_string($db, $_POST['name']);
	$facultyid = mysqli_real_escape_string($db, $_POST['facultyid']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	$email = mysqli_real_escape_string($db, $_POST['email']); 
	$mobile = mysqli_real_escape_string($db, $_POST['mobile']);
	$dept = mysqli_real_escape_string($db, $_POST['department']);
	//$find_query="SELECT Dept_ID from department WHERE Dept_name='$dept'";
	//$result = mysqli_query($db, $find_query);
	//$deptid=mysqli_fetch_assoc($result);
  	$query = "INSERT INTO faculty(Faculty_ID, Faculty_Name, Dept_ID, Designation, Mobile_No, Email_ID, Password, Address)
	              VALUES ('$facultyid','$name','$dept','$desig','$mobile','$email','$password','')";
  	if(mysqli_query($db, $query)){
			echo "<script type=\"text/javascript\">
     	alert('You have been registered !!!');</script>";

		}
	else{
				echo "<script type=\"text/javascript\">
     	alert('Sorry, You have not been registered !!!');
      </script>";
	}
  	//header('location: index.php');
}
?>
