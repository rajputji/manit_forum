<?php
include('connection.php');
session_start();
if (isset($_POST['submit_lf'])){
	// receive all input values from the form
	$type = mysqli_real_escape_string($db, $_POST['type']);
	$lf_title = mysqli_real_escape_string($db, $_POST['item']);
	$lf_description = mysqli_real_escape_string($db, $_POST['description']);
	date_default_timezone_set('Asia/Kolkata');
	$d=date('Y-m-d H:i:s');
  	$query = "INSERT INTO lost_found(Lost_Found_Title, Description, Email, Type, Date) VALUES ('$lf_title','$lf_description','$_SESSION[email]','$type','$d')";
  	if(mysqli_query($db, $query)){
				
		header('location: lostFound.php');
		}
	else{
				echo "<script type=\"text/javascript\">
     	alert('Sorry, Unable to post!!!');
      </script>";
	}
  	//header('location: ../studentDashboard.php');
}
?>
